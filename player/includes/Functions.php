<?php
define("SITE_ROOT",true);

// ------------------------------------------------------------------------------
// * new 3.0
// ------------------------------------------------------------------------------
function IsValidEmbedID($ID,$EmbedID){
	global $CONFIG;
	if (preg_match('/^[a-z0-9 .\-]+$/i', $EmbedID)){
		if(strlen($EmbedID) > 2 && strlen($EmbedID) < 16){
			$Embed = mysql_query("SELECT * FROM Embeds WHERE EmbedID='$EmbedID' AND id!='$ID' LIMIT 1");
			if(mysql_num_rows($Embed) == 0){
				return 0; // Ok
			}else{
				return 1; // Já existente Na DB
			}		
		}else{
			return 2; // tamanho no minimo 3 e no maximo 15
		}
	}
	return 3; // permitido somente letras e/ou numeros
}


// ------------------------------------------------------------------------------
// * Plugin System
// ------------------------------------------------------------------------------
$CONFIG['Types'] = Array();
function AddPluginStream($ID, $Name, $Description, $Function){
	global $CONFIG;
	if(count(search($CONFIG['Types'], 'ID', $ID)) > 0){
		exit('Plugins ERROR: </br> - Plugin With Duplicate ID, Plugin Name:'.$Name);
	}else{
		$CONFIG['Types'][] = Array(
			'ID' => $ID,
			'Name' => $Name,
			'Description' => $Description,
			'Function' => $Function
		);
	}
}


function themePath($File){
	global $CONFIG;
	if(!empty($CONFIG['BaseURI'])){
		$Complemento = '/'.$CONFIG['BaseURI'];
	}else{
		$Complemento = '';
	}
	$Directory = '/theme/'.$File;
	return $Complemento.$Directory;
}
function adminPath($File){
	global $CONFIG;
	if(!empty($CONFIG['BaseURI'])){
		$Complemento = '/'.$CONFIG['BaseURI'];
	}else{
		$Complemento = '';
	}
	$Directory = '/admin/'.$File;
	return $Complemento.$Directory;
}
function adminURL($File){
	global $CONFIG;
	if(!empty($CONFIG['BaseURI'])){
		$Complemento = '/'.$CONFIG['BaseURI'];
	}else{
		$Complemento = '';
	}
	if(!empty($CONFIG['BaseAdmURI'])){
		$adm = '/'.$CONFIG['BaseAdmURI'].'/';
	}else{
		$adm = '';
	}
	return $Complemento.$adm.$File;
}
// ------------------------------------------------------------------------------
// * GetDbServer: Verifica se a String é adequada
// ------------------------------------------------------------------------------
function GetSQLDb() {
	global $CONFIG;
	$Host =	$CONFIG['Hostname'];
	$User =	$CONFIG['Username'];
	$Pswd =	$CONFIG['Password'];
	$Db	=	$CONFIG['Database'];
	//echo $Host;
	@mysql_connect($Host, $User, $Pswd) or die("Erro MYSQL, contate o desenvolvedor.<br /><br />". mysql_error());
	@mysql_select_db ($Db) or die("Erro MYSQL, contate o desenvolvedor.<br /><br />". mysql_error());
}


function IsEmbed($string){
	$Embed = mysql_query("SELECT * FROM Embeds WHERE EmbedID='$string' LIMIT 1");
	if(mysql_num_rows($Embed) == 1){
		return true;
	}
	return false;
}


function AddReport($EmbedID, $Mensage){	
	$Report = mysql_query("SELECT * FROM Reports WHERE EmbedID='$EmbedID' LIMIT 1");
	if(mysql_num_rows($Report) == 1){
		//Ja existe
		$linha = mysql_fetch_array ($Report);
		$ID = $linha['id'];
		$Reports = $linha['Reports']+1;
		mysql_query("UPDATE Reports SET Reports='$Reports' WHERE id='$ID'") or die(mysql_error());
	}else{
		//Não existe
		mysql_query("INSERT INTO Reports (EmbedID, Mensage, Reports) VALUES ('$EmbedID', '$Mensage', '1')") or die(mysql_error());
	}	
}
function getIDByEmbedID($EmbedID){
	$Get = mysql_query("SELECT * FROM Embeds WHERE EmbedID='$EmbedID' LIMIT 1");
	if(mysql_num_rows($Get) == 1){
		$linha = mysql_fetch_array ($Get);
		return $linha['id'];
	}
}

function getTypeByEmbedID($EmbedID){
	$Get = mysql_query("SELECT * FROM Embeds WHERE EmbedID='$EmbedID' LIMIT 1");
	if(mysql_num_rows($Get) == 1){
		$linha = mysql_fetch_array ($Get);
		return $linha['type'];
	}
}


function encrypt($data) {
	global $_SERVER;
	$key = $_SERVER['REMOTE_ADDR'];
	$key = str_replace('.', '', $key);
	
	// initialization vector 
	$iv = md5(md5($key));
	
    return
		trim( strToHex( mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $data, MCRYPT_MODE_CBC, $iv)));
}

function decrypt($data) {
	global $_SERVER;
	$key = $_SERVER['REMOTE_ADDR'];
	$key = str_replace('.', '', $key);
	
	// initialization vector 
	$iv = md5(md5($key));
	
	return
		rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5($key), hexToStr($data), MCRYPT_MODE_CBC, $iv) , "\0");
}

function js_array($array) {
	$JSarray = '["'.implode('","', array_keys($array)).'"]';
	return $JSarray;
}
function variables_JSHeader(){
	global $CONFIG;
	$JsVals = '';
	for ($i = 0; $i < count($CONFIG['Types']); $i++) {
		$JsVals .= 'TypesStream['.$CONFIG['Types'][$i]['ID'].'] = "'.$CONFIG['Types'][$i]['Name'].'"; ';
	}
	return $JsVals;
	
}
function strToHex($string){
    $hex = '';
    for ($i=0; $i<strlen($string); $i++){
        $ord = ord($string[$i]);
        $hexCode = dechex($ord);
        $hex .= substr('0'.$hexCode, -2);
    }
    return strToUpper($hex);
}
function hexToStr($hex){
    $string='';
    for ($i=0; $i < strlen($hex)-1; $i+=2){
        $string .= chr(hexdec($hex[$i].$hex[$i+1]));
    }
    return $string;
}


function hextobin($hexstr) { 
	$n = strlen($hexstr); 
	$sbin = "";
	$i = 0;
	while($i<$n) {       
		$a = substr($hexstr,$i,2);           
		$c = pack("H*",$a); 
		if ($i==0){$sbin=$c;} 
		else {$sbin.=$c;} 
		$i+=2; 
	} 
	return $sbin; 
}
$CallToBackToWork = 'hextobin';


//functions for plugins
$pluginsN = glob("plugins/*.php");
if($pluginsN){
	foreach($pluginsN as $filename){
		require($filename);
	}
}
function search($array, $key, $value){
    $results = array();
    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }
        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }
    return $results;
}

function get_curl($url){
	$curl = curl_init();
	$header[0] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8";
	$header[] = "Accept-Language: en-us,en;q=0.5";
	$header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
	$header[] = "Keep-Alive: 115";
	$header[] = "Connection: keep-alive";
	
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HEADER, 1);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:22.0) Gecko/20100101 Firefox/22.0');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); 
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);

	$result = curl_exec($curl);
	curl_close($curl);
	return $result;
}


function unescapeUTF8EscapeSeq($str) { return preg_replace_callback("/\\\u([0-9a-f]{4})/i", create_function('$matches', 'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');' ), $str); }
?>