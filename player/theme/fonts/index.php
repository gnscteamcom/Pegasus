<?php get_header(); ?>
<?php get_template_part( 'includes/aviso');?>
<!-- Slider -->
<?php $estrenos=get_option( 'activar-estrenos'); if ($estrenos=="true" ) { ?>
<div class="box">
    <div class="box_item">
        <div id="slid01">
            <?php include( "includes/funciones/estrenos.php"); ?>
        </div>
    </div>
</div>
<?php
}
$activar=get_option( 'news_home'); if ($activar=="true" ) { ?>
<!-- noticias -->
<div class="news_home">
    <?php $activar_ads=get_option( 'activar-anuncio-300-250'); if ($activar_ads=="true" ) { ?>
    <div class="ads">
        <?php $ads=get_option( 'anuncio-300-250'); if (!empty($ads)) echo stripslashes(get_option( 'anuncio-300-250')); ?>
    </div>
    <?php } ?>
    <div class="noticias">
        <ul class="scrolling">
            <?php $args=array( 'post_type'=> 'noticias', 'showposts' => '10','orderby' => 'modified');$my_query = new WP_Query($args); ?>
            <?php while ($my_query->have_posts()) : $my_query->the_post(); $do_not_duplicate = $post->ID; $IDPost = get_the_ID(); ?>
            <li>
                <div class="new">
                    <div class="fecha">
                        <div class="dia">
                            <?php the_time( 'd') ?>
                        </div>
                        <div class="mes">
                            <?php the_time( 'F') ?>
                        </div>
                    </div>
                    <div class="noti">
                        <div class="titulo">
                            <a href="<?php the_permalink() ?>">
                                <?php the_title(); ?>
                            </a>
                        </div>
                        <div class="contenido">
                            <p>
                                <?php cg_content( '',TRUE, '',16); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</div>
<?php }
global $wp_query;
$isHome = is_home();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>
<div id="revel2" class="skl">
    <?php slk(); ?>
</div>
<script>
    $(document).ready(function(){
        widthScreen = parseInt($(window).width());

        $(window).on("resize", function(){
            widthScreen = parseInt($(window).width());
        });

        $(".items .item a:first-child").on("mouseover", function(){
            var thiis = $(this);
            var tolltip = thiis.next(".boxinfo");
            var widthTp = 301;
            var widthPoster = parseInt(thiis.width());
            var posXPoster = parseInt(thiis.offset().left);
            var sideToTolltip = "right2014";

            if((posXPoster+widthTp+widthPoster+15) > widthScreen){
                sideToTolltip = "left2014";
            }

            tolltip.removeClass("right2014").removeClass("left2014");
            tolltip.addClass(sideToTolltip).addClass("showMenu");
        }).on("mouseout", function(){
            $(".items .item .boxinfo").removeClass("showMenu");
        });
    });
