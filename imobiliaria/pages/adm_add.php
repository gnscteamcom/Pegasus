<?php
include("configuracao.php");
?>
<div style="width:50%;margin:5%;text-align:left;">
<h3>Painel administrativo</h3>
somente usuários autorizados nessa área.<br><br>

<?php if(isset($_SESSION['xd'])) { ?>

<h2>Adicionar Imóvel</h2><br />

<form action="" method="post" enctype="multipart/form-data">
<select name="tipo" class="form-control" autofocus>
<option disabled="disabled" selected="selected">--- Selecione o tipo</option>
<?php 
while (list ($key, $val) = each ($tipos) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<select name="negocio" class="form-control">
<option disabled="disabled" selected="selected">--- Selecione o tipo</option>
<?php 
while (list ($key, $val) = each ($negocios) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<select name="imovel" class="form-control">
<option disabled="disabled" selected="selected">--- Selecione o tipo</option>
<?php 
while (list ($key, $val) = each ($imoveis) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<input type="text" name="estado" class="form-control" placeholder="estado:" required /><br />
<input type="text" name="cidade" class="form-control" placeholder="cidade:" required  /><br />
<input type="text" name="bairro" class="form-control" placeholder="bairro:" required  /><br />
<input type="text" name="endereco" class="form-control" placeholder="endereco:" required  /><br />
<input type="text" name="preco" class="form-control" placeholder="preço:" required  /><br />
<input type="text" name="descricao" class="form-control" placeholder="descricao:" required  /><br />
<br />
<h4>Imagens</h4><br />
<input name="userfile1" type="file" class="form-control" /><br />
<input name="userfile2" type="file" class="form-control" /><br />
<input name="userfile3" type="file" class="form-control" /><br />
<input name="userfile4" type="file" class="form-control" /><br />
<input name="userfile5" type="file" class="form-control" /><br />

<input type="submit" value="Cadastrar" name="cadastrar" style="width:49%;margin-bottom:1%;" class="btn btn-success" />
<a href="?buscar=adm"><input type="button" value="Voltar" name="reset" style="width:49%;margin-bottom:1%;" class="btn btn-danger" /></a>
</form>



<?  
if($_POST[cadastrar]) {


$pegar_id = mysql_fetch_array(mysql_query("select * from imoveis order by id desc"));
$new_id = $pegar_id[id] + 1;
if($_FILES['userfile1']) {
$nv1 = $_FILES['userfile1']['name'];
move_uploaded_file($_FILES['userfile1']['tmp_name'], "images/up/".md5($nv1)."");
mysql_query("insert into images(imovel,img) values('".$new_id."','".md5($nv1)."')");
}

if($_FILES['userfile2']) {
$nv2 = $_FILES['userfile2']['name'];
move_uploaded_file($_FILES['userfile2']['tmp_name'], "images/up/".md5($nv2)."");
mysql_query("insert into images(imovel,img) values('".$new_id."','".md5($nv2)."')");
}

if($_FILES['userfile3']) {
$nv3 = $_FILES['userfile3']['name'];
move_uploaded_file($_FILES['userfile3']['tmp_name'], "images/up/".md5($nv3)."");
mysql_query("insert into images(imovel,img) values('".$new_id."','".md5($nv3)."')");
}

if($_FILES['userfile4']) {
$nv4 = $_FILES['userfile4']['name'];
move_uploaded_file($_FILES['userfile4']['tmp_name'], "images/up/".md5($nv4)."");
mysql_query("insert into images(imovel,img) values('".$new_id."','".md5($nv4)."')");
}

if($_FILES['userfile5']) {
$nv5 = $_FILES['userfile5']['name'];
move_uploaded_file($_FILES['userfile5']['tmp_name'], "images/up/".md5($nv5)."");
mysql_query("insert into images(imovel,img) values('".$new_id."','".md5($nv5)."')");
}


$_POST[preco] = str_replace(",","", str_replace(".","", $_POST[preco]));

mysql_query("insert into imoveis (tipo,negocio,imovel,estado,cidade,bairro,endereco,preco,descricao,img) values ('".$_POST[tipo]."','".$_POST[negocio]."','".$_POST[imovel]."','".$_POST[estado]."','".$_POST[cidade]."','".$_POST[bairro]."','".$_POST[endereco]."','".$_POST[preco]."','".$_POST[descricao]."','".md5($nv1)."')");
echo '<br><div class="alert alert-info fade in"><a href="?buscar=produto&id='.$new_id.'" target="_blank">[Visualizar]</a> Imóvel adicionado com sucesso. </div>';
}

} else { ?>

<div style="width:70%;">
<form action="" method="post">
<input type="text" name="user" class="form-control" placeholder="Usu&aacute;rio..." /><br />
<input type="text" name="pass" class="form-control" placeholder="Senha..." /><br />

<input type="submit" value="Entrar" name="entrar" style="width:100%;margin-bottom:1%;" class="btn btn-success" />
</form>
</div>

<?php
if($_POST[entrar]) {

if(empty($_POST[user]) || empty($_POST[pass])) {
echo '<br><div class="alert alert-info fade in"> Desculpe, existem campos em branco. </div>';
}elseif($_POST[user] === $cfg[user] and $_POST[pass] === $cfg[pass]) {
session_start();
$_SESSION[xd] = $cfg[user];
$_SESSION[nome] = $cfg[empresa];
echo '<script>location.href="?buscar=adm_add";</script>';
} else {
echo '<br><div class="alert alert-info fade in"> Desculpe, o usu&aacute;rio ou senha inv&aacute;lidos. </div>';

}}

 }
?>




</div>