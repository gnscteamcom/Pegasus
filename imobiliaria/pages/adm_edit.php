<?php
include("configuracao.php");
?>
<div style="width:50%;margin:5%;text-align:left;">
<h3>Painel administrativo</h3>
somente usuários autorizados nessa área.<br><br>

<?php if(isset($_SESSION['xd'])) { ?>
<?php
if($_GET[id]) { 

$pegar_id = mysql_fetch_array(mysql_query("select * from imoveis where id='".$_GET[id]."' order by id desc"));
?>
<h2>Adicionar Imóvel</h2><br />

<form action="" method="post" enctype="multipart/form-data">
<select name="tipo" class="form-control" autofocus>
<option disabled="disabled" selected="selected">--- Selecione o tipo</option>
<option value="<?=$pegar_id[tipo];?>" selected="selected"><?=$pegar_id[tipo];?></option>
<?php 
while (list ($key, $val) = each ($tipos) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<select name="negocio" class="form-control">
<option disabled="disabled" selected="selected">--- Selecione o negócio</option>
<option value="<?=$pegar_id[negocio];?>" selected="selected"><?=$pegar_id[negocio];?></option>
<?php 
while (list ($key, $val) = each ($negocios) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<select name="imovel" class="form-control">
<option disabled="disabled" selected="selected">--- Selecione o imovel</option>
<option value="<?=$pegar_id[imovel];?>" selected="selected"><?=$pegar_id[imovel];?></option>
<?php 
while (list ($key, $val) = each ($imoveis) ) echo '<option value="'.$val.'">'.$val.'</option>'; 
?>
</select><br />

<input type="text" name="estado" class="form-control" value="<?=$pegar_id[estado];?>" placeholder="estado:" required /><br />
<input type="text" name="cidade" class="form-control" value="<?=$pegar_id[cidade];?>" placeholder="cidade:" required  /><br />
<input type="text" name="bairro" class="form-control" value="<?=$pegar_id[bairro];?>" placeholder="bairro:" required  /><br />
<input type="text" name="endereco" class="form-control" value="<?=$pegar_id[endereco];?>" placeholder="endereco:" required  /><br />
<input type="text" name="preco" class="form-control" value="<?=number_format($pegar_id[preco],0,",",".");?>" placeholder="preço:" required  /><br />
<input type="text" name="descricao" class="form-control" value="<?=$pegar_id[descricao];?>" placeholder="descricao:" required  /><br />
<br />
<input type="submit" value="Editar" name="edit" style="width:49%;margin-bottom:1%;" class="btn btn-success" />
<a href="?buscar=adm"><input type="button" value="Voltar" name="reset" style="width:49%;margin-bottom:1%;" class="btn btn-danger" /></a>
</form>

<? } else { ?>

<form action="" method="post">
<select name="id" class="form-control">
<option disabled="disabled" selected="selected">--- Selecione</option>
<?
$pegaras = mysql_query("select * from imoveis order by id desc");
while($exibir = mysql_fetch_array($pegaras)) {
echo '<option value='.$exibir[id].'>[ID: '.$exibir[id].'] '.$exibir[imovel].' '.$exibir[negocio].' '.$exibir[tipo].' R$ '.number_format($exibir[preco],0,",",".").'.</option>';
}
?>
</select><br />
<input type="submit" value="Editar" name="editar" style="width:30%;margin-bottom:1%;" class="btn btn-success" />
<input type="submit" value="Deletar" name="deletar" style="width:30%;margin-bottom:1%;" class="btn btn-danger" />
<a href="?buscar=adm"><input type="button" value="Voltar" name="voltar" style="width:33%;margin-bottom:1%;" class="btn btn-info" />
</a></form>

<? 
if($_POST[deletar]) {
if(!empty($_POST[id])) {
mysql_query("DELETE FROM imoveis WHERE id='".$_POST[id]."'");
echo '<div class="alert alert-info">Deletado com sucesso.</div>';
}
}
if($_POST[editar]) {
if(!empty($_POST[id])) {
echo '<meta http-equiv="refresh" content="0;url=?buscar=adm_edit&id='.$_POST[id].'">';
}
}

} ?>

<?  
if($_POST[edit]) {


$pegar_id = mysql_fetch_array(mysql_query("select * from imoveis order by id desc"));
$_POST[preco] = str_replace(",","", str_replace(".","", $_POST[preco]));
mysql_query("update imoveis set tipo='".$_POST[tipo]."',imovel='".$_POST[imovel]."',negocio='".$_POST[negocio]."',estado='".$_POST[estado]."',cidade='".$_POST[cidade]."',bairro='".$_POST[bairro]."',endereco='".$_POST[endereco]."',preco='".$_POST[preco]."',descricao='".$_POST[descricao]."' where id='".$_GET[id]."'");
echo '<br><div class="alert alert-info fade in"><a href="?buscar=produto&id='.$pegar_id[id].'" target="_blank">[Visualizar]</a> Imóvel adicionado com sucesso. </div>';
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
echo '<script>location.href="?buscar=adm_edit";</script>';
} else {
echo '<br><div class="alert alert-info fade in"> Desculpe, o usu&aacute;rio ou senha inv&aacute;lidos. </div>';

}}

 }
?>


</div>