<?php

$PaRes = @$_POST['PaRes'];

if (empty($PaRes)) {
	die('empty PaRes value');
}

?>

<pre>
<?php print_r(@$_POST); ?>
</pre>

<body onload="document.ACSResponseForm.submit();">
<!-- <body> -->
	<form id="ACSResponseForm" name="ACSResponseForm" action="./PayerAuthValidate.php" method="post" target="_self">
		<input type="hidden" name="PaRes" value="<?php echo $PaRes ?>" />
		<input type="submit" />
	</form>
</body>
