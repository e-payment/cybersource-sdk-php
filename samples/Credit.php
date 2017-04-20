<?php
// This sample demonstrates how to run a sale request, which combines an
// authorization with a capture in one request.

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

// Applications: Credit Card Credit
$ccCreditService = new stdClass();
$ccCreditService->run = 'true';
$request->ccCreditService = $ccCreditService;

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
$purchaseTotals->currency = 'USD';
$purchaseTotals->grandTotalAmount = '90.01';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

// This section will show all the reply fields.
echo '<pre>';
print("\nREQUEST: " . print_r($request, true)) . PHP_EOL;
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>' . PHP_EOL;
