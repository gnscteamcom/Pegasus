var id = 0;
var EpDub = [];
var EpLeg = [];

function AddServer() {
    id++;
    var oldHTML = $("#addServerHere").html();
    var nHTML = '<div id="SvId-' + id + '" class="form-panel"><h4 class="mb"> Servidor: <b id="tName-' + id + '">' + id + '</b></h4><div class="form-horizontal"><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Nome do servidor:</label><div class="col-sm-10"><input id="SvName" idd="' + id + '" type="text" name="SvName-' + id + '" class="form-control" value="Server #' + id + '"></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Video URL:</label><div class="col-sm-10"><input name="SvURL-' + id + '" type="text" class="form-control"><!--<span class="help-block"><a >Video URL Exemples</a></span>--></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Legendas:</label><div class="col-sm-10"><input name="ccURL-' + id + '" type="text" class="form-control"></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Tipo</label><div class="col-sm-10"><select name="sType-' + id + '" class="form-control">' + CallSelectOptions(1000) + '</select></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Serviço</label><div class="col-sm-10"><select name="sService-' + id + '" class="form-control"><option selected="selected" value="0">Google Plus</option><option value="1">TheVid</option><option value="2">Ok.ru</option><option value="3">Haaze</option><option value="4">Openload</option><option value="5">Vidzi</option><option value="6">Google Drive</option></option><option value="7">YouTube</option><option value="8">VideoMega</option></select></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Idioma</label><div class="col-sm-10"><select name="sLang-' + id + '" class="form-control"><option selected="selected" value="0">Dublado</option><option value="1">Legendado</option></select></div></div></div></div>';
    $("#addServerHere").append(nHTML);
    $('#SvAmount').val(id);
}

function AddServer2(Nome, URL, CC, sType, sService, sLang) {
    id++;
    var oldHTML = $("#addServerHere").html();
    var nHTML = '<div id="SvId-' + id + '" class="form-panel"><h4 class="mb"> Servidor: <b id="tName-' + id + '">' + Nome + '</b></h4><div class="form-horizontal"><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Nome do servidor:</label><div class="col-sm-10"><input id="SvName" idd="' + id + '" type="text" name="SvName-' + id + '" class="form-control" value="' + Nome + '"></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Video URL:</label><div class="col-sm-10"><input name="SvURL-' + id + '" type="text" class="form-control" value="' + URL + '"><!--<span class="help-block"><a >Video URL Exemples</a></span>--></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Legendas:</label><div class="col-sm-10"><input name="ccURL-' + id + '" type="text" class="form-control" value="' + CC + '"></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Tipo</label><div class="col-sm-10"><select name="sType-' + id + '" class="form-control">' + CallSelectOptions(sType) + '</select> </div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Serviço</label><div class="col-sm-10"><select name="sService-' + id + '" class="form-control"><option';
    if (sService == "0") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="0">Google Plus</option><option';
    if (sService == "1") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="1">TheVid</option><option';
    if (sService == "2") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="2">Ok.ru</option><option';
    if (sService == "3") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="3">Haaze</option><option';
    if (sService == "4") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="4">Openload</option><option';
    if (sService == "5") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="5">Vidzi</option><option';
    if (sService == "6") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="6">Google Drive</option><option';
    if (sService == "7") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="7">YouTube</option><option';
    if (sService == "8") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="8">VideoMega</option></select></div></div><div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: left;">Idioma</label><div class="col-sm-10"><select name="sLang-' + id + '" class="form-control"><option';
    if (sLang == "0") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="0">Dublado</option><option';
    if (sLang == "1") {
        nHTML += ' selected="selected"';
    }
    nHTML += ' value="1">Legendado</option></select></div></div>';
    $("#addServerHere").append(nHTML);
    $('#SvAmount').val(id);
}

function RemoveServer() {
    if (id > 1) {
        if (window.confirm('Are you sure?')) {
            $("#SvId-" + id).remove();
            id--;
        }
        $('#SvAmount').val(id);
    }
}

