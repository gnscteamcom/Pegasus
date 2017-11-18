<?php
		$PegarFilmes = @mysql_query("SELECT * FROM Embeds WHERE type='Film'") or die(mysql_error());
		$TotalFilmes = mysql_num_rows($PegarFilmes);
		
		$PegarSerie = @mysql_query("SELECT * FROM Embeds WHERE type='Serie'") or die(mysql_error());
		$TotalSerie = mysql_num_rows($PegarSerie);
		
		
		$PegarRelatorios = @mysql_query("SELECT * FROM Reports") or die(mysql_error());
		$TotalRelatorios = mysql_num_rows($PegarRelatorios);
		
		$GetContent = 'Ok';

		
		include('modulo/header.php'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            Resumo <small>do Painel de Controle.</small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-video-camera fa-5x"></i>
                                <h3><?php echo $TotalFilmes; ?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">Filmes</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-blue">
                            <div class="panel-body">
                                <i class="fa fa-desktop fa-5x"></i>
                                <h3><?php echo $TotalSerie; ?></h3>
                            </div>
                            <div class="panel-footer back-footer-blue">Séries</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-red">
                            <div class="panel-body">
                                <i class="fa fa fa-bullhorn fa-5x"></i>
                                <h3><?php echo $TotalRelatorios; ?> </h3>
                            </div>
                            <div class="panel-footer back-footer-red">Relatório</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder bg-color-green">
                            <div class="panel-body">
                                <i class="fa fa-database fa-5x"></i>
                                <h3>Ok</h3>
                            </div>
                            <div class="panel-footer back-footer-green">Banco de dados</div>
                        </div>
                    </div>
<?php include('modulo/footer.php'); ?>