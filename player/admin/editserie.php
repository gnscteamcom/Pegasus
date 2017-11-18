<?php
	if(isset($_GET['id'])){
		$ID = mysql_real_escape_string($_GET['id']);

		if(isset($_GET['mod'])){
			if($_GET['mod'] == 'delete'){ // Deleta
				@mysql_query("DELETE FROM Embeds WHERE id=$ID AND type='serie'") or die(mysql_error());
				$URL = adminURL('allserie');
				echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
				exit;
			}
		}

		$Pegar = @mysql_query("SELECT * FROM Embeds WHERE id='$ID' AND type='serie' LIMIT 1") or die(mysql_error());
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

			$EpDubAmount = mysql_real_escape_string($_POST['EpDub']); // String
			$aEpDubAmount = @split(',',$EpDubAmount); // Array


			$EpLegAmount = $_POST['EpLeg']; // String
			$aEpLegAmount = @split(',',$EpLegAmount); // Array

			for ($i = 0; $i < $SvAmount; $i++) {
				$SviD = $i+1;
				for ($EpDub = 0; $EpDub < $aEpDubAmount[$i]; $EpDub++) {
					$EpDubiD = $EpDub+1;
					$Stream[$i]['EpDub'][$EpDub]['Name'] = mysql_real_escape_string(htmlspecialchars($_POST["EpDubName-$SviD-$EpDubiD"], ENT_QUOTES));
					$Stream[$i]['EpDub'][$EpDub]['URL'] = $_POST["EpDubURL-$SviD-$EpDubiD"];
					$Stream[$i]['EpDub'][$EpDub]['sType'] = $_POST["sType-$SviD-$EpDubiD"];
				}

				for ($EpLeg = 0; $EpLeg < $aEpLegAmount[$i]; $EpLeg++) {
					$EpLegiD = $EpLeg+1;
					$Stream[$i]['EpLeg'][$EpLeg]['Name'] = mysql_real_escape_string(htmlspecialchars($_POST["EpLegName-$SviD-$EpLegiD"], ENT_QUOTES));
					$Stream[$i]['EpLeg'][$EpLeg]['URL'] = mysql_real_escape_string($_POST["EpLegURL-$SviD-$EpLegiD"]);
					$Stream[$i]['EpLeg'][$EpLeg]['CC'] = mysql_real_escape_string($_POST["EpLegCC-$SviD-$EpLegiD"]);
					$Stream[$i]['EpLeg'][$EpLeg]['sType'] = mysql_real_escape_string($_POST["sTypeLeg-$SviD-$EpLegiD"]);
				}
			}
			$sStream = serialize($Stream);

			$IsValidEmbedID = IsValidEmbedID($ID,$EmbedID);
			$Savestream = false;
			if($IsValidEmbedID == 0){
				$Savestream = mysql_query("UPDATE Embeds SET EmbedID='$EmbedID',Title='$Title',ServerData='$sStream',BgImage='$BgImg' WHERE id='$ID' AND type='serie'") or die(mysql_error());
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
				$URL = adminURL('editserie');
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
	if($_GET['msg'] == 'adding'){ ?>
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
	<?php } } ?>
	<form method="post">
	<div class="">
		<div class="panel panel-default">
			<div class="panel-heading"> Editar Série</div>
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
							  <input id="EpDub" type="hidden" name="EpDub">
							  <input id="EpLeg" type="hidden" name="EpLeg">
							  <div id="addServerHere">
								<script data-cfasync="false">
									<?php for ($i = 0; $i < count($Data); $i++) { ?>
											AddSeason();
											<?php
											//Ep Dub
											if(isset($Data[$i]['EpDub'])) {
											for ($EpDub = 0; $EpDub < count($Data[$i]['EpDub']); $EpDub++) {  ?>
												AddEpDub2(<?php echo $i+1; ?>, '<?php echo $Data[$i]['EpDub'][$EpDub]['Name']; ?>', '<?php echo $Data[$i]['EpDub'][$EpDub]['URL']; ?>', '<?php echo $Data[$i]['EpDub'][$EpDub]['sType']; ?>');
											<?php } } ?>
											<?php
											//Ep Leg
											if(isset($Data[$i]['EpLeg'])) {
											for ($EpLeg = 0; $EpLeg < count($Data[$i]['EpLeg']); $EpLeg++) { ?>
												AddEpLeg2(<?php echo $i+1; ?>, '<?php echo $Data[$i]['EpLeg'][$EpLeg]['Name']; ?>', '<?php echo $Data[$i]['EpLeg'][$EpLeg]['URL']; ?>', '<?php echo $Data[$i]['EpLeg'][$EpLeg]['CC']; ?>', '<?php echo $Data[$i]['EpLeg'][$EpLeg]['sType']; ?>');
											<?php } } ?>
									<?php } ?>
								</script>
							  </div>
							</div>

                            <div class="panel-body">

								<div class="form-panel">
									<div class="btn-group btn-group-justified">
									 <div class="btn-group">
										<button type="button" class="btn btn-theme" onclick="AddSeason()" style="background: #428bca;color: #fff;">Adicionar nova temporada</button>
									  </div>
									  <div class="btn-group">
										<button type="button" class="btn btn-theme" onclick="RemoveSeason()" style="background: #d9534f;color: #fff;">Remova a última temporada</button>
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
												<a type="button" class="btn btn-primary btn-danger" href="<?php echo adminURL('editserie'); ?>?id=<?php echo $ID; ?>&mod=delete" ><i class="fa fa-trash-o"></i> Excluir Série agora</a>
											</div>
										</div>
									</div>
								</div>


							</div>
                        </div>
                    </div>


					<div class="col-md-3 col-sm-12 col-xs-12" style="float: right;">
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