function CallSelectOptions(ID) {
    var Options = '';
    var Selected = '';
    if (ID == 1000) {
        Options += '<option selected value="1000">GkPlugins</option>';
    } else {
        Options += '<option value="1000">GkPlugins</option>';
    }
    if (ID == 1001) {
        Options += '<option selected value="1001">Iframe</option>';
    } else {
        Options += '<option value="1001">Iframe</option>';
    }
    for (i = 0; i < TypesStream.length; i++) {
        Selected = '';
        if (i == ID) {
            Selected = 'selected';
        }
        Options += '<option ' + Selected + ' value="' + i + '">' + TypesStream[i] + '</option>';
    }
    return Options;
}

function AddSeason() {
    id++;
    var oldHTML = $("#addServerHere").html();
    var nHTML = '<li id="SvId-' + id + '" class="form-panel"><h4 class="mb"> <b>' + id + '°</b> Temporada</h4><div class="form-group">            <label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: center;margin-top: 10px;font-size: 16px;">Dublado:</label><div id="addDub-' + id + '"></div></div><div class="btn-group btn-group-justified"><div class="btn-group"><button type="button" class="btn btn-default" onclick="AddEpDub(' + id + ')">Adicionar Novo episódio</button></div><div class="btn-group"><button type="button" class="btn btn-default" onclick="RemoveEpDub(' + id + ')">Remova o último episódio</button></div><div class="btn-group"><button type="button" class="btn btn-default" onclick="RemoveAllEpDub(' + id + ')">Remova todos os episódios</button></div></div>        <div class="form-group"><label class="col-sm-2 col-sm-2 control-label" style="width: 100%;text-align: center;margin-top: 50px;font-size: 16px;">Legendado:</label><div id="addLeg-' + id + '"></div></div><div class="btn-group btn-group-justified"><div class="btn-group"><button type="button" class="btn btn-default" onclick="AddEpLeg(' + id + ')">Adicionar Novo episódio</button></div><div class="btn-group"><button type="button" class="btn btn-default" onclick="RemoveEpLeg(' + id + ')">Remova o último episódio</button></div><div class="btn-group"><button type="button" class="btn btn-default" onclick="RemoveAllEpLeg(' + id + ')">Remova todos os episódios</button></div></div>                   </div></li>';
    $("#addServerHere").append(nHTML);
    $('#SvAmount').val(id);
    EpDub[id - 1] = 0;
    EpLeg[id - 1] = 0;
    EpsUP();
    $(document).ready(function() {
        $('#menu').metisMenu();
    });
}

function RemoveSeason() {
    if (id > 1) {
        if (window.confirm('Are you sure?')) {
            $("#SvId-" + id).remove();
            EpDub.pop();
            EpLeg.pop();
            id--;
        }
        EpsUP();
        $('#SvAmount').val(id);
    }
}

function RemoveAllServer() {}

function AddEpDub(ServerID) {
    if (!EpDub[ServerID - 1]) {
        EpDub[ServerID - 1] = 0;
    }
    var oldHTML = $("#addDub-" + ServerID).html();
    EpDub[ServerID - 1] = EpDub[ServerID - 1] + 1;
    EpID = EpDub[ServerID - 1];
    var nHTML = '<div id="EpDub-' + ServerID + '-' + EpID + '"><label class="col-sm-2 col-sm-2 control-label"></label><div class="col-sm-10" style="width: 82%; color: #31708f; background-color: #d9edf7; border-color: #bce8f1; padding: 11px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; "><div class="form-group"><label class="col-sm-2 col-sm-2 control-label">' + EpID + '° Ep Nome:</label><div class="col-sm-10"><input name="EpDubName-' + ServerID + '-' + EpID + '" type="text" class="form-control"></div><label class="col-sm-2 col-sm-2 control-label">URL:</label><div class="col-sm-10"><input name="EpDubURL-' + ServerID + '-' + EpID + '" type="text" class="form-control"></div>   <label class="col-sm-2 col-sm-2 control-label">Tipo</label><div class="col-sm-10"><select name="sType-' + ServerID + '-' + EpID + '" class="form-control">' + CallSelectOptions(1000) + '</select></div></div></div></div>';
    $("#addDub-" + ServerID).append(nHTML);
    EpsUP();
}

