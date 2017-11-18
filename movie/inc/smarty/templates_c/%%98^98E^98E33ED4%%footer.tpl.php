<?php /* Smarty version 2.6.26, created on 2017-01-16 14:29:33
         compiled from sections/footer.tpl */ ?>
    	<!--<ft>--> 
        <div id="ft" class="white"> 
        	<div class="ft_cnt_1 txt_cen"> 
            	<p><strong><?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
 - <?php echo $this->_tpl_vars['msConfig']['datos']['w_slogan']; ?>
</strong><br />		
            </div> 
            <div class="ft_cnt_2 pdtop10px"> 
            	<a class="logo f_right ovw p_relative" href="#" title="<?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
"><img class="p_absolute" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/bg.png" alt="<?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
" /></a> 
                <span>Powered by <a href="http://bit.ly/2g0yC4G" target=_"black">Areanerdx</a> &amp; Theme por <a href="http://bit.ly/2g0yC4G">Areanerdx</a> </span>
            </div> 
        </div> 
        <!--</ft>--> 
    </div> 
    <!--</all>--> 
</div> 
<script type="text/javascript" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/js/jquery.simplemodal.js"></script>
<?php if ($this->_tpl_vars['msEstrenos'] != ""): ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/js/jqbxsl.js"></script>
<?php echo '
<script>
$(document).ready(function() {
//sldpels
	$("#sldpels").bxSlider({displaySlideQty:4,moveSlideQty:1});	
});
</script>'; ?>

<?php endif; ?>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/js/functions.js"></script> 
<?php echo '<!--[if lt IE 9]>'; ?>
<link rel="stylesheet" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/css/ie.css" type="text/css" /><script type="text/javascript" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/js/pie.js"></script><?php echo '<script type="text/javascript">$(function(){$(\'.brdr5px,.brdr10px,.liabrdr10px li a,.liasbrdr10px li span,.bxshd1 li a,.bxshd2,.bxshd3,.bxshd4\').each(function(){PIE.attach(this)})});</script><![endif]--><!--[if lt IE 8]><script type="text/javascript" src="js/psjs.js"></script><![endif]-->'; ?>

</body> 
</html>