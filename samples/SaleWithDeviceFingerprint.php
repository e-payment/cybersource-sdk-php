<?php
// This sample demonstrates how to run an authorization request followed by a
// capture request.

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');
$merchant_descriptor = 'BAY SHOP';

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

// This section contains a sample transaction request for the authorization 
// service with complete billing, payment card, and purchase (two items) information.   
$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$ccAuthService->reconciliationID = 'R' . $referenceCode;
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

// Advance Fraud Screen
// $afsService = new stdClass();
// $afsService->run = 'true';
// $request->afsService = $afsService;

// Device Fingerprint ID
if (! empty(@$_POST['sess_id'])) {
	$request->deviceFingerprintID = @$_POST['sess_id'];
}

// Merchant Descriptor
if (! empty($merchant_descriptor)) {
	$invoiceHeader = new stdClass();
	$invoiceHeader->merchantDescriptor = $merchant_descriptor;
	$request->invoiceHeader = $invoiceHeader;
}

// MDD
$merchantDefinedData = new stdClass();
$merchantDefinedData->field1 = 'MDD #1';
$merchantDefinedData->field2 = 'MDD #2';
$merchantDefinedData->field3 = 'MDD #3';
$request->merchantDefinedData = $merchantDefinedData;

// Billing
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

// Card
$card = new stdClass();
$card->accountNumber   = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear  = '2020';
$request->card = $card;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'THB';
$request->purchaseTotals = $purchaseTotals;

$item0 = new stdClass();
$item0->id = '0';
$item0->productCode = 'ITEM0001';
$item0->productSKU  = 'SKU0001';
$item0->productName = 'KFLTFDIV';
$item0->unitPrice = '10.00';
$item0->quantity  = '100';

$item1 = new stdClass();
$item1->id = '1';
$item1->productCode = 'ITEM0002';
$item1->productSKU  = 'SKU0002';
$item1->productName = 'KFLTFD70';
$item1->unitPrice = '5.00';
$item1->quantity  = '200';

$request->item = array($item0, $item1);

$reply = $client->runTransaction($request);

echo '<pre>';

print("\nREQUEST: " . print_r($request, true));
echo PHP_EOL;

print("\nAUTH RESPONSE: " . print_r($reply, true));

if ($reply->decision != 'ACCEPT') {
    print("\nFailed auth request.\n");
    return;
}
