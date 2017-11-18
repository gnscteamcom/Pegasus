<div style="width:50%;margin:5%;text-align:left;">
<h3>Painel administrativo</h3>
somente usuários autorizados nessa área.<br><br>

<?php if(isset($_SESSION['xd'])) { ?>

<a href="?buscar=adm_add"><input type="submit" class="btn btn-success" style="width:30%;" value="Adicionar imóvel"></a>
<a href="?buscar=adm_edit"><input type="submit" class="btn btn-info" style="width:30%;" value="Editar imóvel"></a>
<a href="?buscar=sair"><input type="submit" class="btn btn-danger" style="width:30%;" value="Sair"></a>

<br>
<?  } else { ?>

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
echo '<script>location.href="?buscar=adm";</script>';
} else {
echo '<br><div class="alert alert-info fade in"> Desculpe, o usu&aacute;rio ou senha inv&aacute;lidos. </div>';

}}

 }
?>




</div>