<!DOCTYPE HTML>
<html>
<head>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include 'inc/inc_crypt.php';
$mainmix = false;
$allow_mix1 = false;
$mix = 0;
$get = "";
$urlmix = testInput($_GET['mix']);
$urltitle = "FartsHD";
$ogtitle = "FartsHD";
$which_status = 0;

$mix_string = "%3Fmix%3D";
$encoded_url = "https%3A%2F%2Fmix.fartshd.com%2F";
$ogtitle = "FartsHD";
$encoded_msg = "A%20rambunctious%20app%20to%20waft%20away%20the%20most%20serious%20of%20days *** ";
$share_img = "https://mix.fartshd.com/img/fartshd-mix.jpg";

if ( strlen($urlmix) < 10) {
	//echo "skip";
} else {		
	//echo "next";
	//echo "<br />";
	//echo $urlmix;
	//echo "<br />";
	$which_status = 1;
	$key = "fartshdstorage";
	$res = urldecode (des ($key, hexToString($urlmix), 0, 0, null, 0));
	$mix = explode("$#$",$res);
	if ($mix[0] == "mix1") {
		$urltitle = "FartsHD: " . $mix[3];
		$ogtitle = "FartsHD: " . (str_replace('"','',$mix[3]));
		$encoded_sub = "Farts mix created by FartsHD App";
		$allow_mix1 = true;
		$encoded_url = $encoded_url . $mix_string . $_GET['mix'];
		$get = "?mix=" . $_GET['mix'];	
	}
}
/* def functions */
function is_localhost() {
    $whitelist = array( '127.0.0.1', '::1', "localhost" );
    if( in_array( $_SERVER['REMOTE_ADDR'], $whitelist) )
        return true;
}
if (is_localhost()) {
	$link1 = "?mix=0xc8650d7fdabb40305ad811bd11f3beec0ff7ee8b2f64bd7d46e5929cb6aeac313dbe16b3d6fa61321e6957b22b58f464b10473ebe6ed2a907321adf151135137b930f415ff534dc749d04c8e217709115556af0cf4957376cbeae82d2ad00b6e124051c8f0b79abe9c918fc80c53f13bcbeae82d2ad00b6e3971bb147821358e079c21b6fca12f02c5b3117424fb99c2c5198421984f55a1c95b5fda114cd20c";
	$link2 = "?mix=0x1a7da11c24bb445b060dea7e8db7f7a10ff7ee8b2f64bd7d46e5929cb6aeac313dbe16b3d6fa61321e6957b22b58f4647fba66f160dadf121ff4522f34e9894e37a93401840a6ed9602df8da072bca69b99804cfb6cf7589a393176f93388195e62cf24369972564d2fa0ca688d678f1f298d20c55da286513609b2fb3871f0f64072708f419b57ebf0faaf8d66390c6653dcd549e8ad956dbe8a1c720ca144dba69bf90195ab618e8681717f591c999";
	$link3 = "?mix=0xdab960040b9d3381ee4c5eacdac5f6c70ff7ee8b2f64bd7d46e5929cb6aeac313dbe16b3d6fa61321e6957b22b58f464602098b5de419ebe0c6f54af3caa5d16196b2702e4ec3c443535147626d0574650c5cf97279c93d53a78ba0be6aa60e7ba66c4a77afb706b65d808468e849395eb32cccc1464cce3419595e549e6fcba1b820ab8695e7f446b41017a9aa17799cd070e7fa95c103f9d325714d0366b4415f226c2b97f2471a1d821f5100cf7bd231fa0a58846d76c";

} else {
	$link1 = "samurai-fart";
	$link2 = "diarrhea";
	$link3 = "arise";
	
	if ($_SERVER['REQUEST_URI'] == "/samurai-fart") { $get = "samurai-fart"; }
	if ($_SERVER['REQUEST_URI'] == "/diarrhea") { $get = "diarrhea"; }
	if ($_SERVER['REQUEST_URI'] == "/arise") { $get = "arise"; }

}
?>
<title><?php echo $urltitle;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Farts HD">  
<meta property="og:url" content="https://mix.fartshd.com/<?php echo $get; ?>"> 
<meta property="og:title" content="<?php echo $ogtitle ?>">
<meta property="og:image" content="<?php echo $share_img ?>"> 
<meta property="og:description" content="A rambunctious app to waft away the most serious of days. Farts HD is perfect for connoisseurs or amateur farters, providing a smorgasbord of fart sounds for all occasions"> 
<link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
<link rel="manifest" href="favicons/manifest.json">
<link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="favicons/favicon.ico">
<meta name="msapplication-config" content="favicons/browserconfig.xml">
<link href="https://fartshd.com/fartshd.css" type="text/css" rel="stylesheet">
<link href="mix.css" type="text/css" rel="stylesheet">
<script src="inc/jquery.js"></script>
<script src="inc/transit.js"></script>
<script src="inc/howler.js"></script>
<script>
if (!$.support.transition) { $.fn.transition = $.fn.animate; }
var app = new Object();
app.app_mix = new Object();
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="httpss://www.googletagmanager.com/gtag/js?id=UA-49881656-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-49881656-2');
</script>

</head>
<body>
<div id="contents">
<?php 

if($allow_mix1) {
	$mainmix = $mix;
	include 'inc/inc_mix1.php';
} else {
	if ($which_status == 1) {
		echo "<h3>I am sorry but the link to the Fart is damaged !!!</h3>";
	}
}

?>
<?php include 'inc/inc_feature.php'; ?> 
<?php if($allow_mix1) { ?>
<div class="separator"></div>
<h2 class="blue"><span>Farts mix created by FartsHD App</span></h2>
<?php } else { ?>
<h2 class="blue">Farts HD</h2>
<?php } ?>

<p class="blue">
<img src="img/fartshd.png" alt="Farts HD" style="float:left; margin: 0px 20px 20px 0px;" >
A rambunctious app to waft away the most serious of days. Farts HD is perfect for connoisseurs or amateur farters, providing a smorgasbord of fart sounds for all occasions.<br><br>
Easy to use, intuitive, colourful, no adverts and lots of fun for all the family. Farts HD will keep you laughing for days.
</p>
<p style="text-align: center;">

	<a href="https://fartshd.com/app/" title="Farts HD on smartphone" class="btn" style="background-image: url(img/smartphone.png)"><span class="new"></span></a>
	<a href="https://fartshd.com/app/" title="Farts HD on desktop" class="btn" style="background-image: url(img/desktop.png)"><span class="new"></span></a>	
    <a href="https://play.google.com/store/apps/details?id=com.animtypecom.fartshd" title="Farts HD on Google Play" target="_blank" class="btn" style="background-image: url(img/google.png)"><span class="old"></span></a>


</p>
<?php /*
<a href ="http://192.168.1.103/mix.fartshd.com/?mix=0x5f97758f366e4acc8b7784beca549f06c3c825047ebd1d2b640f9b77a11e654d5c7636cbe744702639be360926d51282daab352beb08ddede3b5b9c142e283f1ea839dc1905001908b30560af408e75ce47aaeafb9d6f2e31107242e99c531a26cdafdca719bb00c61adb985ef24ea4ad8510cb2d865fa33048b981f3096e598a50c2aa6aaaf921895fed1b3c9a6f38595fed1b3c9a6f3859400e154f621ea082d401888ef99778875b725c842bbb00d7b9d88f1908ef223b5ca966221510e99">SND</a>
*/
?>
<br><br>
<?php include 'inc/inc_sharer.php'; ?> 
</div>
<?php include 'inc/inc_footer.php'; ?> 
</body>
</html>