<?php
/*
* Plugin Picasa Web
* Please Not Change.
*/
$StreamPluginID0 = 2; // Unique ID not change
$StreamPluginName0 = 'Picasa Web';
$StreamPluginDescription0 = '';
$StreamPluginFunction0 = 'PicasaWebVideoGet';
AddPluginStream($StreamPluginID0, $StreamPluginName0, $StreamPluginDescription0, $StreamPluginFunction0);


function PicasaWebVideoGet($Key){
	$ImgVideo = ''; // Default Img video
	$Stream = Array();
	
	
	$UserID_01 = @explode(".com/", $Key);
	$UserID_02 = @explode("/",$UserID_01[1]);
	$UserID = $UserID_02[0];
	
	$VideoCount = 0;
	$url = '';
	
	$PG = get_curl($Key);
	
	$AlbumID_01 = @explode("_album = {id:'", $PG);
	$AlbumID_02 = @explode("'",$AlbumID_01[1]);
	$AlbumID = $AlbumID_02[0];
	
	$VideoID_01 = @explode('#', $Key);
	$VideoID_02 = @explode('&',$VideoID_01[1]);
	$VideoID = $VideoID_02[0];
	
	
	
	//authkey
	$authkey_01 = @explode("authkey=", $Key);
	$authkey_02 = @explode("&",$authkey_01[1]);
	$authkey_03 = @explode("#",$authkey_02[0]);
	$authkey = $authkey_03[0];
	
	
	if($authkey != ''){
		$url = "https://picasaweb.google.com/data/feed/tiny/user/".$UserID."/albumid/".$AlbumID."/photoid/".$VideoID."?alt=jsonm&authkey=".$authkey."&urlredir=1&commentreason=1&fd=shapes&thumbsize=d&max-results=100";
	}else{
		$url = "https://picasaweb.google.com/data/feed/tiny/user/".$UserID."/albumid/".$AlbumID."/photoid/".$VideoID."?alt=jsonm&urlredir=1&commentreason=1&fd=shapes&thumbsize=d&max-results=100";
	}
	$PegarConteudo = get_curl($url);
	
	if ($PegarConteudo) {

		//passa de json para array
		$ArrayJson = json_decode($PegarConteudo, true);
		//Conta a quantidade de item que contem em >
		$Arraycount = count($ArrayJson['feed']['media']['content']);
		
		//loop que pega somente o conteudo certo do array
		for ($i = 0; $i < $Arraycount; $i++) {
			// link Direto
			$urlDireto = $ArrayJson['feed']['media']['content'][$i]['url'];
			//pega quatidade em Height (360, 720(p))
			$Height = $ArrayJson['feed']['media']['content'][$i]['height'];
			$Width = $ArrayJson['feed']['media']['content'][$i]['width'];
			
			//Imagem do filme
			if($ArrayJson['feed']['media']['content'][$i]['type'] == "image/gif"){
				$urlImage = $ArrayJson['feed']['media']['content'][$i]['url'];
				$ImgVideo = $urlImage;
			}
			if($ArrayJson['feed']['media']['content'][$i]['type'] == "application/x-shockwave-flash"){
				$Stream[$VideoCount]['height'] = $Height;
				$Stream[$VideoCount]['width'] = $Width;
				$Stream[$VideoCount]['url'] = $urlDireto;
				$Stream[$VideoCount]['type'] = 'flv';
				$VideoCount++;
			} else if($ArrayJson['feed']['media']['content'][$i]['type'] == "video/mpeg4"){
				$Stream[$VideoCount]['height'] = $Height;
				$Stream[$VideoCount]['width'] = $Width;
				$Stream[$VideoCount]['url'] = $urlDireto;
				$Stream[$VideoCount]['type'] = 'mp4';
				$VideoCount++;
			}
		}
	}
	
	sort($Stream);
	return bin2hex(json_encode($Stream));
}
?>