<?php
	if(isset($_POST['submit'])){
		$Stream = Array();

		$Title = mysql_real_escape_string(htmlspecialchars($_POST['Title'], ENT_QUOTES));
		$BgImg = mysql_real_escape_string($_POST['FilmPosterImageURL']);

		$SvAmount = mysql_real_escape_string($_POST['SvAmount']);

		for ($i = 0; $i < $SvAmount; $i++) {
			$SviD = $i+1;
			$Stream[$i]['SvName'] = mysql_real_escape_string(htmlspecialchars($_POST["SvName-$SviD"], ENT_QUOTES));
			$Stream[$i]['URL'] = mysql_real_escape_string($_POST["SvURL-$SviD"]);
			$Stream[$i]['CC'] = mysql_real_escape_string($_POST["ccURL-$SviD"]);
			$Stream[$i]['sType'] = mysql_real_escape_string($_POST["sType-$SviD"]);
			$Stream[$i]['sService'] = mysql_real_escape_string($_POST["sService-$SviD"]);
			$Stream[$i]['sLang'] = mysql_real_escape_string($_POST["sLang-$SviD"]);
		}
		$sStream = serialize($Stream);
		$EmbedID = randomString(10,'num');
		$Savestream = mysql_query("INSERT INTO Embeds (EmbedID, Title, ServerData, BgImage, type) VALUES ('$EmbedID', '$Title', '$sStream', '$BgImg', 'film')") or die(mysql_error());
		$UserRegisterID = mysql_insert_id();
		if ($Savestream){
			$URL = adminURL('editstream');
			echo "<script data-cfasync=\"false\">location.href='$URL?id=$UserRegisterID&msg=adding';</script>";
			exit;
		}

	}
include('modulo/header.php'); ?>
	<form method="post">
	<div class="">
		<div class="panel panel-default">
			<div class="panel-heading"> Adicionar novo filme</div>
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
							  <div id="addServerHere">
								<script data-cfasync="false">
									AddServer();
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

									<script data-cfasync="false" type="text/javascript">
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
