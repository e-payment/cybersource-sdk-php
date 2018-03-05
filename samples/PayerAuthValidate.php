<?php

require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

$PaRes = @$_POST['PaRes'];

if (empty($PaRes)) {
	die('empty PaRes value');
}

// merchant reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$payerAuthValidateService = new stdClass();
$payerAuthValidateService->run = 'true';
$payerAuthValidateService->signedPARes = $PaRes;
$request->payerAuthValidateService = $payerAuthValidateService;

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
$card_prefix    = substr($card->accountNumber, 0, 1);
$card->cardType = $card_types[$card_prefix];
$request->card  = $card;

$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

$billTo = new stdClass();
$billTo->firstName  = 'John';
$billTo->lastName   = 'Doe';
$billTo->street1    = '1295 Charleston Road';
$billTo->city       = 'Mountain View';
$billTo->state      = 'CA';
$billTo->postalCode = '94043';
$billTo->country    = 'US';
$billTo->email      = 'null@cybersource.com';
$billTo->ipAddress  = '10.7.7.7';
$request->billTo    = $billTo;

$reply = $client->runTransaction($request);

ob_clean();
header("Content-Type: text/plain");
print_r($reply);
echo PHP_EOL;

// EOF