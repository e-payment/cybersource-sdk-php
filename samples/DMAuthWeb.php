<?php

define('MERCHANT_ID', 'kr950210047');

// DF TEST: 1snn5n9w, LIVE: k8vif92e 
define('DF_ORG_ID', '1snn5n9w');

session_start();

$sess_id  = MERCHANT_ID . session_id();
$df_param = 'org_id=' . DF_ORG_ID . '&amp;session_id=' . $sess_id;

?>

<!-- DMAuthApi.php | DMAuthNVP.php -->
<form action="DMAuthNVP.php" method="POST">
	<input type="hidden" name="sess_id" value="<?php echo $sess_id ?>" />
	<input type="submit" />
</form>

<!-- DF START -->
device_fingerprint_param: <?php echo $df_param ?>

<p style="background:url(https://h.online-metrix.net/fp/clear.png?<?php echo $df_param ?>&amp;m=1)"></p>
<img src="https://h.online-metrix.net/fp/clear.png?<?php echo $df_param ?>&amp;m=2" width="1" height="1" />


<object type="application/x-shockwave-flash" 
        data="https://h.online-metrix.net/fp/fp.swf?<?php echo $df_param ?>" width="1" height="1" id="thm_fp">
<param name="movie"
        value="https://h.online-metrix.net/fp/fp.swf?<?php echo $df_param ?>" />
<div></div>
</object>

<script type="text/javascript" src="https://h.online-metrix.net/fp/tags.js?<?php echo $df_param ?>" >
</script>

<noscript>
	<iframe style="width: 100px; height: 100px; border: 0; position: absolute; top: -5000px;"
	          src="https://h.online-metrix.net/fp/tags?<?php echo $df_param ?>">         
	</iframe>
</noscript>

<!-- DF END -->

<pre><?php print_r($_SERVER); ?></pre>