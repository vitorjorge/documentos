var jsprogress = 0;
var manifestProgress = 0;
var isSupportCanvas = "getContext" in document.createElement("canvas");
var images;

function initCogwheels(movieID) {
	var wheels = '';
	var wheelsS = '';
	var iseight = false;
	for ( var i = 0; i < 3; i++ ){
		wheelsS += '<div class="cogwheel shadow cogwheel' + i + '" id="cogwheel' + i + '_shad"></div>';
		wheels += '<div class="cogwheel cogwheel' + i + '" id="cogwheel' + i + '"></div>';
		iseight = movieID == 8;
	}
	$("#main_progressbar p").html('<div class="cogwheel_shad">' + wheelsS + '</div><div>' + wheels + '</div>');
	
	var r1 = 0; var r2 = 0; var r3 = 0;
	var s1 = 12; var s2 = 20; var s3 = 8;
	var speed = 28;
	var interval = setInterval( function(){
		if ($(".start_div").css("display") == "none" ){
			clearInterval( interval );
			return;
		}
		r1 = (r1 - speed/s1 + 360) % 360;
		r2 = (r2 + speed/s2 + 360) % 360;
		r3 = (r3 - speed/s3 + 360) % 360;
		
		$("#cogwheel0, #cogwheel0_shad").css("transform", "rotate("+r1+"deg)");
		
		$("#cogwheel1, #cogwheel1_shad").css("transform", "rotate("+r2+"deg)");
		
		$("#cogwheel2, #cogwheel2_shad").css("transform", "rotate("+r3+"deg)");
	}, 30);
	
	$(window).on("resize", onPreloaderResize);
	onPreloaderResize();
}
function initPreloader(manifest_url, list) {
	//var list = new Array();
    //Array.prototype.push.apply( list, arguments );
	
	//var manifest_url = list.shift();
	var total = list.length;
	var loaded = 0;
	
	getJS( );
	
	function getJS(){
		if ( loaded < total ){
			jQuery.getScript( list[loaded], onExternalJSLoad );
		} else {
			canvas = document.getElementById("anim");
			images = images||{};
			
			var _manifest = getManifest();
			
			if ( _manifest.length > 0 ) {
				var loader = new createjs.LoadQueue(false);
				loader.addEventListener("fileload", handleFileLoad);
				loader.addEventListener("progress", handleManifestProgress);
				loader.addEventListener("complete", handelManifestComplete);
				loader.loadManifest(addGPFX(_manifest,manifest_url));// get manifest from preload.js
			} else {
				setTimeout( handelManifestComplete, 1 );
			}
		}
	}
	function onExternalJSLoad(){
		loaded++;
		
		handleJSProgress(loaded / total);
		getJS( );
	}
}

function handleFileLoad(evt) {
	if (evt.item.type == "image") { images[evt.item.id] = evt.result; }
}

function handleJSProgress( val ){
	jsprogress = val;
	updateSiteProgress();
}

function handleManifestProgress(evt) {
	manifestProgress = evt.loaded / evt.total;
	updateSiteProgress();
}

function updateSiteProgress(evt) {
	//$("#main_progressbar").html( Math.round((jsprogress * .49 + manifestProgress * .51) * 100) + '%' );
}

function handelManifestComplete(){
	
	
	//return;
	$(window).off("resize", onPreloaderResize);
	
	
	$("#main_progressbar").css( {display: "none"} );
	initHeader();
	initSound();
	
	if ( window.onload )
		window.onload();
	
	handleComplete();
}



function updateBrowser(){
	var _url;
	switch ( browser() ){
		case 'Internet Explorer': _url = "http://windows.microsoft.com/ru-ru/internet-explorer/download-ie"; break;
		case 'Firefox': _url = "https://support.mozilla.org/ru/products/firefox"; break;
		case 'Opera': _url = "http://www.opera.com/"; break;
		case 'Google Chrome': _url = "https://www.google.ru/intl/ru/chrome/browser/"; break;
		case 'Safari': _url = "http://support.apple.com/kb/dl1531"; break;
		case 'Konqueror': _url = "http://www.konqueror.org/download/"; break;
		case 'Debian Iceweasel': _url = "http://packages.debian.org/ru/squeeze/iceweasel"; break;
		case 'SeaMonkey': _url = "http://mozilla-russia.org/products/seamonkey/"; break;
		default: _url = "http://browser-update.org/update.html"; break;
	}
	
	window.open(_url, "_blank");
}

function browser() {
    var ua = navigator.userAgent;
	
    if (ua.search(/MSIE/) >= 0) return 'Internet Explorer';
    if (ua.search(/Firefox/) >= 0) return 'Firefox';
    if (ua.search(/Opera/) >= 0) return 'Opera';
    if (ua.search(/Chrome|crios/i) >= 0) return 'Google Chrome';
    if (ua.search(/Safari/) >= 0) return 'Safari';
    if (ua.search(/Konqueror/) >= 0) return 'Konqueror';
    if (ua.search(/Iceweasel/) >= 0) return 'Debian Iceweasel';
    if (ua.search(/SeaMonkey/) >= 0) return 'SeaMonkey';

    // Ð‘Ñ€Ð°ÑƒÐ·ÐµÑ€Ð¾Ð² Ð¾Ñ‡ÐµÐ½ÑŒ Ð¼Ð½Ð¾Ð³Ð¾, Ð²ÑÐµ Ð²Ð¿Ð¸ÑÑ‹Ð²Ð°Ñ‚ÑŒ ÑÐ¼Ñ‹ÑÐ»Ðµ Ð½ÐµÑ‚, Gecko Ð¿Ð¾Ñ‡Ñ‚Ð¸ Ð²ÐµÐ·Ð´Ðµ Ð²ÑÑ‚Ñ€ÐµÑ‡Ð°ÐµÑ‚ÑÑ
    if (ua.search(/Gecko/) > 0) return 'Gecko';

    // Ð° Ð¼Ð¾Ð¶ÐµÑ‚ ÑÑ‚Ð¾ Ð²Ð¾Ð¾Ð±Ñ‰Ðµ Ð¿Ð¾Ð¸ÑÐºÐ¾Ð²Ñ‹Ð¹ Ñ€Ð¾Ð±Ð¾Ñ‚
    return 'Search Bot';
}

function onPreloaderResize(e){
	var s = Math.min(1, $(window).innerHeight() / (341 + 51 + 60) );
	$("#main_progressbar p").css( {
		transform: "scale(" + s + ", " + s + ")"
	});
}