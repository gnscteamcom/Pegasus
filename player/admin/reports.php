<?php
	if(isset($_GET['id'])){
		$ID = mysql_real_escape_string($_GET['id']);


		if(isset($_GET['mod'])){
			if($_GET['mod'] == 'delete'){ // Deleta
				@mysql_query("DELETE FROM Reports WHERE id='$ID'") or die(mysql_error());
				$URL = adminURL('reports');
				echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
				exit;
			}
			if($ID == -1){
				if($_GET['mod'] == 'alldelete'){ // Deleta
					@mysql_query("DELETE FROM Reports") or die(mysql_error());
					$URL = adminURL('reports');
					echo "<script data-cfasync=\"false\">location.href='$URL';</script>";
					exit;
				}
			}
		}


	}


		if(isset($_GET['p']))
			$page = mysql_real_escape_string($_GET['p']);
		else
			$page = 0;

		$LimitPerPag = 20; // limite por pagina
		$Inicio = $page * $LimitPerPag;

		$Pegar = @mysql_query("SELECT * FROM Reports ORDER BY id DESC LIMIT $Inicio,$LimitPerPag ") or die(mysql_error());
		$TotalLinhas = @mysql_query("SELECT * FROM Reports") or die(mysql_error());
		$Linhas = mysql_num_rows($TotalLinhas);
		$TotalPag = ceil($Linhas / $LimitPerPag);
		$TotalPag = intval($TotalPag);
		if($TotalPag == 0)
			$TotalPag = 1;
		$server = $_SERVER['SERVER_NAME'];


include('modulo/header.php'); ?>
	<div class="row">
		<div class="col-md-12">
			<h1 class="page-header">
				Todos <small>os relatórios</small> <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#AllDelete"><i class="fa fa-trash-o "></i> Excluir todos os relatórios</a>
			</h1>
		</div>
	</div>
		<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">Lista de todos os relatórios</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example0">
                                    <thead>
                                        <tr>
                                            <th>Mensagem</th>
                                            <th>Embed ID</th>
                                            <th>Relatórios</th>
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
                              <tr>
                                  <td><a href="<?php echo $url; ?>" target="_blank"><?php echo $linha['Mensage']; ?></a></td>
								  <td><span class="label label-info label-mini"><?php echo $linha['EmbedID']; ?></span></td>
                                  <td><span class="label label-info label-mini"><?php echo $linha['Reports']; ?></span></td>
								  <td class="center" style="width: 200px;">
									<?php if(getTypeByEmbedID($linha['EmbedID']) == 'film'){ ?>
									<a href="<?php echo adminURL('editstream'); ?>?id=<?php echo getIDByEmbedID($linha['EmbedID']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit Film</a>
									<?php }else{ ?>
									<a href="<?php echo adminURL('editserie'); ?>?id=<?php echo getIDByEmbedID($linha['EmbedID']); ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Edit Serie</a>
									<?php } ?>
									<a onclick="AddDelete('<?php echo $linha['id']; ?>');" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete"><i class="fa fa-trash-o "></i> Delete Report</a>
								  </td>
                              </tr>
						<?php }	?>
                                    </tbody>
                                </table>
								<script data-cfasync="false">
									function AddDelete(ID){
										document.getElementById("TagADelete").href="<?php echo adminURL('reports'); ?>?id="+ID+"&mod=delete";
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
												<h4 class="modal-title" id="Delete"> Delete Report</h4>
											</div>
											<div class="modal-body">Are you sure you want to delete this report?</div>
											<div class="modal-footer">
												<button onclick="RemoveDelete();" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<a id="TagADelete" type="button" class="btn btn-primary btn-danger" href="" ><i class="fa fa-trash-o"></i> Delete Report Now</a>
											</div>
										</div>
									</div>
								</div>
								<div class="modal fade" id="AllDelete" tabindex="-1" role="dialog" aria-labelledby="AllDelete" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="Delete"> Delete All Reports</h4>
											</div>
											<div class="modal-body">Are you sure you want to delete all reports?</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<a id="TagADelete" type="button" class="btn btn-primary btn-danger" href="<?php echo adminURL('reports'); ?>?id=-1&mod=alldelete" ><i class="fa fa-trash-o"></i> Delete ALL Reports Now</a>
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
