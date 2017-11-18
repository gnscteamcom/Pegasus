
			<div class="contact-section">
					<div class="contact-section-head text-center">
						<h3><span>C</span>ontato</h3>
						<p>deixe-nos saber suas opini&otilde;es e perguntas</p>
					</div>
					<div class="contact-form-main">
						<form action="" method="post">
							<label class="span1"></label>
							<input type="text" class="text" name="nome" value="Nome..." onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Nome...';}">
							<label class="span2"></label>
							<label class="span3"></label>
							<input type="text" class="text" name="email" value="Email..." onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Email...';}">
							<label class="span4"></label>
							<label class="span5"></label>
							<input type="text" class="text" name="tel" value="Telefone..." onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Telefone...';}">
							<label class="span6"></label>
							<label class="span7"></label>
							<textarea name="msg" onFocus="if(this.value == 'Mensagem...') this.value='';" onBlur="if(this.value == '') this.value='Sua Mensagem';" ><? if($_GET[id]) { echo "ID: " . $_GET[id]; } else { echo "Mensagem..."; } ?></textarea>
							<label class="span8"></label>
							<input type="submit" name="goct" value=".">
						</form>
					</div>

			</div>
		</div>
		<?php
		if($_POST['goct']) {
		$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: ".$_POST['nome']." <".$_POST['email'].">\r\n"; 
$headers .= "Return-Path: ".$_POST['nome']." <".$_POST['email'].">\r\n"; 
mail("".$cfg[email]."", "Contato", "".$_POST['msg']." <br><br><b>".$_POST['nome']."</b><br>".$_POST['tel']."", $headers);
echo "<script>alert('Contato enviado com sucesso!');</script>";
}
?>