function AddEpDub2(ServerID, EpName, URL, sType) {
    if (!EpDub[ServerID - 1]) {
        EpDub[ServerID - 1] = 0;
    }
    var oldHTML = $("#addDub-" + ServerID).html();
    EpDub[ServerID - 1] = EpDub[ServerID - 1] + 1;
    EpID = EpDub[ServerID - 1];
    var nHTML = '<div id="EpDub-' + ServerID + '-' + EpID + '"><label class="col-sm-2 col-sm-2 control-label"></label><div class="col-sm-10" style="width: 82%; color: #31708f; background-color: #d9edf7; border-color: #bce8f1; padding: 11px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; "><div class="form-group"><label class="col-sm-2 col-sm-2 control-label">' + EpID + '° Ep Nome:</label><div class="col-sm-10"><input name="EpDubName-' + ServerID + '-' + EpID + '" type="text" value="' + EpName + '" class="form-control"></div><label class="col-sm-2 col-sm-2 control-label">URL:</label><div class="col-sm-10"><input name="EpDubURL-' + ServerID + '-' + EpID + '" type="text" value="' + URL + '" class="form-control"></div> <label class="col-sm-2 col-sm-2 control-label">Tipo</label><div class="col-sm-10"><select name="sType-' + ServerID + '-' + EpID + '" class="form-control">' + CallSelectOptions(sType) + '</select></div></div></div></div>';
    $("#addDub-" + ServerID).append(nHTML);
    EpsUP();
}

function RemoveEpDub(ServerID) {
    if (EpDub[ServerID - 1] > 0) {
        $("#EpDub-" + ServerID + "-" + EpDub[ServerID - 1]).remove();
        EpDub[ServerID - 1] = EpDub[ServerID - 1] - 1;
    }
    EpsUP();
}

function RemoveAllEpDub(ServerID) {
    EpDub[ServerID - 1] = 0;
    $("#addDub-" + ServerID).html('');
    EpsUP();
}

function AddEpLeg(ServerID) {
    if (!EpLeg[ServerID - 1]) {
        EpLeg[ServerID - 1] = 0;
    }
    var oldHTML = $("#addLeg-" + ServerID).html();
    EpLeg[ServerID - 1] = EpLeg[ServerID - 1] + 1;
    EpID = EpLeg[ServerID - 1];
    var nHTML = '<div id="EpLeg-' + ServerID + '-' + EpID + '"><label class="col-sm-2 col-sm-2 control-label"></label><div class="col-sm-10" style="width: 82%; color: #31708f; background-color: #d9f7db; border-color: #bce8f1; padding: 11px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; "><div class="form-group"><label class="col-sm-2 col-sm-2 control-label">' + EpID + '° Ep Nome:</label><div class="col-sm-10"><input name="EpLegName-' + ServerID + '-' + EpID + '" type="text" class="form-control"></div><label class="col-sm-2 col-sm-2 control-label">URL:</label><div class="col-sm-10"><input name="EpLegURL-' + ServerID + '-' + EpID + '" type="text" class="form-control"></div>       <label class="col-sm-2 col-sm-2 control-label">CC:</label><div class="col-sm-10"><input name="EpLegCC-' + ServerID + '-' + EpID + '" type="text" class="form-control"></div>          <label class="col-sm-2 col-sm-2 control-label">Tipo</label><div class="col-sm-10"><select name="sTypeLeg-' + ServerID + '-' + EpID + '" class="form-control">' + CallSelectOptions(1000) + '</select></div>  </div></div></div>';
    $("#addLeg-" + ServerID).append(nHTML);
    EpsUP();
}

