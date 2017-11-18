<?php



	if(isset($_POST['submit'])){
		$Stream = Array();

		$Title = mysql_real_escape_string(htmlspecialchars($_POST['Title'], ENT_QUOTES));
		$BgImg = mysql_real_escape_string($_POST['FilmPosterImageURL']);

		$SvAmount = mysql_real_escape_string($_POST['SvAmount']);

		$EpDubAmount = mysql_real_escape_string($_POST['EpDub']); // String
		$aEpDubAmount = @split(',',$EpDubAmount); // Array


		$EpLegAmount = mysql_real_escape_string($_POST['EpLeg']); // String
		$aEpLegAmount = @split(',',$EpLegAmount); // Array

		for ($i = 0; $i < $SvAmount; $i++) {
			$SviD = $i+1;
			for ($EpDub = 0; $EpDub < $aEpDubAmount[$i]; $EpDub++) {
				$EpDubiD = $EpDub+1;
				$Stream[$i]['EpDub'][$EpDub]['Name'] = mysql_real_escape_string(htmlspecialchars($_POST["EpDubName-$SviD-$EpDubiD"], ENT_QUOTES));
				$Stream[$i]['EpDub'][$EpDub]['URL'] = mysql_real_escape_string($_POST["EpDubURL-$SviD-$EpDubiD"]);
				$Stream[$i]['EpDub'][$EpDub]['sType'] = mysql_real_escape_string($_POST["sType-$SviD-$EpDubiD"]);
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
		$EmbedID = randomString(10,'num');
		$Savestream = mysql_query("INSERT INTO Embeds (EmbedID, Title, ServerData, BgImage, type) VALUES ('$EmbedID', '$Title', '$sStream', '$BgImg', 'serie')") or die(mysql_error());
		$UserRegisterID = mysql_insert_id();
		if ($Savestream){
			$URL = adminURL('editserie');
			echo "<script data-cfasync=\"false\">location.href='$URL?id=$UserRegisterID&msg=adding';</script>";
			exit;
		}

	}
include('modulo/header.php'); ?>
	<form method="post">
	<div class="">
		<div class="panel panel-default">
			<div class="panel-heading"> Adicionar Nova Série</div>
			<div class="panel-body">
				<label class="col-sm-1 col-sm-1 control-label">Título:</label>
				<div class="col-sm-10">
					<input name="Title" type="text" class="form-control">
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
							  <script data-cfasync="false">
								$(document).ready(function () {
									$('#addServerHere').metisMenu();
								});
							  </script>
							  <ul id="addServerHere">
								<script data-cfasync="false">
									AddSeason();
								</script>
							  </ul>
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
								<button name="submit" type="submit" class="btn btn-primary btn-block btn-theme03"><i class="fa fa-check"></i> Publicar</button>
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



								</div>
                            </div>
                        </div>
                    </div>
	</div>
	</form>
<?php include('modulo/footer.php'); ?>
