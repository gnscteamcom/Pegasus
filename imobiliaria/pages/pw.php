<?php
include("configuracao.php");
?>
		<div class="banner">
		
		<div class="banner-info text-center" style="width:800;">
				<i class="shipping"></i><br><br>
				<form action="" method="post">
				<select name="negocio" class="btn">
				<option value="" disabled="disabled" selected="selected">--- Neg&oacute;cio</option>
				<?php 
while (list ($key2, $val2) = each ($negocios) ) echo '<option value="'.$val2.'">'.$val2.'</option>'; 
?>
				</select>
				
				<select name="imovel" class="btn">
				<option value="" disabled="disabled selected="selected"">--- Im&oacute;vel</option>
				<?php 
while (list ($key, $val) = each ($imoveis) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
				</select>
				
				<select name="tipo" class="btn">
				<option value="" disabled="disabled" selected="selected">--- Tipos</option>
				<?php 
while (list ($key, $val) = each ($tipos) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
				</select>
				
				<select name="preco" class="btn">
				<option value="" disabled="disabled" selected="selected">--- Pre&ccedil;os</option>
				<option value="40000">At&eacute; 40.000</option>
				<option value="60000">At&eacute; 60.000</option>
				<option value="80000">At&eacute; 80.000</option>
				<option value="100000">At&eacute; 100.000</option>
				<option value="150000">At&eacute; 150.000</option>
				<option value="200000">At&eacute; 200.000</option>
				<option value="250000">At&eacute; 250.000</option>
				<option value="300000">At&eacute; 300.000</option>
				<option value="350000">At&eacute; 350.000</option>
				<option value="400000">At&eacute; 400.000</option>
				<option value="450000">At&eacute; 450.000</option>
				<option value="500000">At&eacute; 500.000</option>
				<option value="1000000">At&eacute; 1 milh&atilde;o</option>
				<option value="2000000">At&eacute; 2 milh&otilde;es</option>
				<option value="5000000">At&eacute; 5 milh&otilde;es</option>
				</select><br><br>
				<input type="submit" value="Procurar" class="btn btn-danger" name="pcnvm">
				</form>
				<? if($_POST['pcnvm']) {
							if(empty($_POST['negocio']) || empty($_POST['imovel']) || empty($_POST['tipo']) || empty($_POST['preco'])) {
							echo "<script>alert('Existem campos em branco.');</script>";
							} else {
							echo 'wwwww<meta http-equiv="refresh" content="0;url=?buscar=p&negocio='.$_POST['negocio'].'&imovel='.$_POST['imovel'].'&tipo='.$_POST['tipo'].'&preco='.$_POST['preco'].'">';
							 } }?>
				<p>				
				<br> Encontre casas e apartamentos em todo o Brasil. Os melhores im&oacute;veis est&atilde;o na <?=$cfg["empresa"];?>.</p>
		</div>
	</div>
	</div>
