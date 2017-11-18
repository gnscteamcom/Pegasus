<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="msvalidate.01" content="E304D83EFC10A12751E5E3767A5B9E0D" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="Generator" content="Grifus <?php recoger_version();?> and WordPress">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php $fb_admin=get_option( 'fb_id_admin'); if (!empty($fb_admin)) { ?>
    <meta property="fb:admins" content="<?php echo $fb_admin; ?>" />
    <?php } ?>
    <?php $fb_app=get_option( 'fb_id'); if (!empty($fb_app)) { ?>
    <meta property="fb:app_id" content="<?php echo $fb_app; ?>" />
    <?php } ?>
    <?php $favicon=get_option( 'general-favicon'); if (!empty($favicon)) { ?>
    <link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon" />
    <?php } else { ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
    <?php } ?>
    <title>
        <?php wp_title( '-', true, 'right' ); ?>
        <?php bloginfo( 'name'); ?>
    </title>
	<style>
        @font-face {
            font-family: 'OpenSansBold';
            font-weight: 200;
            src: url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansBold.eot") format("embedded-opentype"),
                url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansBold.woff") format('woff'),
                url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansBold.ttf")  format('truetype');
        }
		@font-face {
			font-family: 'OpenSansSemibold';
			font-weight: 200;
			src: url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansSemibold.eot") format("embedded-opentype"),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansSemibold.woff") format('woff'),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansSemibold.ttf")  format('truetype');
		}
		@font-face {
			font-family: 'OpenSans';
			font-weight: 200;
			src: url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSans.eot") format("embedded-opentype"),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSans.woff") format('woff'),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSans.ttf")  format('truetype');
		}
		@font-face {
			font-family: 'OpenSansLight';
			font-weight: 200;
			src: url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansLight.eot") format("embedded-opentype"),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansLight.woff") format('woff'),
				url("<?php echo get_template_directory_uri(); ?>/fonts/OpenSansLight.ttf")  format('truetype');
		}
		#header .button2016 {
			background-image: url("<?php echo get_template_directory_uri(); ?>/images/butSocials.png");
		}
		#header .butSocials2016:hover .button2016 {
			background-image: url("<?php echo get_template_directory_uri(); ?>/images/butSocialsHover.png");
		}
        #header .iconSearch2016 {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/iconSearch.png");
        }
        #header .inputSearch2016 div.selected {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/iconSearchHover.png");
        }
        .rheader .box .left a div {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/butMenu.png");
        }
        .rheader .box .left a:hover div {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/butMenuHover.png");
        }
        .rheader .box .right a div {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/iconSearch.png");
        }
        .rheader .box .right a:hover div {
            background-image: url("<?php echo get_template_directory_uri(); ?>/images/iconSearchHover.png");
        }
	</style>
    <base href="<?php bloginfo('url'); ?>" />
    <meta name="keywords" content="<?php wp_title( '-', true, 'right' ); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/reset.css?ver=<?php recoger_version();?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/scrollbar.css?ver=<?php recoger_version();?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/icons/style.css?ver=<?php recoger_version();?>" />
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <?php $css=get_option( 'activar-dark'); if ($css=="true" ) { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dark.style.css?ver=<?php recoger_version();?>" />
    <?php } else { ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/mt.min.css?ver=<?php recoger_version();?>" />
    <?php } ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/responsive.min.css?ver=<?php recoger_version();?>" />
    <?php if (!function_exists( 'automatic_feed_links')) { ?>
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
    <?php } ?>
    <?php if($values=get_post_custom_values( "fondo_player")) { ?>
    <meta property="og:image" content="<?php echo $values[0]; ?>" />
    <?php } ?>
    <?php if(is_single()) { $img=get_post_meta($post->ID, "imagenes", $single = true); fbimage ($img); } ?>
    <?php wp_head(); ?>
    <script data-cfasync="false" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <?php $gwebmasters=get_option( 'analitica'); if (!empty($gwebmasters)) echo stripslashes(get_option( 'analitica')); ?>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.idTabs.min.js?ver=<?php recoger_version();?>"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/paginador.js?ver=<?php recoger_version();?>" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.js?ver=<?php recoger_version();?>"></script>
    <?php $activar=get_option( 'activar_js'); if ($activar=="true" ) { $js=get_option( 'code_js'); if(!empty($js)) { echo '<script type="text/javascript">'.$js. '</script>'; } } ?>
    <script>
        var timer = 0;
        var perc = 0;

        function updateProgress(percentage) {
            $('#pbar_innerdiv').css("width", percentage + "%");
            $('#pbar_innertext').text(percentage + "%");
        }

        function animateUpdate() {
            perc++;
            updateProgress(perc);
            if (perc < 100) {
                timer = setTimeout(animateUpdate, 550);
            }
        }
        $(document).ready(function() {
            $('#pbar_outerdiv').click(function() {
                clearTimeout(timer);
                perc = 0;
                animateUpdate();
            });
        });
        $(document).ready(function() {
            $("#arriba").click(function() {
                return $("html, body").animate({
                    scrollTop: 0
                }, 1250), !1
            })
        });
    </script>
    <?php $activar=get_option( 'activar_css'); if ($activar=="true" ) { $css=get_option( 'code_css'); if(!empty($css)) { echo '<style>'.$css. '</style>'; } } ?>
    <?php $css=get_option( 'activar-dark'); if ($css=="true" ) { if($color=get_option( 'darkmain')) { ?>
    <style type="text/css">
        .buscaicon ul li a.buscaboton {
            background-color: #<?php echo $color;
            ?>
        }
        #header .navegador .caja .menu li.current-menu-item a,
        #slider1 .item .imagens span.imdb b,
        #slider2 .item .imagens span.imdb b,
        .items .item .image span.imdb b,
        .items .item .boxinfo .typepost,
        #contenedor .contenido .header .buscador .imputo:before,
        .categorias li.current-cat:before {
            color: #74B8C6;
            ?>
        }
		#header .navegador .caja .menu li.current-menu-item a {
            color: #74B8C6;
			border-color: #74B8C6 !important;
        }
    </style>
    <?php } } else { ?>
    <?php $color1=get_option( 'colormain'); $color2=get_option( 'colorsecon'); $color3=get_option( 'headhover'); $color4=get_option( 'featuredcolor'); if(get_option( 'colormain')) { ?>
    <style>
        #header .navegador,
        #header .navegador .caja .menu li a:hover {
            background: <?php echo $color3;
            ?>;
        }
        .buscaicon ul li a.buscaboton,
        .categorias li span,
        .iteslid ul li a.selected,
        .imdb_r .a span {
            background-color: #<?php echo $color1;
            ?>;
        }
        .news_home .noticias .new .fecha .dia,
        #header .navegador .caja .menu ul li ul.sub-menu li a:before,
        .box_item h1 {
            color: #<?php echo $color1;
            ?>;
        }
    </style>
    <?php } }
    flush();
    ?>
