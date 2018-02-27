<?php
// This sample demonstrates how to run a sale request, which combines an
// authorization with a capture in one request.

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// voidRequestID
$voidRequestID = '5197433748476290103010';

// Before using this example, you can use your own reference code for the transaction.
$referenceCode = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

// Applications: Credit Card Credit
$voidService = new stdClass();
$voidService->run = 'true';
$voidService->voidRequestID = $voidRequestID;
$request->voidService = $voidService;

$reply = $client->runTransaction($request);

// This section will show all the reply fields.
echo '<pre>';
print("\nREQUEST: " . print_r($request, true)) . PHP_EOL;
print("\nRESPONSE: " . print_r($reply, true));
echo '</pre>' . PHP_EOL;
