    	<!--<ft>--> 
        <div id="ft" class="white"> 
        	<div class="ft_cnt_1 txt_cen"> 
            	<p><strong>{$msConfig.datos.w_titulo} - {$msConfig.datos.w_slogan}</strong><br />		
            </div> 
            <div class="ft_cnt_2 pdtop10px"> 
            	<a class="logo f_right ovw p_relative" href="#" title="{$msConfig.datos.w_titulo}"><img class="p_absolute" src="{$msConfig.datos.w_url}/Temas/default/img/bg.png" alt="{$msConfig.datos.w_titulo}" /></a> 
                <span>Powered by <a href="http://bit.ly/2g0yC4G" target=_"black">Areanerdx</a> &amp; Theme por <a href="http://bit.ly/2g0yC4G">Areanerdx</a> </span>
            </div> 
        </div> 
        <!--</ft>--> 
    </div> 
    <!--</all>--> 
</div> 
<script type="text/javascript" src="{$msConfig.datos.w_url}/Temas/default/js/jquery.simplemodal.js"></script>
{if $msEstrenos != ""}
<script type="text/javascript" src="{$msConfig.datos.w_url}/Temas/default/js/jqbxsl.js"></script>
{literal}
<script>
$(document).ready(function() {
//sldpels
	$("#sldpels").bxSlider({displaySlideQty:4,moveSlideQty:1});	
});
</script>{/literal}
{/if}
<script type="text/javascript" src="{$msConfig.datos.w_url}/Temas/default/js/functions.js"></script> 
{literal}<!--[if lt IE 9]>{/literal}<link rel="stylesheet" href="{$msConfig.datos.w_url}/Temas/default/css/ie.css" type="text/css" /><script type="text/javascript" src="{$msConfig.datos.w_url}/Temas/default/js/pie.js"></script>{literal}<script type="text/javascript">$(function(){$('.brdr5px,.brdr10px,.liabrdr10px li a,.liasbrdr10px li span,.bxshd1 li a,.bxshd2,.bxshd3,.bxshd4').each(function(){PIE.attach(this)})});</script><![endif]--><!--[if lt IE 8]><script type="text/javascript" src="js/psjs.js"></script><![endif]-->{/literal}
</body> 
</html>