</head>

<body id="bodyplus">
    <?php grifus_users(); ?>
    <div class="rheader">
        <div class="box">
            <div class="left">
                <a class="rclic">
                    <div></div>
                </a>
            </div>
            <div class="rmenus">
                <?php /* menu navegador */ if(get_option( 'edd_sample_theme_license_key')) { function_exists( 'wp_nav_menu') && has_nav_menu( 'menu_navegador' ); wp_nav_menu( array( 'theme_location'=> 'menu_navegador', 'container' => '', 'menu_class' => '') ); } ?>
            </div>
            <div class="right">
                <a class="rclic2">
                    <div></div>
                </a>
            </div>
            <div class="rbuscar">
                <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                    <div class="textar">
                        <input class="buscar" type="text" autocomplete="off" spellcheck="false" autofocus="true" placeholder="Buscar filmes e séries" name="s" id="s" value="<?php echo $_GET['s'] ?>">
                    </div>
                </form>
            </div>
            <div class="center">
                <a href="<?php bloginfo('url'); ?>/">
                    <img src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2016/02/logoTopMin.png" alt="<?php bloginfo('name') ?>"/>
                </a>
            </div>
        </div>
    </div>
    <div id="header" class="">
        <div id="cabeza" class="navegador">
            <div class="<?php global $post_type; if( $post_type == 'tvshows' ) { if(is_single()) { ?>tvshows_single <?php } } global $post_type; if( $post_type == 'episodes' ) { if(is_single()) { ?>tvshows_single <?php } } ?>caja">
				<div class="topLogo2016">
					<div class="centerTop2016">
		                <div class="logo">
		                    <?php $logo=get_option( 'general-logo');if (!empty($logo)) { ?>
		                    <A href="<?php bloginfo('url'); ?>/"><img src="<?php echo $logo; ?>" alt="<?php bloginfo('name') ?>" /></a>
		                    <?php } else { ?>
		                    <A href="<?php bloginfo('url'); ?>/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name') ?>" /></a>
		                    <?php } ?>
		                </div>
						<div class="formSearch2016">
							<form method="get" class="inputSearch2016" id="searchform" action="<?php bloginfo('url'); ?>">
			                    <input type="text" autocomplete="off" spellcheck="false" placeholder="Buscar filmes e séries" name="s" id="s" value="<?php echo $_GET['s'] ?>">
                                <div class="iconSearch2016<?php if(is_search()){ echo " selected"; } ?>"></div>
			                </form>
                            <script>
                                $(document).ready(function(){
                                    $("#header .inputSearch2016 input, #header .iconSearch2016").on("focusin", function(){
                                        var valInput = $("#header .inputSearch2016 input").val();
                                        $("#header .iconSearch2016, #header .inputSearch2016 input").addClass("selected");
                                    }).on("focusout", function(){
                                        var valInput = $(this).val();
                                        if(valInput.length > 0){
                                            $("#header .iconSearch2016, #header .inputSearch2016 input").addClass("selected");
                                        }
                                        else{
                                            $("#header .iconSearch2016, #header .inputSearch2016 input").removeClass("selected");
                                        }
                                    }).on("mouseover", function(){
                                        $("#header .iconSearch2016, #header .inputSearch2016 input").addClass("selected");
                                    }).on("mouseout", function(){
                                        var valInput = $("#header .inputSearch2016 input").val();
                                        if(valInput.length > 0 || $("#header .inputSearch2016 input").is(":focus")){
                                            $("#header .iconSearch2016, #header .inputSearch2016 input").addClass("selected");
                                        }
                                        else{
                                            $("#header .iconSearch2016, #header .inputSearch2016 input").removeClass("selected");
                                        }
                                    });
                                });
                            </script>
						</div>
					</div>
					<?php if(get_option('fb_url') || get_option('gogl_url')){ ?>
					<div class="butSocials2016">
						<div class="button2016"></div>
						<ul class="winSocials2016">
							<?php if($dato=get_option('fb_url')){ ?>
							<a href="<?php echo $dato; ?>" target="_blank" title="Conheça nossa página no Facebok">
								<li>
									<div class="icoSoc2016">
										<img src="<?php echo get_template_directory_uri(); ?>/images/butFb.png">
									</div>
									<div class="nameSoc2016">Facebook</div>
								</li>
							</a>
							<?php }if($dato=get_option('gogl_url')){ ?>
							<a href="<?php echo $dato; ?>" target="_blank" title="Siga-nos no Google+">
								<li>
									<div class="icoSoc2016">
										<img src="<?php echo get_template_directory_uri(); ?>/images/butG+.png">
									</div>
									<div class="nameSoc2016">Google+</div>
								</li>
							</a>
							<?php } ?>
						</ul>
					</div>
					<?php } ?>
				</div>
				<div class="topMenu2016">
	                <div class="menu">
	                    <?php /* menu navegador */ if(get_option( 'edd_sample_theme_license_key')) { function_exists( 'wp_nav_menu') && has_nav_menu( 'menu_navegador' ); wp_nav_menu( array( 'theme_location'=> 'menu_navegador', 'container' => '', 'menu_class' => '') ); } ?>
	                </div>
				</div>
            </div>
        </div>
    </div>
    <div id="contenedor">
        <div class="<?php global $post_type; if( $post_type == 'tvshows' ) { if(is_single()) { ?>tvshows_single <?php } } global $post_type; if( $post_type == 'episodes' ) { if(is_single()) { ?>tvshows_single <?php } } ?>contenido">
            <?php grifus_alertas_user(); ?>
