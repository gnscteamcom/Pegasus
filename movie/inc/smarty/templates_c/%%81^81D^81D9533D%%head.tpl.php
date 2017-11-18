<?php /* Smarty version 2.6.26, created on 2017-01-16 14:29:33
         compiled from sections/head.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<title><?php echo $this->_tpl_vars['msTitle']; ?>
</title> 
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/style.css"/> 
<script type="text/javascript" src="http://www.ver-pelis.net/js/jquery.js"></script> 
 <script type="text/javascript">
        var site_url = '<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
';
    </script>
</head> 
<body> 
<div class="bgf"> 
    <!--<all>--> 
    <div class="all divcen w990px"> 
    	<!--<hd>--> 
        <div id="hd" class="clf p_relative pdtop10px"> 
        	<div class="hd_cnt_1 clf"> 
                <a class="logo f_left ovw p_relative" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/" title="<?php echo $this->_tpl_vars['msConfig']['slogan']; ?>
"><img class="p_absolute" src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/Temas/default/img/bg.png" alt="<?php echo $this->_tpl_vars['msConfig']['datos']['w_titulo']; ?>
" /></a> 
                <div class="hdrgt f_right pdtop5px"> 
                    <div class="frmsrch f_right ovw mgbot5px"> 
                        <form action="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/buscar/" method="get"> 
                            <p class="bginptxt f_left ico pd5px"><input class="inp_txt bold" value="Buscador" title="Buscador" type="text" name="q" /></p> 
                            <p class="inpbtnp f_right"><input class="inp_btn bold ico white" value="Buscar !" type="submit" /></p> 
                        </form> 
                    </div> 
                    <ul class="mntop bold clr cntclsx f_right lstinl txt_rig w100"> 
						<li><a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/"  title="Home">Inicio</a></li>
                        <?php if ($this->_tpl_vars['msUser']->is_member): ?>
							<?php if ($this->_tpl_vars['msUser']->is_admod): ?>
							<li><a title="Cerrar Sesion" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/admin/">Administração</a></li>
							<?php endif; ?>
							<li><a title="Cerrar Sesion" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/logout/">Encerrar sessão</a></li>
						<?php else: ?>
							<li><a title="Iniciar Sesion" href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/login/">Iniciar Sessão</a></li>
						<?php endif; ?>
                    </ul> 
                </div> 
            </div> 
            <div class="hd_cnt_2 p_relative"> 
            	<div class="mascota ico p_absolute"></div> 
                <h1 class="tithd bold fs18px lnht30px ico_b pdtop10px"><!-- ALGUNAS KEY RELEVANTES --></h1> 
                <ul id="sldpels" class="f_left_li">  
				<?php if ($this->_tpl_vars['msEstrenos'] != ""): ?>
					<?php $_from = $this->_tpl_vars['msEstrenos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>            
		  			<li><a href="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/pelicula/<?php echo $this->_tpl_vars['e']['p_id']; ?>
/<?php echo $this->_tpl_vars['e']['p_seo']; ?>
.html" title="<?php echo $this->_tpl_vars['e']['p_titulo']; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['msConfig']['datos']['w_url']; ?>
/files/uploads/<?php echo $this->_tpl_vars['e']['p_id']; ?>
.jpg" alt="<?php echo $this->_tpl_vars['e']['p_titulo']; ?>
"/></a></li>	
					<?php endforeach; endif; unset($_from); ?>	
				<?php endif; ?>			
				</ul> 
            </div>
			        </div> 
        <!--</hd>--> 
    	<!--<bd>--> 
        <div id="bd" class="clf"> 