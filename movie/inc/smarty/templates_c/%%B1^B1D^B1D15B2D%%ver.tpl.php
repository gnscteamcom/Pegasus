<?php /* Smarty version 2.6.26, created on 2017-01-16 17:44:55
         compiled from ver.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'unescape', 'ver.tpl', 24, false),array('modifier', 'escape', 'ver.tpl', 49, false),array('modifier', 'bbcode', 'ver.tpl', 55, false),array('modifier', 'nl2br', 'ver.tpl', 55, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/head.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script>
jQuery(function ($) {
	// Load dialog on page load
	//$(\'#basic-modal-content\').modal();

	// Load dialog on click
	$(\'#basic-modal a\').click(function (e) {
		$(\'#basic-modal-content\').modal();

		return false;
	});
});
</script>
'; ?>

    	<!--<bd>--> 
        <div id="bd" class="bkcnt bkcnt_int br1px brdr10px clf"> 
            <!--<bkbnrc_3>--> 
			<?php if ($this->_tpl_vars['msConfig']['ads']['300x250'] != ""): ?>
            <div class="bkbnrc_2 bkbnrc_3 br1px brdr10px clf mgbot15px"> 
                <div class="bnrlft f_left w300px"> 
                   
				    <?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['300x250'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>
 
                
				</div> 
                <div class="bnrcnt f_left w300px"> 
                
					<?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['300x250'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>
 
 
				</div> 
                <div class="bnrrgt f_left w300px"> 
                
					<?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['300x250'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>
</td> 
				
				</div> 
            </div>
			<?php endif; ?> 
			<?php if ($this->_tpl_vars['msMovie'] != ""): ?>
            <?php $_from = $this->_tpl_vars['msMovie']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['m']):
?>
			<table> 
			<tr><td> 
			<!--</bkbnrc_3>--> 
            <div class="titbkcnt bgdeg7 bold brdr10px bxshd2 fs18px ico_b mgbot15px p_relative white"> 
            	<?php echo $this->_tpl_vars['m']['p_titulo']; ?>
             </div> 
            <!--<intsd>--> 
            <div class="intsd f_left"> 
            	<div class="peli_img_int mgbot10px"> 
                	<img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/files/uploads/<?php echo $this->_tpl_vars['m']['p_id']; ?>
.jpg" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_titulo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:175px;height:268px"/> 
                </div> 
				<?php if ($this->_tpl_vars['msDown'] != ""): ?>
                <div id='basic-modal'><a class="btndescr bgdeg9 fntber_b d_block brdr10px mgbot10px txt_cen txt_may white" rel="nofollow" href="#" title="Descargar Pelicula <?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_titulo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" >DESCARGAR</a></div>
				<div id="basic-modal-content">
					<h3>Links para descargar la película</h3>
					<p><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['msDown']['0']['d_links'])) ? $this->_run_mod_handler('bbcode', true, $_tmp) : smarty_modifier_bbcode($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p><br />
					<h3>Para reproducir las peliculas que has descargado</h3>
					<p>Puedes descargar directamente el video desde Megaupload, y los subtítulos desde <?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
. Para reproducirlos, recuerda que tanto el archivo de video como el de los subtítulos, deben tener el mismo nombre, por ejemplo, nombrevideo.mp4 (video) y nombrevideo.srt (subtítulos). Debes utilizar un reproductor compatible con subtítulos, te recomendamos VLC o BSplayer. <br /><br /><center><a href="http://www.videolan.org/"> Descargar VLC </a> o <a href="http://download7.bsplayer.com/download_free_bsplayer.php?type=1"> Descargar BSplayer </a></center></p>
				</div>				
				<div style='display:none'><img src='img/basic/x.png' alt='' /></div>
				<?php endif; ?><!--</intsd>--> 
            </div> 
            <!--<content>--> 
            <div class="content f_right"> 
                <div class="details mgbot20px p_relative"> 
                    <ul class="dtalist fs14px bold"> 
                        <li class="ico_b"><span>Titulo Original:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_titulo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li> 
                        <li class="ico_b"><span>Genero:</span> <?php echo $this->_tpl_vars['m']['g_nombre']; ?>
</li>
						<li class="ico_b"><span>Ano:</span> <?php echo $this->_tpl_vars['m']['p_ano']; ?>
</li>
						<li class="ico_b"><span>Idioma:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_idioma'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
						<li class="ico_b"><span>Qualidade:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['m']['p_calidad'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</li>
						<li class="ico_b"><span>Visualizada:</span> <?php echo $this->_tpl_vars['m']['p_hits']; ?>
 veces</li> 
                    </ul> 
                    <div class="share p_absolute"> 
                    	<div class="shr_fac f_right"> 
							<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/pelicula/<?php echo $this->_tpl_vars['m']['p_id']; ?>
/<?php echo $this->_tpl_vars['m']['p_seo']; ?>
.html&amp;layout=box_count&amp;width=71&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:71px; height:90px;" allowTransparency="true"></iframe>                        
                         </div> 
						 
                        <div class="shr_twi f_right"> 
                        	<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="Ver_Pelis" data-lang="es">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script> 
                        </div>
						
				<ul class="player_buttons">
                    <li><a href="#" class="alert pmenu" title="Reportar este video" onclick="reportar(<?php echo $this->_tpl_vars['m']['p_id']; ?>
); return false;">&nbsp;</a></li>
                    <li class="rate">
                        <a href="#" class="vote_up pmenu" title="Me gusta" onclick="votar('pos', <?php echo $this->_tpl_vars['m']['p_id']; ?>
); return false">&nbsp;</a>
                        <a href="#" class="vote_down pmenu" title="No me gusta" onclick="votar('neg', <?php echo $this->_tpl_vars['m']['p_id']; ?>
); return false">&nbsp;</a>
                    </li>
                </ul> 
				
                    </div> 
                </div> 
                <div class="tit_cnt bold fs18px">Sinopse</div>
                <div class="sinoptxt mgbot15px"> 
	                <p><?php echo $this->_tpl_vars['m']['p_sinopsis']; ?>
</p> 
				<bR/>
				    
                </div> 
				<?php if ($this->_tpl_vars['msConfig']['ads']['728x90'] != ""): ?>
				 <div style="padding-bottom:10px;text-align:center;"> 
                	<?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['728x90'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>
<br/> 
                </div> 
				<?php endif; ?>
				</div> 
				</td></tr><tr> 
				<td> 
                <!--<pel_tra_bnr>--> 
                <div class="pel_tra_bnr brdr10px bkcontentint clf mgbot15px"> 
                	<!--<pel_tra>--> 
                 	<div class="pel_tra2 f_left"> 
					<?php if ($this->_tpl_vars['msVideos'] != ""): ?>
                        <ul class="tabs menu bold bxshd1 cntclsx f_left_lia fs14px liabrdr10px lnht30px txt_cen white clf mgbot10px"> 
						<?php $this->assign('i', 1); ?>
						<?php $_from = $this->_tpl_vars['msVideos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
                            <li><a href="#ms<?php echo $this->_tpl_vars['i']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['v_titulo'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></li> 
						<?php $this->assign($this->_tpl_vars['i'], $this->_tpl_vars['i']++); ?>
						<?php endforeach; endif; unset($_from); ?>

                        </ul> 
                        <div class="tab_container">
						<?php $this->assign('i', 1); ?>
						<?php $_from = $this->_tpl_vars['msVideos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?> 
                            <div id="ms<?php echo $this->_tpl_vars['i']; ?>
" class="tab_content br1px brdr10px bkcnt pd15px fs11px"> 
								<div style="text-align:center;"> 
								<?php echo $this->_tpl_vars['v']['v_source']; ?>

								</div>                     
					   
                        	</div>
						<?php $this->assign($this->_tpl_vars['i'], $this->_tpl_vars['i']++); ?>
						<?php endforeach; endif; unset($_from); ?> 
                    </div> 
					<?php else: ?><center>Este Filme está offline</center><?php endif; ?>
						</div> 
                    <!--</pel_tra>--> 
                </div> 
				
							            	<!--</pel_tra_bnr>--> 
             </td></tr></table> 		
			
				<div class="intsd f_left"> 
				
	
					<div class="bnr txt_cen"> 
						
					<?php echo ((is_array($_tmp=$this->_tpl_vars['msConfig']['ads']['120x600'])) ? $this->_run_mod_handler('unescape', true, $_tmp) : smarty_modifier_unescape($_tmp)); ?>

 
					</div> 
 
				</div>
	
				<div class="content f_right"> 
			
				
 
			 <!--<tagsvid>--> 
                <div class="tagsvid txt_cen bgdeg9 brdr10px bold fs16px lnht20px mgbot15px"> 
	               ver <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong> Online, <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong>, Watch <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong> online, Pelicula <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong>, Preview <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong>, Sinopsis <strong><?php echo $this->_tpl_vars['m']['p_titulo']; ?>
</strong> 
                </div> 
                <!--</tagsvid>--> 
                <!--<comentarios>--> 
                <div class="bkcontentint brdr10px clf mgbot15px"> 
		<div id="fb-root"></div><?php echo ' 
		<script type="text/javascript"> 
		  window.fbAsyncInit = function() {
			FB.init({appId: \'168367353225519\', status: true, cookie: true,
					 xfbml: true});
		  };
		  (function() {
			var e = document.createElement(\'script\'); e.async = true;
			e.src = document.location.protocol +
			  \'//connect.facebook.net/es_ES/all.js\';
			document.getElementById(\'fb-root\').appendChild(e);
		  }());
		</script> '; ?>

		<fb:comments url="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/pelicula/<?php echo $this->_tpl_vars['m']['p_id']; ?>
/<?php echo $this->_tpl_vars['m']['p_seo']; ?>
.html" numposts="10" width="700" migrated="1"></fb:comments> 
					</p> 
                </div> 
                <!--</comentarios>-->
				<?php endforeach; endif; unset($_from); ?>  
				<?php else: ?>
				<center>La película que quieres ver no existe.</center>
				<?php endif; ?>               
            </div> 
            <!--</content>--> 
        </div> 
        <!--</bd>--> 
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sections/footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>