</script>
<!-- contenido -->
<?php $activar_ads = get_option('activar-anuncio-728-90'); if($activar_ads=="true") { ?>
    <div id="boxMgid2015" class="box">
        <div class="contMgid2015">
            <?php $ads = get_option('anuncio-728-90'); if(!empty($ads)){ echo stripslashes(get_option( 'anuncio-728-90')); } ?>
        </div>
    </div>
<?php } ?>
<?php if($paged == 1){ ?>
<div class="box">
    <div class="header">
        <h1>Lançamentos</h1>
    </div>
    <div class="peliculas">
            <!-- ************PELICULAS*************** -->
            <div class="<?php $dato = get_option('item_home'); echo stripslashes ($dato); ?> items">
                <?php
                if($isHome){
                    query_posts(array(
                        'post_type' => "post",
                        'paged' => 1,
                        "posts_per_page" => 16,
                        "cat" => 573,
                        "orderby" => "DESC"
                    ));
                }
                if(have_posts()) : ?>
                <?php post_movies_true(); ?>
                <?php while (have_posts()) : the_post(); if(get_option( 'edd_sample_theme_license_key')) { ?>
                <?php
                $postId = get_the_ID();
                if(has_post_thumbnail()){
                    $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($postId),'medium');
                    $imgsrc = $imgsrc[0];
                }
                elseif($postimages = get_children("post_parent=".$postId."&post_type=attachment&post_mime_type=image&numberposts=0")){
                    foreach($postimages as $postimage){
                        $imgsrc = wp_get_attachment_image_src($postId, 'medium');
                        $imgsrc = $imgsrc[0];
                    }
                }
                elseif(preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE){
                    $imgsrc = $match[1];
                }
                else{
                    if($img = get_post_custom_values($imagefix)){
                        $imgsrc = $img[0];
                    }
                    else{
                        $img = get_template_directory_uri().'/images/noimg.png'; $imgsrc = $img;
                    }
                }

                if($item=get_option( 'item_category')) { include 'includes/home/'.$item. '.php'; } else { include 'includes/home/item_1.php'; } ?>
                <?php } endwhile; ?>
                <?php else : ?>
                <div class="no_contenido_home">
                    <?php _e( 'No content available', 'mundothemes'); ?>
                </div>
                <?php endif; wp_reset_postdata(); ?>
                <!-- **************************** -->
                <?php
                    if($wp_query->max_num_pages > 1){
                ?>
                <div id="paginador">
                    <?php pagination($wp_query->max_num_pages, 2, "/category/lancamentos/");?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="box">
        <div class="header">
            <h1>Filmes</h1>
        </div>
        <div class="peliculas">
                <div class="<?php $dato = get_option('item_home'); echo stripslashes ($dato); ?> items">
                    <?php
                    if($isHome){
                        query_posts(array(
                            'post_type' => "post",
                            'paged' => $paged,
                            "posts_per_page" => 16,
                            "cat" => -4426
                        ));
                    }
                    if(have_posts()) : post_movies_true();
                    while (have_posts()) : the_post(); if(get_option( 'edd_sample_theme_license_key')) {
                    $postId = get_the_ID();
                    if(has_post_thumbnail()){
                        $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($postId),'medium');
                        $imgsrc = $imgsrc[0];
                    }
                    elseif($postimages = get_children("post_parent=".$postId."&post_type=attachment&post_mime_type=image&numberposts=0")){
                        foreach($postimages as $postimage){
                            $imgsrc = wp_get_attachment_image_src($postId, 'medium');
                            $imgsrc = $imgsrc[0];
                        }
                    }
                    elseif(preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE){
                        $imgsrc = $match[1];
                    }
                    else{
                        if($img = get_post_custom_values($imagefix)){
                            $imgsrc = $img[0];
                        }
                        else{
                            $img = get_template_directory_uri().'/images/noimg.png'; $imgsrc = $img;
                        }
                    }

                    if($item=get_option( 'item_category')) { include 'includes/home/'.$item. '.php'; } else { include 'includes/home/item_1.php'; } ?>
                    <?php } endwhile; ?>
                    <?php else : ?>
                    <div class="no_contenido_home">
                        <?php _e( 'No content available', 'mundothemes'); ?>
                    </div>
                    <?php endif;
                        wp_reset_query();
                        if($wp_query->max_num_pages > 1){
                    ?>
                    <div id="paginador">
                        <?php pagination($wp_query->max_num_pages, 2, "");?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if($paged == 1){ ?>
        <div class="box">
            <div class="header">
                <h1>Séries</h1>
            </div>
            <div class="peliculas">
                    <div class="<?php $dato = get_option('item_home'); echo stripslashes ($dato); ?> items">
                        <?php
                        if($isHome){
                            query_posts(array(
                                'post_type' => "post",
                                'paged' => 1,
                                "posts_per_page" => 16,
                                "cat" => 4426
                            ));
                        }
                        if(have_posts()) : post_movies_true();
                        while (have_posts()) : the_post(); if(get_option( 'edd_sample_theme_license_key')) {
                        $postId = get_the_ID();
                        if(has_post_thumbnail()){
                            $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($postId),'medium');
                            $imgsrc = $imgsrc[0];
                        }
                        elseif($postimages = get_children("post_parent=".$postId."&post_type=attachment&post_mime_type=image&numberposts=0")){
                            foreach($postimages as $postimage){
                                $imgsrc = wp_get_attachment_image_src($postId, 'medium');
                                $imgsrc = $imgsrc[0];
                            }
                        }
                        elseif(preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE){
                            $imgsrc = $match[1];
                        }
                        else{
                            if($img = get_post_custom_values($imagefix)){
                                $imgsrc = $img[0];
                            }
                            else{
                                $img = get_template_directory_uri().'/images/noimg.png'; $imgsrc = $img;
                            }
                        }

                        if($item=get_option( 'item_category')) { include 'includes/home/'.$item. '.php'; } else { include 'includes/home/item_1.php'; } ?>
                        <?php } endwhile; ?>
                        <?php else : ?>
                        <div class="no_contenido_home">
                            <?php _e( 'No content available', 'mundothemes'); ?>
                        </div>
                        <?php endif;
                            wp_reset_postdata();
                            if($wp_query->max_num_pages > 1){
                        ?>
                        <div id="paginador">
                            <?php pagination($wp_query->max_num_pages, 2, "/category/series/");?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } ?>
<!-- Contenido -->
<?php get_footer(); ?>
