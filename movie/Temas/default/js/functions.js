/*-== www.ilusionlive.es - Maquetacion XHTML - Maquetacion Wordpress - info@ilusionlive.es ==- */
$(document).ready(function() {
	//inputs
	$(".inp_txt").focus(function(){$(this).addClass("inp_txt_focus");window.catch_keypress=0;if($(this).val() == $(this).attr("title")) $(this).val("");}).blur(function(){$(this).removeClass("inp_txt_focus");window.catch_keypress=1;if($(this).val() == "") $(this).val($(this).attr("title"));});
	//cols
	jQuery(function(){jQuery('.cntclsx li:first-child').addClass('first_lst');jQuery('.cntclsx li:last-child').addClass('last_lst')});
	//elements
	$(".cntclsx4 li:nth-child(4n)").addClass('cntdtlbx4');
	//tabs
	$(".tab_content").hide();$("ul.tabs li:first").addClass("act").show();$(".tab_content:first").show();$("ul.tabs li").click(function(){$("ul.tabs li").removeClass("act");$(this).addClass("act");$(".tab_content").hide();var activeTab=$(this).find("a").attr("href");$(activeTab).fadeIn();return false});	
});

// REPORTAR
function reportar(id, type){
	$.ajax({
		type: 'POST',
		url: site_url + '/ajax.php?do=report',
		data: 'id=' + id + '&type=' + type,
		success: function(h){
            alert(h);
		}
	});
}
// VOTAR
function votar(voto, mid){
	$.ajax({
		type: 'POST',
		url: site_url + '/ajax.php?do=votar',
		data: 'voto=' + voto + '&mid=' + mid,
		success: function(h){
            alert(h);
		}
	});
}