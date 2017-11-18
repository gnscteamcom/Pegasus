<?php

	if(isset($_GET['id'])){
		$ID = mysql_real_escape_string($_GET['id']);

		if(isset($_GET['mod'])){
			if($_GET['mod'] == 'delete'){ // Deleta
				@mysql_query("DELETE FROM Embeds WHERE id='$ID' AND type='film'") or die(mysql_error());
				$URL = adminURL('allstream');
				echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
				exit;
			}
		}

		$Pegar = @mysql_query("SELECT * FROM Embeds WHERE id='$ID' AND type='film' LIMIT 1") or die(mysql_error());
		$Resultado = @Mysql_Fetch_Assoc ($Pegar);
		if($Resultado){
			$BgImg = $Resultado['BgImage'];
			$Title = $Resultado['Title'];
			$EmbedID = $Resultado['EmbedID'];

			$Data = @unserialize($Resultado['ServerData']);
			if($Data == '')
				$Data = @unserialize(@utf8_decode($Resultado['ServerData']));
		}else{
			$URL = adminURL('');
			echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
			exit;
		}


		if(isset($_POST['submit'])){
			$Stream = Array();

			$Title = mysql_real_escape_string(htmlspecialchars($_POST['Title'], ENT_QUOTES));
			$BgImg = mysql_real_escape_string($_POST['FilmPosterImageURL']);
			$EmbedID = mysql_real_escape_string($_POST['EmbedID']);

			$SvAmount = mysql_real_escape_string($_POST['SvAmount']);

			for ($i = 0; $i < $SvAmount; $i++) {
				$SviD = $i+1;
				$Stream[$i]['SvName'] = htmlspecialchars($_POST["SvName-$SviD"], ENT_QUOTES);
				$Stream[$i]['URL'] = mysql_real_escape_string($_POST["SvURL-$SviD"]);
				$Stream[$i]['CC'] = mysql_real_escape_string($_POST["ccURL-$SviD"]);
				$Stream[$i]['sType'] = mysql_real_escape_string($_POST["sType-$SviD"]);
				$Stream[$i]['sService'] = mysql_real_escape_string($_POST["sService-$SviD"]);
				$Stream[$i]['sLang'] = mysql_real_escape_string($_POST["sLang-$SviD"]);
			}
			$sStream = serialize($Stream);

			$IsValidEmbedID = IsValidEmbedID($ID,$EmbedID);
			$Savestream = false;
			if($IsValidEmbedID == 0){
				$Savestream = mysql_query("UPDATE Embeds SET EmbedID='$EmbedID',Title='$Title',ServerData='$sStream',BgImage='$BgImg' WHERE id='$ID' AND type='film'") or die(mysql_error());
			}else if($IsValidEmbedID == 1){
				$URL = adminURL('editstream');
				echo "<script data-cfasync=\"false\">location.href='$URL?id=$ID&msg=EmbedID already exists in the Database';</script>";
				exit;
			}else if($IsValidEmbedID == 2){
				$URL = adminURL('editstream');
				echo "<script data-cfasync=\"false\">location.href='$URL?id=$ID&msg=EmbedID must have a minimum of 3 and a maximum of 15 letters and/or numbers';</script>";
				exit;
			}else if($IsValidEmbedID == 3){
				$URL = adminURL('editstream');
				echo "<script data-cfasync=\"false\">location.href='$URL?id=$ID&msg=EmbedID allowed letters and/or numbers only';</script>";
				exit;
			}

			if ($Savestream){
				$URL = adminURL('editstream');
				echo "<script data-cfasync=\"false\">location.href='$URL?id=$ID&msg=update';</script>";
				exit;
			}

		}




	}else{
		$URL = adminURL('');
		echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
		exit;
	}

	include('modulo/header.php');

	if(isset($_GET['msg'])){
	if($_GET['msg'] == 'adding'){

	?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>Adicionar! </b> Adicionado com êxito!
		</div>
	<?php }else if($_GET['msg'] == 'update'){ ?>
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>Atualização! </b> editado com sucesso!
		</div>
	<?php }else{ ?>
		<div class="alert alert-danger alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>Error!</b> <?php echo $_GET['msg']; ?>
		</div>
	<?php } } 	?>
	<form method="post">
	<div class="">
		<div class="panel panel-default">
			<div class="panel-heading"> Editar Filme</div>
			<div class="panel-body">
				<label class="col-sm-1 col-sm-1 control-label">Título:</label>
				<div class="col-sm-10">
					<input name="Title" type="text" class="form-control" value="<?php echo $Title; ?>">
				</div>
			</div>
		</div>
	</div>

	<div class="row">
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
								<input id="SvAmount" type="hidden" name="SvAmount">
								<div id="addServerHere">
									<script data-cfasync="false">
										<?php for ($i = 0; $i < count($Data); $i++) { ?>
												AddServer2('<?php echo $Data[$i]['SvName']; ?>', '<?php echo $Data[$i]['URL']; ?>', '<?php echo $Data[$i]['CC']; ?>', '<?php echo $Data[$i]['sType']; ?>', '<?php echo $Data[$i]['sService']; ?>', '<?php echo $Data[$i]['sLang']; ?>');
										<?php } ?>
									</script>
								</div>

							  <div class="form-panel">
									<div class="btn-group btn-group-justified">
									  <div class="btn-group">
										<button type="button" class="btn btn-theme" onclick="AddServer()" style="background: #428bca;color: #fff;">Adicionar novo servidor</button>
									  </div>
									  <div class="btn-group">
										<button type="button" class="btn btn-theme" onclick="RemoveServer()" style="background: #d9534f;color: #fff;">Remover o último servidor</button>
									  </div>
									  <!--
									  <div class="btn-group">
										<button type="button" class="btn btn-theme">Remove All Server</button>
									  </div>
									  -->
									</div>
								</div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Opções</div>
                            <div class="panel-body">
								<button name="submit" type="submit" class="btn btn-primary btn-block btn-theme03"><i class="fa fa-refresh"></i> Atualizar</button>
								<a class="btn btn-primary btn-block btn-success " data-toggle="modal" data-target="#EditURL"><i class="fa fa-pencil"></i> Editar URL</a>
								<a class="btn btn-primary btn-block btn-danger " data-toggle="modal" data-target="#Delete"><i class="fa fa-trash-o"></i> Excluir Série</a>


								<div class="modal fade" id="EditURL" tabindex="-1" role="dialog" aria-labelledby="EditURL" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="EditURL">Edit URL</h4>
											</div>
											<div class="modal-body">
											<?php if($CONFIG['BaseURI'] != ''){
													$url = '/'.$CONFIG['BaseURI'].'/embed/';
												}else{
													$url = '/embed/';
												} ?>
											<div class="form-group input-group">
												<span class="input-group-addon"><?php echo $url; ?></span>
												<input name="EmbedID" type="text" class="form-control" placeholder="EmbedID" value="<?php echo $EmbedID; ?>">
												<span class="input-group-addon">/</span>
											</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
											</div>
										</div>
									</div>
								</div>

								<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="Delete"> Deletar</h4>
											</div>
											<div class="modal-body">Todos os arquivos vinculados a este post serão excluídos. Tem certeza de que deseja excluir este?</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
												<a type="button" class="btn btn-primary btn-danger" href="<?php echo adminURL('editstream'); ?>?id=<?php echo $ID; ?>&mod=delete" ><i class="fa fa-trash-o"></i> Excluir Filme agora</a>
											</div>
										</div>
									</div>
								</div>


							</div>
                        </div>
                    </div>


					<div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Imagem de fundo</div>
                            <div class="panel-body">
								<div class="FilmPosterUpload">
									<input type="hidden" id="FilmPosterImageURL" name="FilmPosterImageURL" value="">


									<div class="has-image" id="has-image-FP">
										<div class="hover">
											<a class="button-delete ir" id="RemoveFilmPosterImage" style="cursor: pointer;"></a>
										</div>
										<img src="" alt="" id="ImageFilmPoster">
									</div>

									<script type="text/javascript" data-cfasync="false">
										var ApiKey = "<?php echo $CONFIG['ImgurApiKey'];?>";
										var ImgurUpURL = '<?php echo adminURL('ImgurUp'); ?>';
									</script>
									<div class="no-image" id="no-image-FP" style="display: block;">
										<p style="display: block;  margin: 0 !important;">Sem imagem selecionada</p>
										<div id="FileFilmPoster" name="FileFilmPoster" class="fileUpload btn btn-primary">
											<span>Adicionar imagem</span>
											<input id="FilmPosterUpload" name="FilmPosterUpload" type="file" class="btn btn-primary btn-block btn-theme01 upload" accept="image/*" />
										</div>

										<div class="form-group">
											<label class="control-label">(Ou) URL da Imagem:</label>
											<input id="bImgURL" type="text" class="form-control" onchange="FilmPosterAddNovo(this.value)">
										</div>

									</div>
									<script type="text/javascript" data-cfasync="false">
									<?php if($BgImg != ''){ ?>
										FilmPosterAddNovo('<?php echo $BgImg; ?>');
									<?php } ?>
									</script>


								</div>
                            </div>
                        </div>
                    </div>
	</div>
	</form>
<?php include('modulo/footer.php'); ?>
