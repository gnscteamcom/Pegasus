<?php
//função do tema
function isPage($page){
	if($page == ''){
		if(!isset($_GET['page'])){
			return true;
		}
	}else{
		if(isset($_GET['page'])){
			if($_GET['page'] == $page){
				return true;
			}
		}
	}
	return false;
}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $CONFIG['SiteTitle']; ?> - Admin Page</title>
	<!-- Bootstrap Styles-->
    <link href="<?php echo adminPath('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
	<!-- FontAwesome Styles-->
    <link href="<?php echo adminPath('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
	<!-- Custom Styles-->
    <link href="<?php echo adminPath('assets/css/custom-styles.css'); ?>" rel="stylesheet" />
     <!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<script data-cfasync="false" src="<?php echo adminPath('assets/js/jquery-1.10.2.js'); ?>"></script>
	<script data-cfasync="false" src="<?php echo adminPath('assets/js/functions.js'); ?>?nocache"></script>
	<script type="text/javascript" data-cfasync="false">
		var TypesStream = [];
		<?php echo variables_JSHeader($CONFIG['Types']); ?>
		var API = '';
		var UID = '';
		var sUID = '';
	</script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo adminURL(''); ?>">Painel Admin</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <!--<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Doe</strong>
                                    <span class="pull-right text-muted">
                                        <em>Today</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since an kwilnw...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem Ipsum has been the industry's standard dummy text ever since the...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    .dropdown-messages
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">28% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="28" aria-valuemin="0" aria-valuemax="100" style="width: 28%">
                                            <span class="sr-only">28% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">85% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
                                            <span class="sr-only">85% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
				-->
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!--
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
						-->
                        <li><a href="<?php echo adminURL('logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a <?php if(isPage('')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL(''); ?>"><i class="fa fa-dashboard"></i> Painel</a>
                    </li>
                    <li <?php if(isPage('addstream') || isPage('allstream') || isPage('editstream')) { ?>class="active"<?php } ?>>
                        <a <?php if(isPage('addstream') || isPage('allstream') || isPage('editstream')) { ?>class="active-menu"<?php } ?> href="#"><i class="fa fa-video-camera"></i> Filmes<span class="fa arrow"></span></a>
                        <?php if(isPage('addstream') || isPage('allstream') || isPage('editstream')) { ?><ul class="nav nav-second-level collapse in" style="height: auto;"><?php }else{ ?><ul class="nav nav-second-level"><?php } ?>
                            <li>
                                <a <?php if(isPage('addstream')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL('addstream'); ?>">Adicionar Filmes</a>
                            </li>
                            <li>
                                <a <?php if(isPage('allstream')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL('allstream'); ?>">Todos os Filmes</a>
                            </li>
                        </ul>
                    </li>
					<li <?php if(isPage('addserie') || isPage('allserie') || isPage('editserie')) { ?>class="active"<?php } ?>>
                        <a <?php if(isPage('addserie') || isPage('allserie') || isPage('editserie')) { ?>class="active-menu"<?php } ?> href="#"><i class="fa fa-desktop"></i> Séries<span class="fa arrow"></span></a>
                        <?php if(isPage('addserie') || isPage('allserie') || isPage('editserie')) { ?><ul class="nav nav-second-level collapse in" style="height: auto;"><?php }else{ ?><ul class="nav nav-second-level"><?php } ?>
                            <li><a <?php if(isPage('addserie')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL('addserie'); ?>">Adicionar Séries</a></li>
                            <li><a <?php if(isPage('allserie')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL('allserie'); ?>">Todas as Séries</a></li>
                        </ul>
                    </li>
					<li>
                        <a <?php if(isPage('reports')) { ?>class="active-menu"<?php } ?> href="<?php echo adminURL('reports'); ?>"><i class="fa fa-gear"></i> Relatórios</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
