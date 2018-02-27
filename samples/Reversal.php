<?php
// This sample demonstrates how to run an auth request for two items with a flat
// name-value pair structure

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.

//Merchant Reference Number
$referenceCode = '20180227224923';
$authRequestID = '5197465646296664703011';

/// REVERSAL ///
$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$ccAuthReversalService = new stdClass();
$ccAuthReversalService->run = 'true';
$ccAuthReversalService->authRequestID = $authRequestID;
$request->ccAuthReversalService = $ccAuthReversalService;

$purchaseTotals = new stdClass();
$purchaseTotals->currency = 'USD';
$purchaseTotals->grandTotalAmount = '69.12';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

// This section will show all the reply fields.
echo '<pre>';
print("\nREQUEST: " . print_r($request, true)) . PHP_EOL;
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>' . PHP_EOL;
