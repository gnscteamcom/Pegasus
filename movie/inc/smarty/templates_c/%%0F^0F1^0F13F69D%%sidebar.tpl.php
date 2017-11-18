<?php /* Smarty version 2.6.26, created on 2017-01-16 17:40:20
         compiled from sections/sidebar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unescape', 'sections/sidebar.tpl', 71, false),)), $this); ?>
        	<!--<sd>-->
        	<div id="sd" class="f_left"> 
                <!--<bk>--> 
                <div class="bk_1 bgdeg3 bxshd2 brdr10px mgbot20px fs11px white"> 
                    <div class="tit_sdbr ico_b mgbot10px p_relative txtshdw1"> 
                        <span class="d_block fntber_r">Bem Vindo à...</span>
                        <span class="fntber_b fs18px"><?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
</span> 
                    </div> 
                    <p>Aqui pode encontrar todos <strong>filmes online</strong> cadastrados<br /> Para ver <strong>os filmes online</strong> sem limite não é necesario registrar, bom divertimento.</p>
                </div> 
                <!--</bk>--> 
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico1 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Filmes <span class="d_block">Selecciona tu categoria</span></div>
                    <ul class="icoscat bold clf icos fs14px f_left_li liabrdr10px"> 
 					<?php $_from = $this->_tpl_vars['msGeneros']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['g']):
?> 
						<li><a title="<?php echo $this->_tpl_vars['g']['g_nombre']; ?>
" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/categoria/<?php echo $this->_tpl_vars['g']['g_seo']; ?>
/"><strong><?php echo $this->_tpl_vars['g']['g_nombre']; ?>
</strong></a></li> 
 					<?php endforeach; endif; unset($_from); ?>
                    </ul> 
                </div> 
                <!--</bk>--> 
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico2 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Os mais acessados <span class="d_block">Peliculas Destacadas</span></div>
                    <ul class="icospel bold clf icos fs14px liabrdr10px"> 
					<?php $_from = $this->_tpl_vars['msHits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['h']):
?>
						<li><a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/pelicula/<?php echo $this->_tpl_vars['h']['p_id']; ?>
/<?php echo $this->_tpl_vars['h']['p_seo']; ?>
.html" title="<?php echo $this->_tpl_vars['h']['p_titulo']; ?>
"><?php echo $this->_tpl_vars['h']['p_titulo']; ?>
 <span>Vista: <?php echo $this->_tpl_vars['h']['p_hits']; ?>
</span></a></li> 
					<?php endforeach; endif; unset($_from); ?>
                    </ul> 
                </div> 
                <!--</bk>-->
				<!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico2 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Os mais votados<span class="d_block">Peliculas Votadas</span></div>
                    <ul class="icospel bold clf icos fs14px liabrdr10px"> 
					<?php $_from = $this->_tpl_vars['msVotos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['h']):
?>
						<li><a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/pelicula/<?php echo $this->_tpl_vars['h']['p_id']; ?>
/<?php echo $this->_tpl_vars['h']['p_seo']; ?>
.html" title="<?php echo $this->_tpl_vars['h']['p_titulo']; ?>
"><?php echo $this->_tpl_vars['h']['p_titulo']; ?>
 <span>Votos: <?php echo $this->_tpl_vars['h']['p_votos']; ?>
</span></a></li> 
					<?php endforeach; endif; unset($_from); ?>
                    </ul> 
                </div> 
                <!--</bk>-->  
                
				<?php if ($this->_tpl_vars['msConfig']['ads']['fb'] != ""): ?>
                <!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico3 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Facebook <span class="d_block">Gostou do site?</span></div>
				<center> 
				<div id="fb-root"></div><script src="http://connect.facebook.net/es_LA/all.js#xfbml=1"></script><fb:like-box href="<?php echo $this->_tpl_vars['msConfig']['ads']['fb']; ?>
" width="200" height="630" show_faces="true" border_color="#d7ebf9" stream="false" header="false"></fb:like-box> 
				</center> 
                </div> 
                <!--</bk>--> 
				<?php endif; ?>
				<?php if ($this->_tpl_vars['msConfig']['links'] != ""): ?>
				<!--<bk>--> 
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico3 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Enlaces <span class="d_block">Parceiros</span></div>
                    <ul class="icospag bold clf icos fs14px liabrdr10px">
					<?php $_from = $this->_tpl_vars['msConfig']['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['l']):
?> 
		  				<li><a title="<?php echo $this->_tpl_vars['l']['l_nombre']; ?>
" href="<?php echo $this->_tpl_vars['l']['l_url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['l']['l_nombre']; ?>
</a></li> 
 					<?php endforeach; endif; unset($_from); ?>
                    </ul> 
                </div> 
                <!--</bk>--> 
				<?php endif; ?>
                <!--<bk>--> 
				<?php if ($this->_tpl_vars['msConfig']['ads']['120x600'] != ""): ?>
                <div class="bk brdr10px br1px mgbot20px pd10px"> 
                    <div class="bk_tit bk_tit_ico4 bgdeg4 bold brdr10px bxshd2 fs18px ico_b mgbot10px p_relative white">Sponsor <span class="d_block">Nos ajude a crescer!</span></div>
                    <div class="bkcnt brdr10px br1px pd15px"> 
                   <center> 
				   <?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['120x600'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>

				   </center> 
                    </div> 
                </div> 
				<?php endif; ?>
            </div> 
            <!--</sd>-->