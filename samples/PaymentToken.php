<?php
// This sample demonstrates how to run an auth request for two items with a flat
// name-value pair structure

// Using Composer-generated autoload file.
//require __DIR__ . '/../vendor/autoload.php';
// Or, uncomment the line below if you're not using Composer autoloader.
require_once(__DIR__ . '/../lib/CybsSoapClient.php');
require_once('config.php');

// Before using this example, you can use your own reference code for the transaction.
$subscriptionID = '5075548937676785103528';
$referenceCode  = date('YmdHis');

$client = new CybsSoapClient($soap_config);
$request = $client->createRequest($referenceCode);

$ccAuthService = new stdClass();
$ccAuthService->run = 'true';
$request->ccAuthService = $ccAuthService;

$ccCaptureService = new stdClass();
$ccCaptureService->run = 'true';
$request->ccCaptureService = $ccCaptureService;

$recurringSubscriptionInfo = new stdClass();
$recurringSubscriptionInfo->subscriptionID = $subscriptionID;
$request->recurringSubscriptionInfo = $recurringSubscriptionInfo;

$purchaseTotals = new stdClass();
$purchaseTotals->currency         = 'THB';
$purchaseTotals->grandTotalAmount = '1234.50';
$request->purchaseTotals = $purchaseTotals;

$reply = $client->runTransaction($request);

ob_clean();
header("Content-Type: text/plain");

print_r($reply);
echo PHP_EOL;
