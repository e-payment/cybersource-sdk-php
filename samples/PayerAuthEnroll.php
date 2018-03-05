<?php

require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// merchant reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$payerAuthEnrollService = new stdClass();
$payerAuthEnrollService->run = 'true';
$request->payerAuthEnrollService = $payerAuthEnrollService;

$item0 = new stdClass();
$item0->unitPrice = '12.34';
$request->item = array($item0);

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'THB';
$request->purchaseTotals  = $purchaseTotals;

$card_types = array('4' => '001', '5' => '002', '3' => '007');

$card = new stdClass();
$card->accountNumber   = '4000000000000002';
// $card->accountNumber   = '5200000000000007';
// $card->accountNumber   = '3569990010083722';
$card->expirationMonth = '12';
$card->expirationYear  = '2020';
$card_prefix           = substr($card->accountNumber, 0, 1);
$card->cardType        = $card_types[$card_prefix];
$request->card = $card;
// print_r($card); exit(0);

$reply = $client->runTransaction($request);

$canValdiateAuthen = (($reply->decision === 'REJECT') &&
	                  ($reply->reasonCode == 475) &&
	                  ($reply->payerAuthEnrollReply->reasonCode == 475));

if ($canValdiateAuthen === true) {

	$acsURL = $reply->payerAuthEnrollReply->acsURL;
	$paReq  = $reply->payerAuthEnrollReply->paReq;
	$xid    = $reply->payerAuthEnrollReply->xid;
	$termUrl = 'http://127.0.0.1:8088/PayerACSResponse.php';

	$reply->payerAuthEnrollReply->proofXML = htmlentities(formatXml($reply->payerAuthEnrollReply->proofXML));

?>

<!-- <body onload="document.PAEnrollForm.submit();"> -->
<body>

	<pre><?php print_r($reply->payerAuthEnrollReply); ?></pre>

	<form id="PAEnrollForm" name="PAEnrollForm" action="<?php echo $acsURL ?>" method="post" target="_self">
		<input type="hidden" name="PaReq" value="<?php echo $paReq ?>" />
		<input type="hidden" name="MD" value="<?php echo $xid ?>" />
		<input type="hidden" name="TermUrl" value="<?php echo $termUrl ?>" />
		<input type="submit" />
	</form>
</body>

<?php

}
else {
	echo 'Cannot Valdiate Authen' . PHP_EOL;
	print_r($reply);
	echo PHP_EOL;
}

//---------------------------------------------------------------------------//

function formatXml($xml) {

	$dom = new DOMDocument();

	// Initial block (must before load xml string)
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	// End initial block

	$dom->loadXML($xml);

	return $dom->saveXML();
}

// EOF