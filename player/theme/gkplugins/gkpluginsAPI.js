function gkpluginsAPI(playerName,playerID){
	player = gkthisMovie(playerName);
	if(!player){
		player = gkthisMovie(playerID);
	}
	if(gkplugins_messageHandleType=="removeLinkError"){
		player.onGKMessageHandle("gkMessageHandleRemoveLinkError");
	}else if(gkplugins_messageHandleType=="custom"){
		player.onGKMessageHandle("gkMessageHandle");
	}
	if(gkplugins_listboxDivID!=""){
		player.onGKPluginsLoadedHandle("gkPluginsLoaded");
	}
	//player.onGKNextLocationHandle("gkNextLocation");
	//player.onGKPluginRunHandle("gkPluginRun");
}

function gkPluginRun(pluginName){
	console.log('5');
	alert(pluginName);
}

function gkNextLocation(){
	alert("next location");
}

function gkMessageHandle(msg){
	//your custom code
	return msg;
}

function gkPluginsLoaded(){
	console.log('2');
	try{
		initGKListbox(gkplugins_listboxDivID,player);
	}catch(e){
		alert(e.message);
	}
}

function gkMessageHandleRemoveLinkError(e) {
	var t = "File invalid or deleted";
	if (e.indexOf(t) > 0) {
		ReporteErrorServer(e.replace(t,''));
		e = "Arquivo Não Encontrado (Use Outras Opções de Servidores) Retornando ao Menu de Seleção de Servers em 10 Segundos";
		setTimeout(changserver, 10000);
	} else {
		e = "Erro desconhecido Escolha outro servidor!";
	}
	return e;
}
function gkthisMovie(e) {
	if (e == "") {
		return null
	}
	var t = document.getElementById(e);
	if (!t.onGKMessageHandle) {
		if (navigator.appName.indexOf("Microsoft") != -1) {
			t = window[e]
		} else {
			t = document[e]
		}
	}
	return t
}
var gkplugins_messageHandleType = "removeLinkError";
var gkplugins_listboxDivID = "";
var player;