function AddEpLeg2(ServerID, EpName, URL, CC, sType) {
    if (!EpLeg[ServerID - 1]) {
        EpLeg[ServerID - 1] = 0;
    }
    var oldHTML = $("#addLeg-" + ServerID).html();
    EpLeg[ServerID - 1] = EpLeg[ServerID - 1] + 1;
    EpID = EpLeg[ServerID - 1];
    var nHTML = '<div id="EpLeg-' + ServerID + '-' + EpID + '"><label class="col-sm-2 col-sm-2 control-label"></label><div class="col-sm-10" style="width: 82%; color: #31708f; background-color: #d9f7db; border-color: #bce8f1; padding: 11px; margin-bottom: 20px; border: 1px solid transparent; border-radius: 4px; "><div class="form-group"><label class="col-sm-2 col-sm-2 control-label">' + EpID + '° Ep Nome:</label><div class="col-sm-10"><input name="EpLegName-' + ServerID + '-' + EpID + '" type="text" value="' + EpName + '" class="form-control"></div><label class="col-sm-2 col-sm-2 control-label">URL:</label><div class="col-sm-10"><input name="EpLegURL-' + ServerID + '-' + EpID + '" type="text" value="' + URL + '" class="form-control"></div>  <label class="col-sm-2 col-sm-2 control-label">CC:</label><div class="col-sm-10"><input name="EpLegCC-' + ServerID + '-' + EpID + '" type="text" value="' + CC + '" class="form-control"></div>  <label class="col-sm-2 col-sm-2 control-label">Tipo</label><div class="col-sm-10"><select name="sTypeLeg-' + ServerID + '-' + EpID + '" class="form-control">' + CallSelectOptions(sType) + '</select> </div>    </div></div></div>';
    $("#addLeg-" + ServerID).append(nHTML);
    EpsUP();
}

function RemoveEpLeg(ServerID) {
    if (EpLeg[ServerID - 1] > 0) {
        $("#EpLeg-" + ServerID + "-" + EpLeg[ServerID - 1]).remove();
        EpLeg[ServerID - 1] = EpLeg[ServerID - 1] - 1;
    }
    EpsUP();
}

function RemoveAllEpLeg(ServerID) {
    EpLeg[ServerID - 1] = 0;
    $("#addLeg-" + ServerID).html('');
    EpsUP();
}

function EpsUP() {
    var SEpDub = EpDub.join(',');
    $('#EpDub').val(SEpDub);
    var SEpLeg = EpLeg.join(',');
    $('#EpLeg').val(SEpLeg);
}

function strTohex(String) {
    var str = String;
    var hex = '';
    for (var i = 0; i < str.length; i++) {
        hex += '' + str.charCodeAt(i).toString(16);
    }
    return hex;
}
var ImgurApiKey = '';
var ImgurUpURL = '';
$(document).ready(function() {
    $('#addServerHere').on('change', '#SvName', function() {
        var input = $(this);
        var nName = input.attr("idd");
        $("#tName-" + nName).html(input.val());
        console.log('Mudou:' + input.val())
    });
    $("#FilmPosterUpload").change(function() {
        readImage(this);
    });
    $("#RemoveFilmPosterImage").click(function() {
        FilmPosterRemove();
    });
});

function readImage(input) {
    if (input.files && input.files[0]) {
        var FR = new FileReader();
        FR.onload = function(e) {
            console.log('Encontrado: ' + e.target.result);
            $.ajax({
                type: 'POST',
                url: ImgurUpURL,
                data: {
                    Image: e.target.result,
                    Key: ApiKey
                },
                context: document.body,
                success: function(resposta) {
                    console.log('Arquivo enviado com success!');
                    FilmPosterReceived(resposta);
                },
                beforeSend: function() {
                    console.log('Arquivo enviado!');
                    $(input).val('');
                },
                error: function(obj) {
                    console.log('Error');
                    readImage(input);
                }
            });
        };
        FR.readAsDataURL(input.files[0]);
    }
}

function FilmPosterReceived(Recebido) {
    var TudoRecebidos = jQuery.parseJSON(Recebido);
    if (TudoRecebidos['Error'] == true) { <!-- error-->}else{<!-- success-->document.getElementById("ImageFilmPoster").src=TudoRecebidos['ImageURL'];document.getElementById("FilmPosterImageURL").value=TudoRecebidos['ImageURL'];document.getElementById('no-image-FP').style.display='none';document.getElementById('has-image-FP').style.display='block';}}
	}
}

function FilmPosterAddNovo(NewUrl) {
    console.log('Adicionado nova URL: ' + NewUrl);
    document.getElementById("ImageFilmPoster").src = NewUrl;
    document.getElementById("FilmPosterImageURL").value = NewUrl;
    document.getElementById('no-image-FP').style.display = 'none';
    document.getElementById('has-image-FP').style.display = 'block';
}

function FilmPosterRemove() {
    document.getElementById("ImageFilmPoster").src = '';
    document.getElementById("FilmPosterImageURL").value = '';
    document.getElementById('has-image-FP').style.display = 'none';
    document.getElementById('no-image-FP').style.display = 'block';
}
