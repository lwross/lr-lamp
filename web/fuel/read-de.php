<?php

require('ET_Client.php');
try {
	$myclient = new ET_Client();

	//DataExtension Testing
	//Get all Data Extensions
	print_r("Get all Data Extensions \n");
	$getDE = new ET_DataExtension();
	$getDE->authStub = $myclient;
	$getDE->props = array("CustomerKey", "Name");
	$getResult = $getDE->get();
	print_r('Get Status: '.($getResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$getResult->code."\n";
	print 'Message: '.$getResult->message."\n";
	print_r('More Results: '.($getResult->moreResults ? 'true' : 'false')."\n");
	print 'Result Count: '.count($getResult->results)."\n";
	//print 'Results: '."\n";
	//print_r($getResult->results);
	print "\n---------------\n";

	// Specify a name for the data extension that will be used for testing
	// Note: Name and CustomerKey will be the same value
	// WARNING: Data Extension will be deleted so don't use the name of a
	// production data extension

	$DataExtensionNameForTesting = "Machine Installations";

	// Create a Data Extension
	print_r("Create a Data Extension  \n");
	$postDE = new ET_DataExtension();
	$postDE->authStub = $myclient;
	$postDE->props = array("Name" => $DataExtensionNameForTesting, "CustomerKey" => $DataExtensionNameForTesting);
	$postDE->columns = array();
	$postDE->columns[] = array("Name" => "Key", "FieldType" => "Text", "IsPrimaryKey" => "true","MaxLength" => "100", "IsRequired" => "true");
	$postDE->columns[] = array("Name" => "Value", "FieldType" => "Text");
	$postResult = $postDE->post();
	print_r('Post Status: '.($postResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$postResult->code."\n";
	print 'Message: '.$postResult->message."\n";
	print 'Result Count: '.count($postResult->results)."\n";
	print 'Results: '."\n";
	print_r($postResult->results);
	print "\n---------------\n";


	//Get single Data Extension
	print_r("Get single Data Extension \n");
	$getDE = new ET_DataExtension();
	$getDE->authStub = $myclient;
	$getDE->props = array("CustomerKey", "Name");
	$getDE->filter = array('Property' => 'CustomerKey','SimpleOperator' => 'equals','Value' => $DataExtensionNameForTesting);
	$getResult = $getDE->get();
	print_r('Get Status: '.($getResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$getResult->code."\n";
	print 'Message: '.$getResult->message."\n";
	print_r('More Results: '.($getResult->moreResults ? 'true' : 'false')."\n");
	print 'Result Count: '.count($getResult->results)."\n";
	print 'Results: '."\n";
	print_r($getResult->results);
	print "\n---------------\n";

	//Get all Data Extensions Columns filter by specific DE
	print_r("Get all Data Extensions Columns filter by specific DE \n");
	$getDEColumns = new ET_DataExtension_Column();
	$getDEColumns->authStub = $myclient;
	$getDEColumns->props = array("CustomerKey", "Name");
	$getDEColumns->filter = array('Property' => 'CustomerKey','SimpleOperator' => 'equals','Value' => $DataExtensionNameForTesting);
	$getResult = $getDEColumns->get();
	print_r('Get Status: '.($getResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$getResult->code."\n";
	print 'Message: '.$getResult->message."\n";
	print_r('More Results: '.($getResult->moreResults ? 'true' : 'false')."\n");
	print 'Result Count: '.count($getResult->results)."\n";
	print 'Results: '."\n";
	print_r($getResult->results);
	print "\n---------------\n";


	//Get all Data Extensions Rows (By CustomerKey)
	print_r("Get all Data Extensions Rows (By CustomerKey) \n");
	$getDERows = new ET_DataExtension_Row();
	$getDERows->authStub = $myclient;
	$getDERows->props = array("Key", "Value");
	$getDERows->CustomerKey = $DataExtensionNameForTesting;
	$getResult = $getDERows->get();
	print_r('Get Status: '.($getResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$getResult->code."\n";
	print 'Message: '.$getResult->message."\n";
	print_r('More Results: '.($getResult->moreResults ? 'true' : 'false')."\n");
	print 'Result Count: '.count($getResult->results)."\n";
	//print 'Results: '."\n";
	//print_r($getResult->results);
	print "\n---------------\n";


	//Get all Data Extensions Rows (By CustomerKey) Again
	print_r("Get all Data Extensions Rows (By CustomerKey) Again \n");
	$getDERows = new ET_DataExtension_Row();
	$getDERows->authStub = $myclient;
	$getDERows->props = array("Key", "Value");
	$getDERows->CustomerKey = $DataExtensionNameForTesting;
	$getResult = $getDERows->get();
	print_r('Get Status: '.($getResult->status ? 'true' : 'false')."\n");
	print 'Code: '.$getResult->code."\n";
	print 'Message: '.$getResult->message."\n";
	print_r('More Results: '.($getResult->moreResults ? 'true' : 'false')."\n");
	print 'Result Count: '.count($getResult->results)."\n";
	//print 'Results: '."\n";
	//print_r($getResult->results);
	print "\n---------------\n";


	} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
  }

?>
