<?php
/*
return_object.type = mainmix[0];
return_object.id = mainmix[1];
return_object.cat = mainmix[2];
return_object.title = mainmix[3];

return_object.mp30 = mainmix[4];
return_object.mp31 = mainmix[5];
return_object.mp32 = mainmix[6];
return_object.mp33 = mainmix[7];
return_object.mp34 = mainmix[8];

return_object.tim0 = mainmix[9];
return_object.tim1 = mainmix[10];
return_object.tim2 = mainmix[11];
return_object.tim3 = mainmix[12];
return_object.tim4 = mainmix[13];

return_object.val1 = mainmix[14];
return_object.val2 = mainmix[15];
return_object.val3 = mainmix[16];
return_object.val4 = mainmix[17];
return_object.val5 = mainmix[18];

return_object.author = mainmix[19];
return_object.device = mainmix[20];
*/

function draw_mp3_array ($val, $tim) {
	$retr = "";	
	if ($val != "/") {	$retr = "app.app_mix.mixArray.push('".$val."'); app.app_mix.timeArray.push('".$tim."'); "; }
	return $retr;	
}


?>
<div id="icon_play" onclick="app.app_mix.playfart()" class="sets_loader"></div>
<p class="blue" style="text-align:center"><strong>Can't hear the sound? Try different browser.</strong></p>
<h1><span><strong><?php echo $mainmix[3]; ?></strong></span></h1>
<table align="center" id="category_values" class="gpuAcc">
  <tbody>
    <tr>
      <td class="td1">Volume</td>
      <td class="td3 gpuAcc"><div class="small_icon s1"></div></td>
      <td class="td2 gpuAcc"><div class="graph graph_eq gpuAcc">
          <div id="td1" class="tds gpuAcc"></div>
        </div></td>
      <td class="td3 gpuAcc"><div class="small_icon e1"></div></td>
    </tr>
    <tr>
      <td class="td1">Detection</td>
      <td class="td3 gpuAcc"><div class="small_icon s5"></div></td>
      <td class="td2 gpuAcc"><div class="graph graph_aware gpuAcc">
          <div id="td5" class="tds gpuAcc"></div>
        </div></td>
      <td class="td3 gpuAcc"><div class="small_icon e5"></div></td>
    </tr>
    <tr>
      <td class="td1">Dirty Panties</td>
      <td class="td3 gpuAcc"><div class="small_icon s2"></div></td>
      <td class="td2 gpuAcc"><div class="graph graph_dirt gpuAcc">
          <div id="td2" class="tds gpuAcc"></div>
        </div></td>
      <td class="td3 gpuAcc"><div class="small_icon e2"></div></td>
    </tr>
    <tr>
      <td class="td1">Smell</td>
      <td class="td3 gpuAcc"><div class="small_icon s3"></div></td>
      <td class="td2 gpuAcc"><div class="graph graph_smell gpuAcc">
          <div id="td3" class="tds gpuAcc"></div>
        </div></td>
      <td class="td3 gpuAcc"><div class="small_icon e3"></div></td>
    </tr>
    <tr>
      <td class="td1">Throw up</td>
      <td class="td3 gpuAcc"><div class="small_icon s4"></div></td>
      <td class="td2 gpuAcc"><div class="graph graph_throw gpuAcc">
          <div id="td4" class="tds gpuAcc"></div>
        </div></td>
      <td class="td3 gpuAcc"><div class="small_icon e4"></div></td>
    </tr>
  </tbody>
</table>
<script>

$(document).ready(function(){ preload(); });
// globals
var tmp_snd = new Array();
var allow_clicks = false;
var allow_init = true;
/* SOUND */
app.soundFolder = "";
app.mp3folder = "mp3/";
// media objects
app.soundmedia_mix = 1;
app.soundmedia_mix1 = null;
app.soundmedia_mix2 = null;
app.soundmedia_mix3 = null;
app.soundmedia_mix4 = null;
app.soundmedia_mix5 = null;
app.app_mix.preload = 0; 
app.app_mix.mixArray = new Array();
app.app_mix.timeArray = new Array();

<?php

if ($mainmix[4] != "/") {	echo " app.app_mix.mixArray.push('".$mainmix[4]."'); app.app_mix.timeArray.push('".$mainmix[9]."');"; };
if ($mainmix[5] != "/") {	echo " app.app_mix.mixArray.push('".$mainmix[5]."'); app.app_mix.timeArray.push('".$mainmix[10]."');"; };
if ($mainmix[6] != "/") {	echo " app.app_mix.mixArray.push('".$mainmix[6]."'); app.app_mix.timeArray.push('".$mainmix[11]."');"; };
if ($mainmix[7] != "/") {	echo " app.app_mix.mixArray.push('".$mainmix[7]."'); app.app_mix.timeArray.push('".$mainmix[12]."');"; };
if ($mainmix[8] != "/") {	echo " app.app_mix.mixArray.push('".$mainmix[8]."'); app.app_mix.timeArray.push('".$mainmix[13]."');"; };


?>
function preload() { 	
	for(var t=0; t < app.app_mix.mixArray.length; t++) {
		var tmp_mp3 = app.soundFolder + app.mp3folder + app.app_mix.mixArray[t] + ".mp3";
		tmp_snd[t] = new Howl({  urls: [tmp_mp3], volume: 1, buffer: false, onload: function() { alowstart(); }});
	}
	// just in case
	setTimeout(function(){ init(); },8000);
}

