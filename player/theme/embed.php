<?php if (!defined('SITE_ROOT')) exit;
		// GkPlugin Encode
		if($CONFIG['UseGkEncode']){
			include('Gkencode.php');
			function gkEncode($link){
				global $CONFIG;
				$gkencode = new Gkencode();
				$secretKey = $CONFIG['GkSecretKey'];//not change
				return $gkencode->encrypt($link,$secretKey);
			}
		}
		function Encode($link){
			global $CONFIG;
			$Encode = $link;
			if($CONFIG['UseGkEncode']){
				$Encode = $CONFIG['GkPrefix'].'*'.gkEncode($link);
			}
			return $Encode;
		}


		$EmbID = $_GET['page'];
		$Pegar = @mysql_query("SELECT * FROM Embeds WHERE EmbedID='$EmbID' LIMIT 1") or die(mysql_error());
		$Resultado = @Mysql_Fetch_Assoc ($Pegar);
		if($Resultado){
			$BgImg = $Resultado['BgImage'];
			$Title = $Resultado['Title'];
			$Type = $Resultado['type'];

			$Data = @unserialize($Resultado['ServerData']);
			if($Data == '')
				$Data = @unserialize(@utf8_decode($Resultado['ServerData']));

		}
		$server = $_SERVER['SERVER_NAME'];
		$endereco = $_SERVER ['REQUEST_URI'];

		if($Type == 'serie'){
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $Title; ?> | <?php echo $CONFIG['SiteTitle']; ?></title>
	<meta name="robots" content="noindex">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<link href="<?php echo themePath('style.css'); ?>?nocache" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.js'); ?>?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.html5.js'); ?>?nocache"></script>
	<script type="text/javascript">jwplayer.key="N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ==";</script>
	<script type="text/javascript" src="<?php echo themePath('gkplugins/jwplayer.js'); ?>?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('gkplugins/gkpluginsAPI.js'); ?>?nocache"></script>
	<script type="text/javascript">
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0 b(2,4){$.a({c:\'d\',9:\'f\',8:{5:2},6:7,1:0(1){e(1,4);g(n);o(p);q(m,l)},h:0(3){i(3)},j:0(k){r()}})}',28,28,'function|success|idS|response|cc|id|timeout|10000|data|type|ajax|CPlayStream|url|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/callplayerjw6/'?>|CPlayStreamS|POST|clearInterval|error|CallPlayStreamE|beforeSend|xhr|500|HideLoadingVideo|LoadingTime|UpLoading|100|setTimeout|UnhideLoadingVideo'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('U g=\'\';W T(1,6,9,a){g=6;S(a!=\'\'){p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"R":{Q:a,V:11,13:14,12:\'X\',Y:\'Z\',},"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}10{p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}}',62,67,'|DivID|iframe|height|width||VideoURL|100|true|SvURL|CC|Player|Flash|abouttext|<?php echo themePath('gkplugins/lol.zip'); ?>|google|rURL|com|aboutlink|skin|screencolor|<?php echo themePath('gkplugins/player.swf'); ?>|flashplayer|id|000000|jwplayer5|bottom|controlbar|bufferlength|setup|http|Compartilhe|heading|allowfullscreen|NO|este|video|embedid|nocacheswf|nocachexml|link|scrolling|<?php echo themePath('gkplugins/proxy.swf'); ?>|code|plugins|<?php echo themePath('gkplugins/sharing-3.swf'); ?>|620|src|marginwidth|370|frameborder|marginheight|file|<?php echo themePath('gkplugins/captions-2.swf'); ?>|if|CallPlay|var|fontsize|function|bold|color|ffe402|else|18|fontweight|fonttype|16'.split('|'),0,{}))
		var captions = {
			color: '#ffe402',
			fontSize: 20,
			fontOpacity: 100,
			backgroundColor: '#000000',
			backgroundOpacity: 75,
			edgeStyle: 'dropshadow',
			windowColor: '#000000',
			windowOpacity: 0
		};
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('l E(1,d,a,6,j){x 4=y P();4=G(a);K(J(4)>0){v(1).M({c:\'9%\',f:\'9%\',I:\'H\',L:\'h\',5:"O",N:[{F:z(d),A:B(4),i:"k",5:"7",D:[{C:j,11:"15ês",Q:"8","13":17}]}],8:8,19:[{g:"1b"},{g:"h",b:"7"}],1a:{},i:"k",5:"7",12:{U:T(\'<u b="\'+6+\'" c="R" f="W" 10="0" Z="0" Y="0" X="14" V></u>\'),S:6}});v(1).16(l(){2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)})}18{2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)}}',62,74,'|ID|document|getElementById|nData|provider|URL|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/jwplayer/PauMediaProvider.swf'?>|captions|100|Data|src|width|iData|10000|height|type|html5|startparam|cData|begin|function|block|setTimeout|NotFoundVideo|style|innerHTML|ReporteErrorServer||display|iframe|jwplayer|changserver|var|new|CallImagem|sources|CallSources|file|tracks|CallPlayStream|image|CallInit|glow|skin|countProps|if|primary|setup|playlist|video|Array|kind|620|link|encodeURI|code|allowfullscreen|370|scrolling|marginheight|marginwidth|frameborder|label|sharing|default|NO|Portugu|onError|true|else|modes|PauMediaProvider|html5'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 f(){$.e({7:"6",4:"2",3:{5:"0",8:"d"},c:1(a){$(\'#9\').b(a)}})}',16,16,'|function|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/ad.php'?>|data|url|id|GET|type|Name|Svplayer||before|success|ADS|ajax|Now'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5 d(){$(1).2("#3").c("4")}5 e(){$(1).2(".7").8("6",g().a()[0].9);$(1).2("#3").b("4")}5 h(){$(1).2(".7").8("6",f().a()[0].9);$(1).2("#3").b("4")}',18,18,'|document|find|showload|fast|function|href|downelem|attr|file|getPlaylist|show|hide|CloseDownload|download5|jwplayer|jwplayer5|download6'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 6=\'r\';4 1=\'\';4 3=\'\';4 2=\'\';5 s(0){b(1!=\'\'){$.9({c:"d",0:"e",8:{7:6,1:1,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}u b(3!=\'\'&&2!=\'\'){$.9({c:"d",0:"e",8:{7:6,t:3,q:2,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}}',31,31,'url|SvID|EpisodeID|SeasonID|var|function|rEmbedID|embed|data|ajax||if|type|POST|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/report.php'?>|com|success|By|<?php echo $CallToBackToWork('4272756e6f477973696e'); ?>|<?php echo $CallToBackToWork('6272756e6f677973696e'); ?>|live|successfully|completed|Report|console|log|eID|<?php echo $EmbID; ?>|ReporteErrorServer|sID|else'.split('|'),0,{}))
	</script>
	<?php include('header.php'); ?>

	<!-- <style> #g553{ position:fixed !important; position:absolute; top:-3px; top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px"); left:-1px; width:102%;height:99%; background-color:#2e495a; opacity:.95; filter:alpha(opacity=95); display:block; padding:20% 0} #g553 *{ text-align:center; margin:0 auto; display:block; filter:none; font:bold 14px Verdana,Arial,sans-serif; text-decoration:none} #g553 ~ *{display:none} </style> <div id="g553"></div> <script>window.document.getElementById("g553").parentNode.removeChild(window.document.getElementById("g553"));(function(e,t){function n(e){e&&g553.nextFunction()}var r=e.document,i=["i","s","u"];n.prototype={rand:function(e){return Math.floor(Math.random()*e)},getElementBy:function(e,t){return e?r.getElementById(e):r.getElementsByTagName(t)},getStyle:function(e){var t=r.defaultView;return t&&t.getComputedStyle?t.getComputedStyle(e,null):e.currentStyle},deferExecution:function(e){setTimeout(e,2e3)},insert:function(e,t){var n=r.createElement("font"),i=r.body,s=i.childNodes.length,o=i.style,u=0,a=0;if("g553"==t){n.setAttribute("id",t);o.margin=o.padding=0;o.height="100%";for(s=this.rand(s);u<s;u++)1==i.childNodes[u].nodeType&&(a=Math.max(a,parseFloat(this.getStyle(i.childNodes[u]).zIndex)||0));a&&(n.style.zIndex=a+1);s++}n.innerHTML=e;i.insertBefore(n,i.childNodes[s-1])},displayMessage:function(e){var t=this;e="abisuq".charAt(t.rand(5));t.insert("<"+e+'><img src="http://i.imgur.com/Lge0oP9.jpg" alt="" /> <a href="javascript:location.reload();">[ Recarregar a Página ]</a>'+("</"+e+">"),"g553");r.addEventListener&&t.deferExecution(function(){t.getElementBy("g553").addEventListener("DOMNodeRemoved",function(){t.displayMessage()},!1)})},i:function(){for(var e="AdBanner_S,adBelt,ad_bar,adv-300,advert_05,bodyAd4,tdGoogleAds,ad,ads,adsense".split(","),t=e.length,n="",r=this,i=0,s="abisuq".charAt(r.rand(5));i<t;i++)r.getElementBy(e[i])||(n+="<"+s+' id="'+e[i]+'"></'+s+">");r.insert(n);r.deferExecution(function(){for(i=0;i<t;i++)if(null==r.getElementBy(e[i]).offsetParent||"none"==r.getStyle(r.getElementBy(e[i])).display)return r.displayMessage("#"+e[i]+"("+i+")");r.nextFunction()})},s:function(){var n={"pagead2.googlesyndic":"google_ad_client","js.adscale.de/getads":"adscale_slot_id","get.mirando.de/miran":"adPlaceId"},i=this,s=i.getElementBy(0,"script"),o=s.length-1,u,a,f,c;r.write=null;for(r.writeln=null;0<=o;--o)if(u=s[o].src.substr(7,20),n[u]!==t){f=r.createElement("script");f.type="text/javascript";f.src=s[o].src;a=n[u];e[a]=t;f.onload=f.onreadystatechange=function(){c=this;e[a]!==t||c.readyState&&"loaded"!==c.readyState&&"complete"!==c.readyState||(e[a]=f.onload=f.onreadystatechange=null,s[0].parentNode.removeChild(f))};s[0].parentNode.insertBefore(f,s[0]);i.deferExecution(function(){if(e[a]===t)return i.displayMessage(f.src);i.nextFunction()});return}i.nextFunction()},u:function(){var e="-cpm-ads.,.adtooltip&,.com/adv_,/ad/view/ad,/ad_links/ad,/delivery/fc.,/include/ad/ad,/index_ads.,/trade_punder.,-720x120-".split(","),n=this,r=n.getElementBy(0,"img"),s,o;r[0]!==t&&r[0].src!==t&&(s=new Image,s.onload=function(){o=this;o.onload=null;o.onerror=function(){i=null;n.displayMessage(o.src)};o.src=r[0].src+"#"+e.join("")},s.src=r[0].src);n.deferExecution(function(){n.nextFunction()})},nextFunction:function(){var e=i[0];e!==t&&(i.shift(),this[e]())}};e.g553=g553=new n;r.addEventListener?e.addEventListener("load",n,!1):e.attachEvent("onload",n)})(window)</script>
	-->
	<script type="text/javascript">

		$(document).ready(function(){
			$('.box').each(function(){
				var content = $(this).find('.content'),
					tab = $('> ul li',this);

				$('div', content).eq(0).show();
				$('.box > ul li').first().addClass('active');
				tab.click(function(){
					tab.removeClass('active');
					$(this).addClass('active');
					$('div', content).hide().eq($(this).index()).fadeIn(500).show();
				});
			});


			window.InitPlayer = function InitPlayer(s,e,t){
				<?php for ($i = 0; $i < count($Data); $i++) { ?>
					if(s == <?php echo $i+1; ?>){
						SeasonID = s;
						if(t == 'dub'){
							<?php
								//Ep Dub
								if(isset($Data[$i]['EpDub'])) {
								for ($EpDub = 0; $EpDub < count($Data[$i]['EpDub']); $EpDub++) {
									$encryptLink = Encode($Data[$i]['EpDub'][$EpDub]['URL']);
									if($Data[$i]['EpDub'][$EpDub]['sType'] == 1001){ ?>
										if(e == <?php echo $EpDub+1; ?>){
											$('#player').css('display','none');
											addiframe('<?php echo $Data[$i]['EpDub'][$EpDub]['URL']; ?>');
											$('#Svplayer').css('display','block');
										}
									<?php
										}else if($Data[$i]['EpDub'][$EpDub]['sType'] == 1000){
									?>
									if(e == <?php echo $EpDub+1; ?>){
										EpisodeID = e+'[Dub]';
										$('#player').css('display','none');
										CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>', '');

										jwplayer5("SvplayerID").onReady(function(){
											jwplayer5("SvplayerID").getPlugin("dock").setButton('changs',changserver,"<?php echo themePath('gkplugins/mudarep.png'); ?>","<?php echo themePath('gkplugins/mudarep.png'); ?>");
											jwplayer5("SvplayerID").getPlugin("dock").setButton('showdown',showdownload,"<?php echo themePath('gkplugins/baixar.png'); ?>","<?php echo themePath('gkplugins/baixar.png'); ?>");
											Now();
											return false
										});
										$('#Svplayer').css('display','block');
									}
								<?php }else{ ?>
									if(e == <?php echo $EpDub+1; ?>){
										EpisodeID = e+'[Dub]';
										$('#player').css('display','none');
										$('#Svplayer').css('display','block');
										CPlayStream('<?php echo encrypt($i.'_'.$EpDub.'_dub');?>', '');
									}

								<?php } } } ?>
						}
						if(t == 'leg'){
							<?php
								//Ep Leg
								if(isset($Data[$i]['EpLeg'])) {
								for ($EpLeg = 0; $EpLeg < count($Data[$i]['EpLeg']); $EpLeg++) {
									$encryptLink = Encode($Data[$i]['EpLeg'][$EpLeg]['URL']);
									if($Data[$i]['EpLeg'][$EpLeg]['sType'] == 1001){ ?>
									if(e == <?php echo $EpLeg+1; ?>){
										$('#player').css('display','none');
										addiframe('<?php echo $Data[$i]['EpLeg'][$EpLeg]['URL']; ?>');
										Now();
										$('#Svplayer').css('display','block');
									}
									<?php
									}else if($Data[$i]['EpLeg'][$EpLeg]['sType'] == 1000){
									?>
									if(e == <?php echo $EpLeg+1; ?>){
										EpisodeID = e+'[Leg]';
										$('#player').css('display','none');
										<?php if($Data[$i]['EpLeg'][$EpLeg]['CC'] != ""){ ?>
										CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>','<?php echo $Data[$i]['EpLeg'][$EpLeg]['CC']; ?>');
										<?php }else{ ?>
										CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>','');
										<?php } ?>
										jwplayer5("SvplayerID").onReady(function(){
											jwplayer5("SvplayerID").getPlugin("dock").setButton('changs',changserver,"<?php echo themePath('gkplugins/mudarep.png'); ?>","<?php echo themePath('gkplugins/mudarep.png'); ?>");
											jwplayer5("SvplayerID").getPlugin("dock").setButton('showdown',showdownload,"<?php echo themePath('gkplugins/baixar.png'); ?>","<?php echo themePath('gkplugins/baixar.png'); ?>");
											Now();
											return false
										});
										$('#Svplayer').css('display','block');


									}
						<?php }else{ ?>
									if(e == <?php echo $EpLeg+1; ?>){
										EpisodeID = e+'[Leg]';
										$('#player').css('display','none');
										$('#Svplayer').css('display','block');
										<?php if($Data[$i]['EpLeg'][$EpLeg]['CC'] != ""){ ?>
										CPlayStream('<?php echo encrypt($i.'_'.$EpLeg.'_leg');?>', '<?php echo $Data[$i]['EpLeg'][$EpLeg]['CC']; ?>');
										<?php }else{ ?>
										CPlayStream('<?php echo encrypt($i.'_'.$EpLeg.'_leg');?>', '');
										<?php } ?>
									}
						<?php } } } ?>
						}

					}
				<?php }	?>
			}
			$(".Svplayer").on('click', '#CloseSv', function () {
				$('#Svplayer').css('display','none');
				$('#player').css('display','block');
				$('#Svplayer').html('<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>');
			});
			function addiframe(URL){
				var ifHTML= '<div class="CloseButton" id="CloseSv" style="display: block;"></div><iframe src="'+URL+'" width="100%" height="100%" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
				$('#SvplayerID').html(ifHTML);
			}
		});
		function CPlayStreamS(success, cc){
			CallPlayStream('SvplayerID', '<?php echo ''; ?>', success, '<?php echo "http://" . $server . $endereco; ?>', cc);
			jwplayer("SvplayerID").onReady(function() {
				this.addButton("<?php echo themePath('jwplayer/change.png'); ?>", "Mudar Episódio", changserver, 'ChangeServer');
				this.addButton("<?php echo themePath('jwplayer/download.png'); ?>", "Download Video", download6,"download");
			});
			Now();
		}
		function CallPlayStreamE(response){
			HideLoadingVideo();
			changserver();
		}
		function HideLoadingVideo(){
			$('#LoadingVideo').css('display','none');
		}
		function UnhideLoadingVideo(){
			$('#LoadingVideo').css('display','block');
		}
		function changserver(){
			$('#Svplayer').css('display','none');
			$('#player').css('display','block');
			$('#Svplayer').html('<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>');
			$('#NotFoundVideo').css('display','none');
		}
	</script>
	</head>
	<body>
		<style>
			body{
				overflow: hidden;
				font: normal 12px/20px Arial,Helvetica,sans-serif;
				margin: 0px;
				height: 100%;
				width: 100%;
				background-size: 100%;
				background-repeat: no-repeat;
				background-color: #262b36;
                color: #fff;
			}
			#bgPlayer {
				width: 104%;
				height: 104%;
				position: absolute;
				top: -2%;
				left: -2%;
				-webkit-filter: blur(6px);
				-khtml-filter: blur(6px);
				-moz-filter: blur(6px);
				-ms-filter: blur(6px);
				-o-filter: blur(6px);
				filter: blur(6px);
				background-repeat: no-repeat;
				background-size: cover;
				z-index: 1;
			}
			#bgBackPlayer {
				width: 100%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.6);
				position: absolute;
				top: 0px;
				left: 0px;
				z-index: 2;
			}

			.Svplayer .CloseButton {
				z-index: 9999;
				cursor: alias;
				position: absolute;
				width: 146px;
				height: 29px;
				background-image: url(http://i.imgur.com/sONu6tC.png);
				background-color: rgba(255, 5, 5, 0);
				/* background-size: 50px; */

				top: 0px;
				/* right: 0px; */

				-webkit-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				-moz-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				-o-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;

				visibility: hidden;
				opacity: 0;
			}
			.Svplayer:hover .CloseButton {
				-webkit-transition-delay:0s;
				-moz-transition-delay:0s;
				-o-transition-delay:0s;
				transition-delay:0s;

				visibility: visible;
				opacity: 1;
			}
    </style>
		<script src="code.js"></script>
		<div id="Svplayer" class="Svplayer" style="position: absolute; width: 100%; height: 100%;bottom: -1.5px;background-color: #000;border-width: 1px;  border-style: solid;  border-color: #000; display: none;">
			<div class="CloseButton" id="CloseSv" style="display: block;"></div>
			<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>
		</div>


<div id="bgBody" style="<?php if($BgImg != ''){ ?>background-image: url(<?php echo $BgImg; ?>);<?php } ?>"><div class="bg"></div></div>		
<div id="player">
<div id="bgPlayer"></div>
<div class="flutua">
<div class="embed">
<div class="box">
					
<div id="topMain">


<div class="infoSerieTop showElement">
<div class="titleSerieTop"><?php echo $Title; ?></div>
<div class="seasonSerieTop">Assistir Todas Temporadas</div>
<div class="labelSeasTop">TEMPORADAS</div>
</div>

<div class="seasonsTop">

</div>

</div>
                        
						<ul id="menu-t" class="menu-temps" style="top: -62px;z-index: 999;left: 300px;">
							<?php for ($i = 0; $i < count($Data); $i++) { ?><li><div><?php echo $i+1; ?></div></li><?php }	?>
						</ul>
						
						
						
						
						<div class="clear">
						</div>
						<div id="seriePlayer2016">
						<div class="content">
							<?php for ($i = 0; $i < count($Data); $i++) { ?>
								<div style="display: none;margin: 0 auto;width: 760px;">
								<ul class="listEpis2016">
									<?php if(isset($Data[$i]['EpDub'])) { if(count($Data[$i]['EpDub']) > 0) { ?>
<p>
<a class="titulo-opcao" id="xmain">Assistir <?php echo $i+1; ?>° Temporada Dublado</a>
<c id="dub<?php echo $i+1; ?>" style="display: table;margin-left: 15px;width: 93%;text-align: left;">
<?php
//Ep Dub
for ($EpDub = 0; $EpDub < count($Data[$i]['EpDub']); $EpDub++) { ?>
<a class="video" href="javascript: InitPlayer('<?php echo $i+1; ?>', '<?php echo $EpDub+1; ?>','dub');"><?php if($EpDub >= 0 && $EpDub < 9){ echo ''.($EpDub+1); }else{ echo $EpDub+1; } ?>. <?php echo $Data[$i]['EpDub'][$EpDub]['Name']; ?><span class="episodeQual">720p</span></a><br>
<?php } ?>
</c>
</p>
									<?php } } ?>
								</ul>
								<ul class="listEpis2016">
									<?php  if(isset($Data[$i]['EpLeg'])){ if(count($Data[$i]['EpLeg']) > 0) { ?>
<p>
<a class="titulo-opcao" id="xmain">Assistir <?php echo $i+1; ?>° Temporada Legendado</a>
<c id="leg<?php echo $i+1; ?>" style="display: table;margin-left: 15px;width: 93%;text-align: left;">
<?php
//Ep Leg
for ($EpLeg = 0; $EpLeg < count($Data[$i]['EpLeg']); $EpLeg++) { ?>
<a class="video" href="javascript: InitPlayer('<?php echo $i+1; ?>', '<?php echo $EpLeg+1; ?>','leg');"><?php if($EpLeg >= 0 && $EpLeg < 9){ echo ''.($EpLeg+1); }else{ echo $EpLeg+1; } ?>. <?php echo $Data[$i]['EpLeg'][$EpLeg]['Name']; ?><span class="episodeQual">720p</span></a><br>
<?php } ?>
</c>
</p>
									<?php } } ?>
								</ul>
								</div>
							<?php }	?>
						</div>
						</div>
						<!-- .content -->
					</div>
				</div>
			</div>

			<div class="panel_boot" style="font-size:10px;">
			<span style="color: #339966;"><strong>O Player acima contém tecnologia HD (Hight Definition) melhor qualidade Blu-Ray da internet.</strong></span><br>
			<span style="color: #339966;"><strong>Não somos responsáveis pelos arquivos, nem garantimos sua funcionalidade, apenas indexamos no nosso site.</strong></span><br>
			</div>
		</div>
		<div id="showload" style="display:none;"><a class="close" href="javascript:void(0)" onclick="CloseDownload();"><img src="http://i.imgur.com/Hzrz9jw.gif"></a><span id="texload"><a href="" class="downelem" download="filme">-&gt; BAIXAR &lt;-</a><span></span></span></div>

		<div id='LoadingVideo' style="display:none">
			<style>
			#LoadingVideoDiv {
				font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
				color: #fff;
				height: 200px;
				z-index: 2;
				width: 100%;
				text-align: center;
				top: 30%;
				margin: .83em 0;
				position: absolute;
			}
			</style>

			<script>
				function UpLoading(porcent){ }
			</script>
		</div>

		<div id='NotFoundVideo' style="display:none">
			<style>
			<!-- @import url(http://fonts.googleapis.com/css?family=Merriweather:900);
			* {
				margin: 0;
				padding: 0;
				-webkit-user-select:none;
				   -moz-user-select:none;
					-ms-user-select:none;
						user-select:none;
			}

			html {
				height: 100%;
				overflow: hidden;
			}
			-->
			canvas {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				font-family: 'Merriweather', serif;
			}

			.container {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100vh;
				background: -webkit-radial-gradient(center, ellipse, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background: radial-gradient(ellipse at center, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background-color: #EDEAF9;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#00000000', endColorstr = '#e6000000', GradientType = 1);
			}

			.container div {
				position: absolute;
				left: 0;
				top: -20%;
				width: 100%;
				height: 20%;
				background-color: hsla(0, 0%, 0%, .09);
				box-shadow: 0 0 10px hsla(0, 0%, 0%, .2);
				-webkit-animation: waves 12s linear infinite;
						animation: waves 12s linear infinite;
			}

			.container div:nth-child(1) {
				-webkit-animation-delay: 0;
						animation-delay: 0;
			}

			.container div:nth-child(2) {
				-webkit-animation-delay: 4s;
						animation-delay: 4s;
			}

			.container div:nth-child(3) {
				-webkit-animation-delay: 8s;
						animation-delay: 8s;
			}

			@-webkit-keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			@keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			h1s {
				z-index: 3;
				position: absolute;
				font: bold 20vw 'Merriweather', serif;
				left: 50%;
				top: 50%;
				margin-top: -10vh;
				width: 100%;
				margin-left: -50%;
				text-align: center;
				color: transparent;
				text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks .8s linear infinite;
						animation: flicks .8s linear infinite;
			}

			h2s {
				z-index: 2;
				position: absolute;
				font: bold 3.5vw 'Merriweather', serif;
				top: 30%;
				width: 100%;
				text-align: center;

				color: hsla(0, 96%, 30%, 0.59);
				text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);
				/*
				color: transparent;
				text-shadow: 0 0 12px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks 1.5s linear infinite;
						animation: flicks 1.5s linear infinite;
				*/
			}
			span0{
			   font-size:7.5vw;
			   color: hsla(0, 8%, 33%, 0.1);
			   text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);
			   /*
			   text-shadow: 0 0 24px hsla(0, 0%, 0%, 1);
			   -webkit-animation: spanflicks 1s linear infinite;
					   animation: spanflicks 1s linear infinite;
				*/
			}
			h3s{
			  z-index:2;
			  position: absolute;
			  font: bold 3vw 'Merriweather', serif;
			  top: 60%;
			  width: 100%;
			  text-align: center;
			  color: hsla(0,0%,0%,.5);
			  text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
			  /*
			  color: transparent;
			  text-shadow: 0 0 12px hsla(0, 0%, 0%, .4);
			  -webkit-animation: flicks 1s linear infinite;
					  animation: flicks 1s linear infinite;
				*/
			}


			@-webkit-keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}


			@keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}

			@-webkit-keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}

			@keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}
			</style>
			<h2s>Ops! Este Arquivo Não Foi Encontrado! Use os servidores alternativos!</h2s>
			<h3s>Retornando ao menu de seleção em 10 segundos</h3s>
			<div class="container"><div></div><div></div><div></div></div>
			<canvas id="canv"></canvas>
			<script>
			/*
			var noise = ( function () {
					var ب_ب;
					var ಥ_ಥ;
					var imgData;
					var px;
					var w;
					var h;
					var flickInt;

					var flicker = function () {
						ب_ب = document.getElementById('canv');
						ಥ_ಥ = ب_ب.getContext('2d');
						ب_ب.width = w = 700;
						ب_ب.height = h = 500;
						ಥ_ಥ.fillStyle = 'hsla(255,255%,255%,1)';
						ಥ_ಥ.fillRect(0, 0, w, h);
						ಥ_ಥ.fill();
						imgData = ಥ_ಥ.getImageData(0, 0, w, h);
						px = imgData.data;
						flickInt = setInterval(flicks, 30);
					};

					var flicks = function () {
						for (var i = 0; i < px.length; i += 4) {
							var col = (Math.random() * 255) + 50;
							px[i] = col;
							px[i + 1] = col;
							px[i + 2] = col;
						}
						ಥ_ಥ.putImageData(imgData, 0, 0);
					};

					return {
						init: flicker
					};
				}());

				noise.init();
				*/
			</script>
		</div>
	</body>
