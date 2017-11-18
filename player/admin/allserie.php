<?php
		if(isset($_GET['p']))
			$page = mysql_real_escape_string($_GET['p']);
		else
			$page = 0;

		$LimitPerPag = 20; // limite por pagina
		$Inicio = $page * $LimitPerPag;

		if(!empty($_GET['Search'])){
			//Tem
			$Procurar = mysql_real_escape_string($_GET['Search']);
			$Pegar = @mysql_query("SELECT * FROM Embeds WHERE type='serie' AND Title LIKE '%$Procurar%' ORDER BY PublishDate DESC LIMIT $Inicio,$LimitPerPag ") or die(mysql_error());
			$TotalLinhas = @mysql_query("SELECT * FROM Embeds WHERE type='serie' AND Title LIKE '%$Procurar%'") or die(mysql_error());

		}else{
			$Pegar = @mysql_query("SELECT * FROM Embeds WHERE type='serie' ORDER BY PublishDate DESC LIMIT $Inicio,$LimitPerPag ") or die(mysql_error());
			$TotalLinhas = @mysql_query("SELECT * FROM Embeds WHERE type='serie'") or die(mysql_error());
		}
		$Linhas = mysql_num_rows($TotalLinhas);
		$pLinhas = mysql_num_rows($Pegar);
		$TotalPag = ceil($Linhas / $LimitPerPag);
		$TotalPag = intval($TotalPag);
		if($TotalPag == 0)
			$TotalPag = 1;
		$server = $_SERVER['SERVER_NAME'];


include('modulo/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="form-panel" style="margin: 0px;float: right;">
				<div class="form-horizontal">
					<div class="form-group" style="margin-bottom: 0px;">
						<label class="col-sm-2 col-sm-2 control-label">Buscar:</label>
						<div class="col-sm-10" style="width: 83.33333333% !important;">
							<form method="get">
								<div class="form-group input-group">
									<input name="Search" type="text" class="form-control" style="display: initial;width: 285px;" value="<?php if(!empty($_GET['Search'])) echo mysql_real_escape_string($_GET['Search']); ?>">
									<span class="input-group-btn" style="float: left;">
										<button type="submit" class="btn btn-default" type="button"><i class="fa fa-search"></i>
										</button>
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<h1 class="page-header">
				Todas <small>as Séries</small>
			</h1>
		</div>
	</div>
		<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Lista de todas as séries <small><?php if(!empty($_GET['Search'])) echo 'Search: '.$_GET['Search']?></small></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example0">
                                    <thead>
                                        <tr>
                                            <th>Título</th>
                                            <th>Data de publicação</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody><?php while($linha = mysql_fetch_array ($Pegar)) {
									if($CONFIG['BaseURI'] != ''){
										$url = '/'.$CONFIG['BaseURI'].'/embed/'.$linha['EmbedID'].'/';
									}else{
										$url = '/embed/'.$linha['EmbedID'].'/';
									}
											?>
                                        <tr class="">
                                            <td><a href="<?php echo $url; ?>" target="_blank"><?php echo $linha['Title']; ?></a></td>
                                            <td><?php echo $linha['PublishDate']; ?></td>
                                            <td>Publicado</td>
                                            <td class="center" style="width: 130px;">
												<a href="<?php echo adminURL('editserie'); ?>?id=<?php echo $linha['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
												<a onclick="AddDelete('<?php echo $linha['id']; ?>');" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete"><i class="fa fa-trash-o "></i> Excluir</a>
											</td>
                                        </tr>
									<?php }	?>
                                    </tbody>
                                </table>
								<script data-cfasync="false">
									function AddDelete(ID){
										document.getElementById("TagADelete").href="<?php echo adminURL('editserie'); ?>?id="+ID+"&mod=delete";
									}
									function RemoveDelete(){
										document.getElementById("TagADelete").href="#";
									}
								</script>
								<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="Delete"> Deletar</h4>
											</div>
											<div class="modal-body">Todos os arquivos vinculados a este post serão excluídos. Tem certeza de que deseja excluir este?</div>
											<div class="modal-footer">
												<button onclick="RemoveDelete();" type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
												<a id="TagADelete" type="button" class="btn btn-primary btn-danger" href="" ><i class="fa fa-trash-o"></i> Excluir Série agora</a>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-6">
										<div class="dataTables_info" id="dataTables-example_info">Mostrando <?php echo $pLinhas; ?> de <?php echo $Linhas; ?> em <?php echo $TotalPag; ?> Página(s)</div>
									</div>
									<div class="col-sm-6" style="width: 100%;">
										<center>
										<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
											<ul class="pagination" style="margin: 2px 0;white-space: nowrap;">
												<!-- <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Previous</a></li> -->
												<?php for ($i = 1; $i <= $TotalPag; $i++) { ?>
												<li class="paginate_button <?php if($_GET['p'] == $i-1){ ?>active<?php } ?>" aria-controls="dataTables-example" tabindex="0"><a href="?p=<?php echo $i-1; ?>"><?php echo $i; ?></a></li>
												<?php } ?>
												<!-- <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Next</a></li> -->
											</ul>
										</div>
										</center>
									</div>
								</div>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
<?php include('modulo/footer.php'); ?>