function alowstart() { 
	app.app_mix.preload++;
	console.log ("preload sound " + app.app_mix.preload + " /// " + app.app_mix.mixArray.length);
	if (app.app_mix.preload >= app.app_mix.mixArray.length ) {
		//for (var v in tmp_snd) { tmp_snd[v].unload(); }
		init();
	}
}


function init() {
	
	if (!allow_init) { return; }	
	allow_init = false;
	
	var tmp_w = $(".graph").width();
	var tmp_width1 = (100 - (<?php echo $mainmix[14]; ?>*10));
	var tmp_width2 = (100 - (<?php echo $mainmix[15]; ?>*10));
	var tmp_width3 = (100 - (<?php echo $mainmix[16]; ?>*10));
	var tmp_width4 = (100 - (<?php echo $mainmix[17]; ?>*10));
	var tmp_width5 = (100 - (<?php echo $mainmix[18]; ?>*10));
	
	animategraph($("#td1"),tmp_w,tmp_width1, false);
	animategraph($("#td2"),tmp_w,tmp_width2, false);
	animategraph($("#td3"),tmp_w,tmp_width3, false);
	animategraph($("#td4"),tmp_w,tmp_width4, false);
	animategraph($("#td5"),tmp_w,tmp_width5, true);	

}

function animategraph (obj, wid, pecent, doclick) {

	var duration = 1000;
	var timer = ((Math.ceil(Math.random()*3)+1)*duration)/2;
	var percent_calc = 0;

	var start_pecrcent = Number(pecent + percent_calc) + "%";
	var end_pecrcent = pecent + "%";

	if (!doclick) {
		obj.stop(false, false);
		obj.removeAttr("style");
		obj.css({ 
			"opacity":1, 
			"width":wid,
			"right":-1
		}).transition({
			"opacity":1, 
			"right":-1, 
			"width": start_pecrcent
		},timer);
	} else {
		obj.stop(false, false);
		obj.removeAttr("style");
		obj.css({ 
			"opacity":1, 
			"width":wid,
			"right":-1
		}).transition({
			"opacity":1, 
			"right":-1, 
			"width": start_pecrcent
		},timer,function(){
			// enable icon button		
			$("#icon_play").transition({"opacity":1},500,function () {
				$(this).removeClass("sets_loader");
				$(this).addClass("sets_play")
			});
			allow_clicks = true;
			
				
		});		
	}	
}







/* MIX */

app.app_mix.playfart = function () {
	
	if (!allow_clicks) { return; }	
	allow_clicks = false;
	
	// play mix	
	console.log("play mix");
	$("#icon_play").removeClass("sets_play");
	$("#icon_play").addClass("sets_loader");
	$("#icon_play").blur()
	app.soundmedia_mix = 1;
	app.app_mix.timer = 0;
	var timer = 0;
	var delay_timer = -50;
	for (var t=0; t<app.app_mix.mixArray.length; t++) {		
		setTimeout(app.app_mix.timeFunction,timer);		
		timer = Number(timer) + Number(app.app_mix.timeArray[t]) + delay_timer;
	}
	// allow playing one more time
	setTimeout(function(){app.app_mix.endSound()}, (timer+500));
}
app.app_mix.endSound = function() {
	$("#icon_play").removeClass("sets_loader");
	$("#icon_play").addClass("sets_play");
	allow_clicks = true;	
	
}

app.app_mix.timeFunction = function () {
	// play sound
	var mp3 = app.app_mix.mixArray[app.app_mix.timer];
	app.mixKey(mp3);
	//tmp_snd[app.app_mix.timer].play();
	app.app_mix.timer++;	
}



app.mixKey = function (url) {	

	if (app.soundmedia_mix == 0) {
		// no sound 
		// no nothing
	} else if (app.soundmedia_mix == 1) {	
		console.log("mix 1")
		var snd = app.soundFolder + app.mp3folder + url + ".mp3";	
		app.soundmedia_mix1 = new Howl({ urls: [snd], volume: 1, buffer: false }).play();
		app.soundmedia_mix = 2;	
	} else if (app.soundmedia_mix == 2) {	
		console.log("mix 2")
		var snd = app.soundFolder + app.mp3folder + url + ".mp3";	
		app.soundmedia_mix2 = new Howl({ urls: [snd], volume: 1, buffer: false }).play();
		app.soundmedia_mix = 3;	
	} else if (app.soundmedia_mix == 3) {	
		console.log("mix 3")
		var snd = app.soundFolder + app.mp3folder + url + ".mp3";	
		app.soundmedia_mix3 = new Howl({ urls: [snd], volume: 1, buffer: false }).play();
		app.soundmedia_mix = 4;	
	} else if (app.soundmedia_mix == 4) {	
		console.log("mix 4")
		var snd = app.soundFolder + app.mp3folder + url + ".mp3";	
		app.soundmedia_mix4 = new Howl({ urls: [snd], volume: 1, buffer: false }).play();
		app.soundmedia_mix = 5;	
	} else if (app.soundmedia_mix == 5) {	
		console.log("mix 5")
		var snd = app.soundFolder + app.mp3folder + url + ".mp3";	
		app.soundmedia_mix1 = new Howl({ urls: [snd], volume: 1, buffer: false }).play();
		app.soundmedia_mix = 0;	
	}	
}


</script>
