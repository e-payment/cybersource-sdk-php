<?php
// This sample demonstrates how to run an auth request for two items with a flat
// name-value pair structure

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

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

$card = new stdClass();
$card->accountNumber   = '4111111111111111';
$card->expirationMonth = '12';
$card->expirationYear  = '2020';
$request->card = $card;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'THB';
$purchaseTotals->grandTotalAmount = '999.50';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);
print_r($reply);


/// REVERSAL ///

$authRequestID = $reply->requestID;
print_r($authRequestID) . PHP_EOL;

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$ccAuthReversalService = new stdClass();
$ccAuthReversalService->run = 'true';
$ccAuthReversalService->authRequestID = $authRequestID;
$request->ccAuthReversalService = $ccAuthReversalService;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'THB';
$purchaseTotals->grandTotalAmount = '999.50';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

print_r($reply);
echo PHP_EOL;