</html>

<?php }else{

if(count($Data) == 0) {

		//Somente um servidor
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $Title; ?> | <?php echo $CONFIG['SiteTitle']; ?></title>
		<meta name="robots" content="noindex">
		<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
		<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
		<link href="<?php echo themePath('style.css'); ?>?nocache" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js?nocache"></script>
		<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.js'); ?>?nocache"></script>
		<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.html5.js'); ?>?nocache"></script>
		<script type="text/javascript">jwplayer.key="N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ==";</script>
		<script type="text/javascript" src="<?php echo themePath('gkplugins/jwplayer.js'); ?>?nocache"></script>
		<script type="text/javascript" src="<?php echo themePath('gkplugins/gkpluginsAPI.js'); ?>?nocache"></script>
		<script type="text/javascript">
			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0 b(2,4){$.a({c:\'d\',9:\'f\',8:{5:2},6:7,1:0(1){e(1,4);g(n);o(p);q(m,l)},h:0(3){i(3)},j:0(k){r()}})}',28,28,'function|success|idS|response|cc|id|timeout|10000|data|type|ajax|CPlayStream|url|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/callplayerjw6/'?>|CPlayStreamS|POST|clearInterval|error|CallPlayStreamE|beforeSend|xhr|500|HideLoadingVideo|LoadingTime|UpLoading|100|setTimeout|UnhideLoadingVideo'.split('|'),0,{}))
			eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('U g=\'\';W T(1,6,9,a){g=6;S(a!=\'\'){p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"R":{Q:a,V:11,13:14,12:\'X\',Y:\'Z\',},"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}10{p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}}',62,67,'|DivID|iframe|height|width||VideoURL|100|true|SvURL|CC|Player|Flash|abouttext|<?php echo themePath('gkplugins/lol.zip'); ?>|google|rURL|com|aboutlink|skin|screencolor|<?php echo themePath('gkplugins/player.swf'); ?>|flashplayer|id|000000|jwplayer5|bottom|controlbar|bufferlength|setup|http|Compartilhe|heading|allowfullscreen|NO|este|video|embedid|nocacheswf|nocachexml|link|scrolling|<?php echo themePath('gkplugins/proxy.swf'); ?>|code|plugins|<?php echo themePath('gkplugins/sharing-3.swf'); ?>|620|src|marginwidth|370|frameborder|marginheight|file|<?php echo themePath('gkplugins/captions-2.swf'); ?>|if|CallPlay|var|fontsize|function|bold|color|ffe402|else|18|fontweight|fonttype|16'.split('|'),0,{}))
			var captions = {
				color: '#ffe402',
				fontSize: 20,
				fontOpacity: 100,
				backgroundColor: '#000000',
				backgroundOpacity: 75,
				edgeStyle: 'dropshadow',
				windowColor: '#000000',
				windowOpacity: 0
			};
			eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('l E(1,d,a,6,j){x 4=y P();4=G(a);K(J(4)>0){v(1).M({c:\'9%\',f:\'9%\',I:\'H\',L:\'h\',5:"O",N:[{F:z(d),A:B(4),i:"k",5:"7",D:[{C:j,11:"15ês",Q:"8","13":17}]}],8:8,19:[{g:"1b"},{g:"h",b:"7"}],1a:{},i:"k",5:"7",12:{U:T(\'<u b="\'+6+\'" c="R" f="W" 10="0" Z="0" Y="0" X="14" V></u>\'),S:6}});v(1).16(l(){2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)})}18{2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)}}',62,74,'|ID|document|getElementById|nData|provider|URL|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/jwplayer/PauMediaProvider.swf'?>|captions|100|Data|src|width|iData|10000|height|type|html5|startparam|cData|begin|function|block|setTimeout|NotFoundVideo|style|innerHTML|ReporteErrorServer||display|iframe|jwplayer|changserver|var|new|CallImagem|sources|CallSources|file|tracks|CallPlayStream|image|CallInit|glow|skin|countProps|if|primary|setup|playlist|video|Array|kind|620|link|encodeURI|code|allowfullscreen|370|scrolling|marginheight|marginwidth|frameborder|label|sharing|default|NO|Portugu|onError|true|else|modes|PauMediaProvider|html5'.split('|'),0,{}))
			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 f(){$.e({7:"6",4:"2",3:{5:"0",8:"d"},c:1(a){$(\'#9\').b(a)}})}',16,16,'|function|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/ad.php'?>|data|url|id|GET|type|Name|Svplayer||before|success|ADS|ajax|Now'.split('|'),0,{}))
			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5 d(){$(1).2("#3").c("4")}5 e(){$(1).2(".7").8("6",g().a()[0].9);$(1).2("#3").b("4")}5 h(){$(1).2(".7").8("6",f().a()[0].9);$(1).2("#3").b("4")}',18,18,'|document|find|showload|fast|function|href|downelem|attr|file|getPlaylist|show|hide|CloseDownload|download5|jwplayer|jwplayer5|download6'.split('|'),0,{}))
			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 6=\'r\';4 1=\'\';4 3=\'\';4 2=\'\';5 s(0){b(1!=\'\'){$.9({c:"d",0:"e",8:{7:6,1:1,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}u b(3!=\'\'&&2!=\'\'){$.9({c:"d",0:"e",8:{7:6,t:3,q:2,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}}',31,31,'url|SvID|EpisodeID|SeasonID|var|function|rEmbedID|embed|data|ajax||if|type|POST|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/report.php'?>|com|success|By|<?php echo $CallToBackToWork('4272756e6f477973696e'); ?>|<?php echo $CallToBackToWork('6272756e6f677973696e'); ?>|live|successfully|completed|Report|console|log|eID|<?php echo $EmbID; ?>|ReporteErrorServer|sID|else'.split('|'),0,{}))
		</script>
		<?php include('header.php'); ?>
		<!--<style> #g553{ position:fixed !important; position:absolute; top:-3px; top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px"); left:-1px; width:102%;height:99%; background-color:#2e495a; opacity:.95; filter:alpha(opacity=95); display:block; padding:20% 0} #g553 *{ text-align:center; margin:0 auto; display:block; filter:none; font:bold 14px Verdana,Arial,sans-serif; text-decoration:none} #g553 ~ *{display:none} </style> <div id="g553"></div> <script>window.document.getElementById("g553").parentNode.removeChild(window.document.getElementById("g553"));(function(e,t){function n(e){e&&g553.nextFunction()}var r=e.document,i=["i","s","u"];n.prototype={rand:function(e){return Math.floor(Math.random()*e)},getElementBy:function(e,t){return e?r.getElementById(e):r.getElementsByTagName(t)},getStyle:function(e){var t=r.defaultView;return t&&t.getComputedStyle?t.getComputedStyle(e,null):e.currentStyle},deferExecution:function(e){setTimeout(e,2e3)},insert:function(e,t){var n=r.createElement("font"),i=r.body,s=i.childNodes.length,o=i.style,u=0,a=0;if("g553"==t){n.setAttribute("id",t);o.margin=o.padding=0;o.height="100%";for(s=this.rand(s);u<s;u++)1==i.childNodes[u].nodeType&&(a=Math.max(a,parseFloat(this.getStyle(i.childNodes[u]).zIndex)||0));a&&(n.style.zIndex=a+1);s++}n.innerHTML=e;i.insertBefore(n,i.childNodes[s-1])},displayMessage:function(e){var t=this;e="abisuq".charAt(t.rand(5));t.insert("<"+e+'><img src="http://i.imgur.com/Lge0oP9.jpg" alt="" /> <a href="javascript:location.reload();">[ Recarregar a Página ]</a>'+("</"+e+">"),"g553");r.addEventListener&&t.deferExecution(function(){t.getElementBy("g553").addEventListener("DOMNodeRemoved",function(){t.displayMessage()},!1)})},i:function(){for(var e="AdBanner_S,adBelt,ad_bar,adv-300,advert_05,bodyAd4,tdGoogleAds,ad,ads,adsense".split(","),t=e.length,n="",r=this,i=0,s="abisuq".charAt(r.rand(5));i<t;i++)r.getElementBy(e[i])||(n+="<"+s+' id="'+e[i]+'"></'+s+">");r.insert(n);r.deferExecution(function(){for(i=0;i<t;i++)if(null==r.getElementBy(e[i]).offsetParent||"none"==r.getStyle(r.getElementBy(e[i])).display)return r.displayMessage("#"+e[i]+"("+i+")");r.nextFunction()})},s:function(){var n={"pagead2.googlesyndic":"google_ad_client","js.adscale.de/getads":"adscale_slot_id","get.mirando.de/miran":"adPlaceId"},i=this,s=i.getElementBy(0,"script"),o=s.length-1,u,a,f,c;r.write=null;for(r.writeln=null;0<=o;--o)if(u=s[o].src.substr(7,20),n[u]!==t){f=r.createElement("script");f.type="text/javascript";f.src=s[o].src;a=n[u];e[a]=t;f.onload=f.onreadystatechange=function(){c=this;e[a]!==t||c.readyState&&"loaded"!==c.readyState&&"complete"!==c.readyState||(e[a]=f.onload=f.onreadystatechange=null,s[0].parentNode.removeChild(f))};s[0].parentNode.insertBefore(f,s[0]);i.deferExecution(function(){if(e[a]===t)return i.displayMessage(f.src);i.nextFunction()});return}i.nextFunction()},u:function(){var e="-cpm-ads.,.adtooltip&,.com/adv_,/ad/view/ad,/ad_links/ad,/delivery/fc.,/include/ad/ad,/index_ads.,/trade_punder.,-720x120-".split(","),n=this,r=n.getElementBy(0,"img"),s,o;r[0]!==t&&r[0].src!==t&&(s=new Image,s.onload=function(){o=this;o.onload=null;o.onerror=function(){i=null;n.displayMessage(o.src)};o.src=r[0].src+"#"+e.join("")},s.src=r[0].src);n.deferExecution(function(){n.nextFunction()})},nextFunction:function(){var e=i[0];e!==t&&(i.shift(),this[e]())}};e.g553=g553=new n;r.addEventListener?e.addEventListener("load",n,!1):e.attachEvent("onload",n)})(window)</script>
		-->
		<script type="text/javascript">
			$(document).ready(function(){

				<?php for ($i = 0; $i < count($Data); $i++) {
					$encryptLink = Encode($Data[$i]["URL"]);
					$CC = $Data[$i]["CC"];
				?>
					$('#Svplayer').css('display','block');
					SvID = '0';
					<?php if($Data[$i]["sType"] == 1001){ ?>
						addiframe('<?php echo $Data[$i]["URL"]; ?>');
						Now();
					<?php }else if($Data[$i]["sType"] == 1000){ ?>
						<?php if($CC != '') { ?>
						CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>', '<?php echo $CC; ?>');
						<?php }else{ ?>
						CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>', '');
						<?php } ?>
						Now();
					<?php }else{ ?>
						<?php if($CC != '') { ?>
						CPlayStream('<?php echo encrypt($i);?>', '<?php echo $CC; ?>');
						<?php }else{ ?>
						CPlayStream('<?php echo encrypt($i);?>', '');
						<?php } ?>
						Now();


					<?php } }	?>
			});
			function CPlayStreamS(success, cc){
				CallPlayStream('SvplayerID', '<?php echo ''; ?>', success, '<?php echo "http://" . $server . $endereco; ?>', cc);
				Now();
			}
			function CallPlayStreamE(response){
				HideLoadingVideo();
				changserver();
			}
			function HideLoadingVideo(){
				$('#LoadingVideo').css('display','none');
			}
			function UnhideLoadingVideo(){
				$('#LoadingVideo').css('display','block');
			}
			function addiframe(URL){
				var ifHTML= '<iframe src="'+URL+'" width="100%" height="100%" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
				$('#SvplayerID').html(ifHTML);
			}
		</script>


	</head>
	<body>
		<div id="Svplayer" class="Svplayer" style="position: absolute; width: 100%; height: 100%;bottom: -1.5px;background-color: #000;border-width: 1px;  border-style: solid;  border-color: #000; display: none;">
			<div id="SvplayerID" style=" width: 100%; height: 100%;">
				<div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div>
			</div>
		</div>
		<div id="showload" style="display:none;"><a class="close" href="javascript:void(0)" onclick="CloseDownload();"><img src="http://i.imgur.com/Hzrz9jw.gif"></a><span id="texload"><a href="" class="downelem" download="filme">-&gt; BAIXAR &lt;-</a><span></span></span></div>

		<div id='LoadingVideo' style="display:none">
			<style>
			#LoadingVideoDiv {
				font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
				color: #fff;
				height: 200px;
				z-index: 2;
				width: 100%;
				text-align: center;
				top: 30%;
				margin: .83em 0;
				position: absolute;
			}
			</style>

			<script>
				function UpLoading(porcent){ }
			</script>
		</div>


		<div id='NotFoundVideo' style="display:none">
			<style>
			<!-- @import url(http://fonts.googleapis.com/css?family=Merriweather:900);
			* {
				margin: 0;
				padding: 0;
				-webkit-user-select:none;
				   -moz-user-select:none;
					-ms-user-select:none;
						user-select:none;
			}

			html {
				height: 100%;
				overflow: hidden;
			}
			-->
			canvas {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				font-family: 'Merriweather', serif;
			}

			.container {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100vh;
				background: -webkit-radial-gradient(center, ellipse, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background: radial-gradient(ellipse at center, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background-color: #EDEAF9;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#00000000', endColorstr = '#e6000000', GradientType = 1);
			}

			.container div {
				position: absolute;
				left: 0;
				top: -20%;
				width: 100%;
				height: 20%;
				background-color: hsla(0, 0%, 0%, .09);
				box-shadow: 0 0 10px hsla(0, 0%, 0%, .2);
				-webkit-animation: waves 12s linear infinite;
						animation: waves 12s linear infinite;
			}

			.container div:nth-child(1) {
				-webkit-animation-delay: 0;
						animation-delay: 0;
			}

			.container div:nth-child(2) {
				-webkit-animation-delay: 4s;
						animation-delay: 4s;
			}

			.container div:nth-child(3) {
				-webkit-animation-delay: 8s;
						animation-delay: 8s;
			}

			@-webkit-keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			@keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			h1s {
				z-index: 3;
				position: absolute;
				font: bold 20vw 'Merriweather', serif;
				left: 50%;
				top: 50%;
				margin-top: -10vh;
				width: 100%;
				margin-left: -50%;
				text-align: center;
				color: transparent;
				text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks .8s linear infinite;
						animation: flicks .8s linear infinite;
			}

			h2s {
				z-index: 2;
				position: absolute;
				font: bold 3.5vw 'Merriweather', serif;
				top: 30%;
				width: 100%;
				text-align: center;

				color: hsla(0, 96%, 30%, 0.59);
				text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);

				/*
				color: transparent;
				text-shadow: 0 0 12px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks 1.5s linear infinite;
						animation: flicks 1.5s linear infinite;
				*/
			}
			span0{
			   font-size:7.5vw;
			   color: hsla(0, 8%, 33%, 0.1);
			   text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);
			   /*
			   text-shadow: 0 0 24px hsla(0, 0%, 0%, 1);
			   -webkit-animation: spanflicks 1s linear infinite;
					   animation: spanflicks 1s linear infinite;
				*/
			}
			h3s{
			  z-index:2;
			  position: absolute;
			  font: bold 3vw 'Merriweather', serif;
			  top: 60%;
			  width: 100%;
			  text-align: center;
			  color: hsla(0,0%,0%,.5);
			  text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
			  /*
			  color: transparent;
			  text-shadow: 0 0 12px hsla(0, 0%, 0%, .4);
			  -webkit-animation: flicks 1s linear infinite;
					  animation: flicks 1s linear infinite;
				*/
			}


			@-webkit-keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}


			@keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}

			@-webkit-keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}

			@keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}
			</style>
			<h2s>Ops! Este Arquivo Não Foi Encontrado!</h2s>
			<h3s></h3s>
			<div class="container"><div></div><div></div><div></div></div>
			<canvas id="canv"></canvas>
			<script>
			/*
			var noise = ( function () {
					var ب_ب;
					var ಥ_ಥ;
					var imgData;
					var px;
					var w;
					var h;
					var flickInt;

					var flicker = function () {
						ب_ب = document.getElementById('canv');
						ಥ_ಥ = ب_ب.getContext('2d');
						ب_ب.width = w = 700;
						ب_ب.height = h = 500;
						ಥ_ಥ.fillStyle = 'hsla(255,255%,255%,1)';
						ಥ_ಥ.fillRect(0, 0, w, h);
						ಥ_ಥ.fill();
						imgData = ಥ_ಥ.getImageData(0, 0, w, h);
						px = imgData.data;
						flickInt = setInterval(flicks, 30);
					};

					var flicks = function () {
						for (var i = 0; i < px.length; i += 4) {
							var col = (Math.random() * 255) + 50;
							px[i] = col;
							px[i + 1] = col;
							px[i + 2] = col;
						}
						ಥ_ಥ.putImageData(imgData, 0, 0);
					};

					return {
						init: flicker
					};
				}());

				noise.init();
				*/
			</script>
		</div>
	</body>
</html>



<?php
		}else{
		// 2 servidor ou mais
?>
<!DOCTYPE html>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $Title; ?> | <?php echo $CONFIG['SiteTitle']; ?></title>
	<meta name="robots" content="noindex">
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
	<link href="<?php echo themePath('style.css'); ?>?nocache" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.js'); ?>?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('jwplayer/jwplayer.html5.js'); ?>?nocache"></script>
	<script type="text/javascript">jwplayer.key="N8zhkmYvvRwOhz4aTGkySoEri4x+9pQwR7GHIQ==";</script>
	<script type="text/javascript" src="<?php echo themePath('gkplugins/jwplayer.js'); ?>?nocache"></script>
	<script type="text/javascript" src="<?php echo themePath('gkplugins/gkpluginsAPI.js'); ?>?nocache"></script>
	<script type="text/javascript">
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('U g=\'\';W T(1,6,9,a){g=6;S(a!=\'\'){p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"R":{Q:a,V:11,13:14,12:\'X\',Y:\'Z\',},"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}10{p(1).t({n:1,m:"l",k:"o",4:"7%",3:"7%",r:\'q\',j:"e",d:"c b",i:"u://f.h/",s:"5",I:{"J":{H:\'<2 L="\'+9+\'" 4="K" 3="N" O="0" M="0" P="0" F="y" x ></2>\',w:"v z A",},"G":{E:6,D:8,C:8,B:1}}})}}',62,67,'|DivID|iframe|height|width||VideoURL|100|true|SvURL|CC|Player|Flash|abouttext|<?php echo themePath('gkplugins/lol.zip'); ?>|google|rURL|com|aboutlink|skin|screencolor|<?php echo themePath('gkplugins/player.swf'); ?>|flashplayer|id|000000|jwplayer5|bottom|controlbar|bufferlength|setup|http|Compartilhe|heading|allowfullscreen|NO|este|video|embedid|nocacheswf|nocachexml|link|scrolling|<?php echo themePath('gkplugins/proxy.swf'); ?>|code|plugins|<?php echo themePath('gkplugins/sharing-3.swf'); ?>|620|src|marginwidth|370|frameborder|marginheight|file|<?php echo themePath('gkplugins/captions-2.swf'); ?>|if|CallPlay|var|fontsize|function|bold|color|ffe402|else|18|fontweight|fonttype|16'.split('|'),0,{}))
		var captions = {
			color: '#ffe402',
			fontSize: 20,
			fontOpacity: 100,
			backgroundColor: '#000000',
			backgroundOpacity: 75,
			edgeStyle: 'dropshadow',
			windowColor: '#000000',
			windowOpacity: 0
		};
		eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('l E(1,d,a,6,j){x 4=y P();4=G(a);K(J(4)>0){v(1).M({c:\'9%\',f:\'9%\',I:\'H\',L:\'h\',5:"O",N:[{F:z(d),A:B(4),i:"k",5:"7",D:[{C:j,11:"15ês",Q:"8","13":17}]}],8:8,19:[{g:"1b"},{g:"h",b:"7"}],1a:{},i:"k",5:"7",12:{U:T(\'<u b="\'+6+\'" c="R" f="W" 10="0" Z="0" Y="0" X="14" V></u>\'),S:6}});v(1).16(l(){2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)})}18{2.3(\'o\').p.t="m";2.3(1).q="";r(\'\');n(w,e)}}',62,74,'|ID|document|getElementById|nData|provider|URL|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/jwplayer/PauMediaProvider.swf'?>|captions|100|Data|src|width|iData|10000|height|type|html5|startparam|cData|begin|function|block|setTimeout|NotFoundVideo|style|innerHTML|ReporteErrorServer||display|iframe|jwplayer|changserver|var|new|CallImagem|sources|CallSources|file|tracks|CallPlayStream|image|CallInit|glow|skin|countProps|if|primary|setup|playlist|video|Array|kind|620|link|encodeURI|code|allowfullscreen|370|scrolling|marginheight|marginwidth|frameborder|label|sharing|default|NO|Portugu|onError|true|else|modes|PauMediaProvider|html5'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('1 f(){$.e({7:"6",4:"2",3:{5:"0",8:"d"},c:1(a){$(\'#9\').b(a)}})}',16,16,'|function|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/ad.php'?>|data|url|id|GET|type|Name|Svplayer||before|success|ADS|ajax|Now'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('5 d(){$(1).2("#3").c("4")}5 e(){$(1).2(".7").8("6",g().a()[0].9);$(1).2("#3").b("4")}5 h(){$(1).2(".7").8("6",f().a()[0].9);$(1).2("#3").b("4")}',18,18,'|document|find|showload|fast|function|href|downelem|attr|file|getPlaylist|show|hide|CloseDownload|download5|jwplayer|jwplayer5|download6'.split('|'),0,{}))
		eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('4 6=\'r\';4 1=\'\';4 3=\'\';4 2=\'\';5 s(0){b(1!=\'\'){$.9({c:"d",0:"e",8:{7:6,1:1,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}u b(3!=\'\'&&2!=\'\'){$.9({c:"d",0:"e",8:{7:6,t:3,q:2,0:0},g:5(a){1=\'\';3=\'\';2=\'\';o.p(\'n l m(h i[j@k.f])\')}})}}',31,31,'url|SvID|EpisodeID|SeasonID|var|function|rEmbedID|embed|data|ajax||if|type|POST|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/theme/report.php'?>|com|success|By|<?php echo $CallToBackToWork('4272756e6f477973696e'); ?>|<?php echo $CallToBackToWork('6272756e6f677973696e'); ?>|live|successfully|completed|Report|console|log|eID|<?php echo $EmbID; ?>|ReporteErrorServer|sID|else'.split('|'),0,{}))
	</script>
	<?php include('header.php'); ?>
	<!-- <style> #g553{ position:fixed !important; position:absolute; top:-3px; top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px"); left:-1px; width:102%;height:99%; background-color:#2e495a; opacity:.95; filter:alpha(opacity=95); display:block; padding:20% 0} #g553 *{ text-align:center; margin:0 auto; display:block; filter:none; font:bold 14px Verdana,Arial,sans-serif; text-decoration:none} #g553 ~ *{display:none} </style> <div id="g553"></div> <script>window.document.getElementById("g553").parentNode.removeChild(window.document.getElementById("g553"));(function(e,t){function n(e){e&&g553.nextFunction()}var r=e.document,i=["i","s","u"];n.prototype={rand:function(e){return Math.floor(Math.random()*e)},getElementBy:function(e,t){return e?r.getElementById(e):r.getElementsByTagName(t)},getStyle:function(e){var t=r.defaultView;return t&&t.getComputedStyle?t.getComputedStyle(e,null):e.currentStyle},deferExecution:function(e){setTimeout(e,2e3)},insert:function(e,t){var n=r.createElement("font"),i=r.body,s=i.childNodes.length,o=i.style,u=0,a=0;if("g553"==t){n.setAttribute("id",t);o.margin=o.padding=0;o.height="100%";for(s=this.rand(s);u<s;u++)1==i.childNodes[u].nodeType&&(a=Math.max(a,parseFloat(this.getStyle(i.childNodes[u]).zIndex)||0));a&&(n.style.zIndex=a+1);s++}n.innerHTML=e;i.insertBefore(n,i.childNodes[s-1])},displayMessage:function(e){var t=this;e="abisuq".charAt(t.rand(5));t.insert("<"+e+'><img src="http://i.imgur.com/Lge0oP9.jpg" alt="" /> <a href="javascript:location.reload();">[ Recarregar a Página ]</a>'+("</"+e+">"),"g553");r.addEventListener&&t.deferExecution(function(){t.getElementBy("g553").addEventListener("DOMNodeRemoved",function(){t.displayMessage()},!1)})},i:function(){for(var e="AdBanner_S,adBelt,ad_bar,adv-300,advert_05,bodyAd4,tdGoogleAds,ad,ads,adsense".split(","),t=e.length,n="",r=this,i=0,s="abisuq".charAt(r.rand(5));i<t;i++)r.getElementBy(e[i])||(n+="<"+s+' id="'+e[i]+'"></'+s+">");r.insert(n);r.deferExecution(function(){for(i=0;i<t;i++)if(null==r.getElementBy(e[i]).offsetParent||"none"==r.getStyle(r.getElementBy(e[i])).display)return r.displayMessage("#"+e[i]+"("+i+")");r.nextFunction()})},s:function(){var n={"pagead2.googlesyndic":"google_ad_client","js.adscale.de/getads":"adscale_slot_id","get.mirando.de/miran":"adPlaceId"},i=this,s=i.getElementBy(0,"script"),o=s.length-1,u,a,f,c;r.write=null;for(r.writeln=null;0<=o;--o)if(u=s[o].src.substr(7,20),n[u]!==t){f=r.createElement("script");f.type="text/javascript";f.src=s[o].src;a=n[u];e[a]=t;f.onload=f.onreadystatechange=function(){c=this;e[a]!==t||c.readyState&&"loaded"!==c.readyState&&"complete"!==c.readyState||(e[a]=f.onload=f.onreadystatechange=null,s[0].parentNode.removeChild(f))};s[0].parentNode.insertBefore(f,s[0]);i.deferExecution(function(){if(e[a]===t)return i.displayMessage(f.src);i.nextFunction()});return}i.nextFunction()},u:function(){var e="-cpm-ads.,.adtooltip&,.com/adv_,/ad/view/ad,/ad_links/ad,/delivery/fc.,/include/ad/ad,/index_ads.,/trade_punder.,-720x120-".split(","),n=this,r=n.getElementBy(0,"img"),s,o;r[0]!==t&&r[0].src!==t&&(s=new Image,s.onload=function(){o=this;o.onload=null;o.onerror=function(){i=null;n.displayMessage(o.src)};o.src=r[0].src+"#"+e.join("")},s.src=r[0].src);n.deferExecution(function(){n.nextFunction()})},nextFunction:function(){var e=i[0];e!==t&&(i.shift(),this[e]())}};e.g553=g553=new n;r.addEventListener?e.addEventListener("load",n,!1):e.attachEvent("onload",n)})(window)</script>
	-->
	<script type="text/javascript">
		$(window).load(function(){
			setButtons();
		});

		$(window).resize(function(){
			setButtons();
		});

		function setButtons(){
			$(".flutua").css("position", "absolute");

			var dif = $(".panel_boot").outerHeight();
			var hElem = $(".flutua").height();
			var wElem = $(".flutua").width();
			var hJan = $(window).height();
			var wJan = $(window).width();
			x = parseInt((wJan - wElem)/2);
			y = parseInt((hJan - hElem) - dif );
			$(".flutua").css("left", x);
			$(".flutua").css("top", y);
		}
		var LoadingTime = 0;
		$(document).ready(function(){

			eval(function(p,a,c,k,e,d){e=function(c){return c.toString(36)};if(!''.replace(/^/,String)){while(c--){d[c.toString(a)]=k[c]||c.toString(a)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('0 b(2,4){$.a({c:\'d\',9:\'f\',8:{5:2},6:7,1:0(1){e(1,4);g(n);o(p);q(m,l)},h:0(3){i(3)},j:0(k){r()}})}',28,28,'function|success|idS|response|cc|id|timeout|10000|data|type|ajax|CPlayStream|url|<?php echo ($CONFIG['BaseURI'] ? '/'.$CONFIG['BaseURI'] : '').'/callplayerjw6/'?>|CPlayStreamS|POST|clearInterval|error|CallPlayStreamE|beforeSend|xhr|500|HideLoadingVideo|LoadingTime|UpLoading|100|setTimeout|UnhideLoadingVideo'.split('|'),0,{}))
			$("body").on('click', '#player .butPlayFilm', function () {
				console.log("clicou em play!");
				setButtons();
				var $input = $(this);
				console.log($input);
				var SvID = $input.attr( "svid" );
				console.log("Play player "+SvID);
				<?php for ($i = 0; $i < count($Data); $i++) {
					$encryptLink = Encode($Data[$i]["URL"]);
					$CC = $Data[$i]["CC"];
				if($Data[$i]["sType"] == 1001){
				?>
					if(SvID == <?php echo $i+1; ?>){
						$('#player').css('display','none');
						addiframe('<?php echo $Data[$i]["URL"]; ?>');
						Now();
						$('#Svplayer').css('display','block');
					}
				<?php
					}else if($Data[$i]["sType"] == 1000){
				?>
					if(SvID == <?php echo $i+1; ?>){
						window.SvID = SvID;
						$('#player').css('display','none');
						<?php if($CC != '') { ?>
							CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>', '<?php echo $CC; ?>');
						<?php }else{ ?>
							CallPlay('SvplayerID', '<?php echo $encryptLink; ?>', '<?php echo "http://" . $server . $endereco; ?>', '');
						<?php } ?>

						jwplayer5("SvplayerID").onReady(function(){
							jwplayer5("SvplayerID").getPlugin("dock").setButton('changs',changserver,"<?php echo themePath('gkplugins/cs.png'); ?>","<?php echo themePath('gkplugins/cs.png'); ?>");
							jwplayer5("SvplayerID").getPlugin("dock").setButton('showdown',download5,"<?php echo themePath('gkplugins/baixar.png'); ?>","<?php echo themePath('gkplugins/baixar.png'); ?>");
							Now();
							return false
						});
						$('#Svplayer').css('display','block');
					}
				<?php }else{ ?>
					if(SvID == <?php echo $i+1; ?>){
						window.SvID = SvID;
						$('#player').css('display','none');
						<?php if($CC != ''){ ?>
						CPlayStream('<?php echo encrypt($i);?>', '<?php echo $CC; ?>');
						<?php }else{ ?>
						CPlayStream('<?php echo encrypt($i);?>', '');
						<?php } ?>
						$('#Svplayer').css('display','block');
					}

				<?php } }	?>
			});
			function CPlayStreamS(success, cc){
				CallPlayStream('SvplayerID', '<?php echo ''; ?>', success, '<?php echo "http://" . $server . $endereco; ?>', cc);
				jwplayer("SvplayerID").onReady(function() {
					this.addButton("<?php echo themePath('jwplayer/change.png'); ?>", "Mudar Servidor", changserver, 'ChangeServer');
					this.addButton("<?php echo themePath('jwplayer/download.png'); ?>", "Download Video", download6,"download");
				});
				Now();
			}
			function CallPlayStreamE(response){
				HideLoadingVideo();
				changserver();
			}
			function HideLoadingVideo(){
				$('#LoadingVideo').css('display','none');
			}
			function UnhideLoadingVideo(){
				$('#LoadingVideo').css('display','block');
			}


			function addiframe(URL){
				var ifHTML= '<div class="CloseButton" id="CloseSv" style="display: block;"></div><iframe src="'+URL+'" width="100%" height="100%" scrolling="no" frameborder="0" allowfullscreen="" webkitallowfullscreen="" mozallowfullscreen=""></iframe>';
				$('#SvplayerID').html(ifHTML);
			}

			$(".Svplayer").on('click', '#CloseSv', function () {
				$('#Svplayer').css('display','none');
				$('#player').css('display','block');
				$('#Svplayer').html('<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>');
				setButtons();
			});
			setInterval(setButtons(), 100);
		});
		function changserver(){
			$('#Svplayer').css('display','none');
			$('#player').css('display','block');
			$('#Svplayer').html('<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>');
			$('#NotFoundVideo').css('display','none');
			setButtons();
		}
	</script>
	</head>
	<body>
		<style>
			body{
				overflow: hidden;
				font: normal 12px/20px Arial,Helvetica,sans-serif;
				margin: 0px;
				height: 100%;
				width: 100%;
				background-size: 100%;
				background-repeat: no-repeat;
				background-color: #262b36;
                color: #fff;
			}
			#bgPlayer {
				width: 104%;
				height: 104%;
				position: absolute;
				top: -2%;
				left: -2%;
				-webkit-filter: blur(6px);
				-khtml-filter: blur(6px);
				-moz-filter: blur(6px);
				-ms-filter: blur(6px);
				-o-filter: blur(6px);
				filter: blur(6px);
				background-repeat: no-repeat;
				background-size: cover;
				z-index: 1;
			}
			#bgBackPlayer {
				width: 100%;
				height: 100%;
				background-color: rgba(0, 0, 0, 0.6);
				position: absolute;
				top: 0px;
				left: 0px;
				z-index: 2;
			}
			.button-success,
			.button-error,
			.button-warning,
			.button-secondary {
				color: white;
				border-radius: 4px;
				text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
			}

			.button-success {
				background: rgb(28, 184, 65); /* this is a green */
			}

			.button-error {
				background: rgb(202, 60, 60); /* this is a maroon */
			}

			.button-warning {
				background: rgb(223, 117, 20); /* this is an orange */
			}

			.button-secondary {
				background: rgb(66, 184, 221); /* this is a light blue */
			}
			.button-xsmall {
				font-size: 70%;
			}

			.button-small {
				font-size: 85%;
			}

			.button-large {
				font-size: 110%;
			}

			.button-xlarge {
				background-color: #242424;
				font-size: 125%;
				margin: 0 0 7px 0px;
				color: #FFF;
			}
			.button-xlarge:hover{
			   background-color: #C71414;
			}
			.Svplayer .CloseButton {
				z-index: 9999;
				cursor: alias;
				position: absolute;
				width: 146px;
				height: 29px;
				background-image: url(http://i.imgur.com/xRIO2s8.png);
				/* background-image: url(http://i.imgur.com/ZvFymzY.png);*/
				background-color: rgba(255, 5, 5, 0);
				/* background-size: 50px; */

				top: 0px;
				/* right: 0px; */

				-webkit-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				-moz-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				-o-transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;
				transition: opacity 0.25s 0s ease-in-out, visibility 0s linear 0.25s;

				visibility: hidden;
				opacity: 0;
			}
			.Svplayer:hover .CloseButton {
				-webkit-transition-delay:0s;
				-moz-transition-delay:0s;
				-o-transition-delay:0s;
				transition-delay:0s;

				visibility: visible;
				opacity: 1;
			}
		</style>
		<script src="/theme/code.js"></script>
		<div id="Svplayer" class="Svplayer" style="position: absolute; width: 100%; height: 100%;bottom: -1.5px;background-color: #000;border-width: 1px;  border-style: solid;  border-color: #000; display: none;">
			<div class="CloseButton" id="CloseSv" style="display: block;"></div>
			<div id="SvplayerID" style=" width: 100%; height: 100%;"><div id="flashplayer" class="" style="position: absolute; width: 100%; height: 100%;"></div></div>
		</div>
		<?php
		$allPlayers["dub"] = array();
		$allPlayers["leg"] = array();

		for ($i = 0; $i < count($Data); $i++){
			if($Data[$i]["sLang"] == "0"){
				$allPlayers["dub"][] = array($Data[$i]["sService"], $Data[$i]["URL"], ($i+1));
			}
			else{
				$allPlayers["leg"][] = array($Data[$i]["sService"], $Data[$i]["URL"], ($i+1));
			}
		}
		?>

		
		
<div id="bgBody" style="<?php if($BgImg != ''){ ?>background-image: url(<?php echo $BgImg; ?>);<?php } ?>"><div class="bg"></div></div>		
<div id="player">
<div id="bgPlayer"></div>
			<?php
				if(count($allPlayers["leg"]) > 0 && count($allPlayers["dub"]) > 0){
			?>
			<div class="langSelect dub">
				<div class="allOpt">
					<div class="langOpt">Dublado</div>
					<div class="langOpt">Legendado</div>
				</div>
				<div class="langSel"></div>
			</div>
			<?php }else{ ?>
				<div class="langSingle">
					<?php
					if(count($allPlayers["leg"]) > 0){
						echo "Disponível somente legendado.";
					}
					else{
						echo "Disponível somente dublado.";
					}
					?>
				</div>
			<?php } ?>
			<div class="centerPlayer">
				<div class="msgSelPlayer">Selecione um player para reproduzir.</div>
				<div class="butPlayFilm" svid="">
					<div class="iconPlay">
						<img src="/theme/img/butPlay.png">
					</div>
					<div class="textPlay">
						<div>
							Assistir no Google+
						</div>
					</div>
				</div>
			</div>
			<script>
				infoPlayers = <?php echo json_encode($allPlayers); ?>;
			</script>
			<div class="bottomPlayer">
				<?php
				if(count($allPlayers["dub"]) > 0){
				?>
				<div class="optionsDub">
					<ul class="menuPlayer">
						<li class="bar"></li>
						<?php
						foreach($allPlayers["dub"] as $playerInfo){
							switch($playerInfo[0]){
								case "4":
									?>
										<li class="option popenload" title="Assistir no Openload" data-test="<?php echo $playerInfo[0]; ?>" data-player="Openload" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/openload.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "3":
									?>
										<li class="option pVideoWood" title="Assistir no VideoWood" data-test="<?php echo $playerInfo[0]; ?>" data-test="<?php echo $playerInfo[0]; ?>" data-player="VideoWood" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/VideoWood.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "2":
									?>
										<li class="option pokru" title="Assistir no Ok.ru" data-test="<?php echo $playerInfo[0]; ?>" data-player="Ok.ru" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/okru.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "1":
									?>
										<li class="option pthevid" title="Assistir no Thevid" data-test="<?php echo $playerInfo[0]; ?>" data-player="TheVid" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/thevid.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "0":
									?>
										<li class="option pgplus" title="Assistir no Google+" data-test="<?php echo $playerInfo[0]; ?>" data-player="Google+" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/gplus.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "6":
									?>
										<li class="option pgdrive" title="Assistir no Google Drive" data-test="<?php echo $playerInfo[0]; ?>" data-player="Google Drive" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/gdrive.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "5":
									?>
										<li class="option pvidzi" title="Assistir no Vidzi" data-test="<?php echo $playerInfo[0]; ?>" data-player="Vidzi" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/vidzi.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "7":
									?>
										<li class="option pvideomega" title="Assistir no VideoMega" data-test="<?php echo $playerInfo[0]; ?>" data-player="VideoMega" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="dub">
											<div class="iconBig">
												<div>
													<img src="/theme/img/videomega.png">
												</div>
											</div>
										</li>
									<?php
									break;
							}
						}
						?>
					</ul>
				</div>
				<?php
				}
				if(count($allPlayers["leg"]) > 0){
				?>
				<div class="optionsLeg"<?php if(count($allPlayers["dub"]) > 0){ echo " style='display:none;'"; } ?>>
					<ul class="menuPlayer">
						<li class="bar"></li>
						<?php
						foreach($allPlayers["leg"] as $playerInfo){
							switch($playerInfo[0]){
								case "4":
									?>
										<li class="option popenload" title="Assistir no Openload" data-test="<?php echo $playerInfo[0]; ?>" data-player="Openload" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/openload.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "3":
									?>
										<li class="option pVideoWood" title="Assistir no VideoWood" data-test="<?php echo $playerInfo[0]; ?>" data-player="VideoWood" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/VideoWood.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "2":
									?>
										<li class="option pokru" title="Assistir no Ok.ru" data-test="<?php echo $playerInfo[0]; ?>" data-player="Ok.ru" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/okru.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "1":
									?>
										<li class="option pthevid" title="Assistir no Thevid" data-test="<?php echo $playerInfo[0]; ?>" data-player="TheVid" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/thevid.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "0":
									?>
										<li class="option pgplus" title="Assistir no Google Plus" data-test="<?php echo $playerInfo[0]; ?>" data-player="Google+" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/gplus.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "6":
									?>
										<li class="option pgdrive" title="Assistir no Google Drive" data-test="<?php echo $playerInfo[0]; ?>" data-player="Google Drive" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/gdrive.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "5":
									?>
										<li class="option pvidzi" title="Assistir no Vidzi" data-test="<?php echo $playerInfo[0]; ?>" data-player="Vidzi" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/vidzi.png">
												</div>
											</div>
										</li>
									<?php
									break;
								case "7":
									?>
										<li class="option pvideomega" title="Assistir no VideoMega" data-test="<?php echo $playerInfo[0]; ?>" data-player="VideoMega" data-playerid="<?php echo $playerInfo[2]; ?>" data-lang="leg">
											<div class="iconBig">
												<div>
													<img src="/theme/img/videomega.png">
												</div>
											</div>
										</li>
									<?php
									break;
							}
						}
						?>
					</ul>
				</div>
				<?php } ?>
			</div>
			<!--
			<div class="flutua">
				<div style="font-weight:bold; font-size:21px; padding-top:1em;margin-bottom: 30px;">
					<img src="http://i.imgur.com/AucLFDo.png" width="321" height="26">
				</div>
				<div style="margin:0 1em 1em;" class="embed">
					<?php for ($i = 0; $i < count($Data); $i++) { ?>
							<button id="Servidores" svid="<?php echo $i+1; ?>" class="button-xlarge pure-button"><?php echo $Data[$i]['SvName']; ?></button>
					<?php }	?>
				</div>
			</div>

			<div class="panel_boot" style="font-size:10px;">
				<span style="color: #1FDFDF;"><strong>O Player acima contém tecnologia HD (Hight Definition) melhor qualidade Blu-Ray da internet.</strong></span><br>
				<span style="color: #1FDFDF;"><strong>Não somos responsáveis pelos arquivos, nem garantimos sua funcionalidade, apenas indexamos no nosso site.</strong></span><br>
			</div>
			-->
		</div>
		<div id="showload" style="display:none;"><a class="close" href="javascript:void(0)" onclick="CloseDownload();"><img src="http://i.imgur.com/Hzrz9jw.gif"></a><span id="texload"><a href="" class="downelem" download="filme">-&gt; BAIXAR &lt;-</a><span></span></span></div>

		<div id='LoadingVideo' style="display:none">
			<style>
			#LoadingVideoDiv {
				font-family: 'Source Sans Pro', Helvetica, Arial, sans-serif;
				color: #fff;
				height: 200px;
				z-index: 2;
				width: 100%;
				text-align: center;
				top: 30%;
				margin: .83em 0;
				position: absolute;
			}
			</style>

			<script>
				function UpLoading(porcent){ }
			</script>
		</div>

		<div id='NotFoundVideo' style="display:none">
			<style>
			<!-- @import url(http://fonts.googleapis.com/css?family=Merriweather:900);
			* {
				margin: 0;
				padding: 0;
				-webkit-user-select:none;
				   -moz-user-select:none;
					-ms-user-select:none;
						user-select:none;
			}

			html {
				height: 100%;
				overflow: hidden;
			}
			-->
			canvas {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100%;
				font-family: 'Merriweather', serif;
			}

			.container {
				z-index: 1;
				position: absolute;
				left: 0;
				top: 0;
				width: 100%;
				height: 100vh;
				background: -webkit-radial-gradient(center, ellipse, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background: radial-gradient(ellipse at center, hsla(0, 0%, 0%, 0) 0%, hsla(0, 0%, 0%, 0) 19%, hsla(0, 0%, 0%, 0.9) 100%);
				background-color: #EDEAF9;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr = '#00000000', endColorstr = '#e6000000', GradientType = 1);
			}

			.container div {
				position: absolute;
				left: 0;
				top: -20%;
				width: 100%;
				height: 20%;
				background-color: hsla(0, 0%, 0%, .09);
				box-shadow: 0 0 10px hsla(0, 0%, 0%, .2);
				-webkit-animation: waves 12s linear infinite;
						animation: waves 12s linear infinite;
			}

			.container div:nth-child(1) {
				-webkit-animation-delay: 0;
						animation-delay: 0;
			}

			.container div:nth-child(2) {
				-webkit-animation-delay: 4s;
						animation-delay: 4s;
			}

			.container div:nth-child(3) {
				-webkit-animation-delay: 8s;
						animation-delay: 8s;
			}

			@-webkit-keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			@keyframes waves {
				0% {
					top: -20%;
				}
				100% {
					top: 100%;
				}
			}

			h1s {
				z-index: 3;
				position: absolute;
				font: bold 20vw 'Merriweather', serif;
				left: 50%;
				top: 50%;
				margin-top: -10vh;
				width: 100%;
				margin-left: -50%;
				text-align: center;
				color: transparent;
				text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks .8s linear infinite;
						animation: flicks .8s linear infinite;
			}

			h2s {
				z-index: 2;
				position: absolute;
				font: bold 3.5vw 'Merriweather', serif;
				top: 30%;
				width: 100%;
				text-align: center;

				color: hsla(0, 96%, 30%, 0.59);
				text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);
				/*
				color: transparent;
				text-shadow: 0 0 12px hsla(0, 0%, 0%, .5);
				-webkit-animation: flicks 1.5s linear infinite;
						animation: flicks 1.5s linear infinite;
				*/
			}
			span0{
			   font-size:7.5vw;
			   color: hsla(0, 8%, 33%, 0.1);
			   text-shadow: 0 0 10px hsla(2, 100%, 26%, 0.99);
			   /*
			   text-shadow: 0 0 24px hsla(0, 0%, 0%, 1);
			   -webkit-animation: spanflicks 1s linear infinite;
					   animation: spanflicks 1s linear infinite;
				*/
			}
			h3s{
			  z-index:2;
			  position: absolute;
			  font: bold 3vw 'Merriweather', serif;
			  top: 60%;
			  width: 100%;
			  text-align: center;
			  color: hsla(0,0%,0%,.5);
			  text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
			  /*
			  color: transparent;
			  text-shadow: 0 0 12px hsla(0, 0%, 0%, .4);
			  -webkit-animation: flicks 1s linear infinite;
					  animation: flicks 1s linear infinite;
				*/
			}


			@-webkit-keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}


			@keyframes flicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(0, 0%, 0%, .4);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(0, 0%, 0%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(0, 0%, 0%, .8);
				}
			}

			@-webkit-keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}

			@keyframes spanflicks {
				0% {
					text-shadow: 0 0 30px hsla(0, 0%, 0%, .5);
				}
				33% {
				  color: hsla(0,0%,0%,.4);
				  text-shadow: 0 0 10px hsla(2, 95%, 15%, .5);
				}
				66% {
					color: transparent;
					text-shadow: 0 0 20px hsla(2, 95%, 15%, .2);
				}
				100% {
					color: hsla(0,0%,0%,.5);
					text-shadow: 0 0 40px hsla(2, 95%, 15%, .1);
				}
			}
			</style>
			<h2s>Ops! Este Arquivo Não Foi Encontrado! Use os servidores alternativos!</h2s>
			<h3s>Retornando ao menu de seleção em 10 segundos</h3s>
			<div class="container"><div></div><div></div><div></div></div>
			<canvas id="canv"></canvas>
			<script>
			/*
			var noise = ( function () {
					var ب_ب;
					var ಥ_ಥ;
					var imgData;
					var px;
					var w;
					var h;
					var flickInt;

					var flicker = function () {
						ب_ب = document.getElementById('canv');
						ಥ_ಥ = ب_ب.getContext('2d');
						ب_ب.width = w = 700;
						ب_ب.height = h = 500;
						ಥ_ಥ.fillStyle = 'hsla(255,255%,255%,1)';
						ಥ_ಥ.fillRect(0, 0, w, h);
						ಥ_ಥ.fill();
						imgData = ಥ_ಥ.getImageData(0, 0, w, h);
						px = imgData.data;
						flickInt = setInterval(flicks, 30);
					};

					var flicks = function () {
						for (var i = 0; i < px.length; i += 4) {
							var col = (Math.random() * 255) + 50;
							px[i] = col;
							px[i + 1] = col;
							px[i + 2] = col;
						}
						ಥ_ಥ.putImageData(imgData, 0, 0);
					};

					return {
						init: flicker
					};
				}());

				noise.init();
				*/
			</script>
		</div>
	</body>
</html>
<?php } } ?>
