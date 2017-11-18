<?php
get_header();
?>
    <div id="single">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            if (has_post_thumbnail()) {
                $imgsrcm = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium');
                $imgsrcm = $imgsrcm[0];
                $imgsrc = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $imgsrc = $imgsrc[0];
            } elseif ($postimages = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=0")) {
                foreach ($postimages as $postimage) {
                    $imgsrcm = wp_get_attachment_image_src($postimage->ID, 'medium');
                    $imgsrcm = $imgsrcm[0];
                    $imgsrc = wp_get_attachment_image_src($postimage->ID, 'full');
                    $imgsrc = $imgsrc[0];
                }
            } elseif (preg_match('/<img [^>]*src=["|\']([^"|\']+)/i', get_the_content(), $match) != FALSE) {
                $imgsrcm = $match[1];
                $imgsrc = $match[1];
            } else {
                if ($img = info_movie_get_meta('poster_url')) {
                    $imgsrcm = $img;
                    $imgsrc = $img;
                } else {
                    $img    = get_template_directory_uri() . '/images/noimg.png';
                    $imgsrcm = $img;
                    $imgsrc = $img;
                }
            }

            $trailers = get_post_meta($post->ID, "youtube_id", $single = true);
            mostrar_trailer_meta($trailers);
            ?>
    </div>
    <?php } ?>
    <div id="revel2" class="skl">
        <?php slk(); ?>
    </div>
    <div id="fb-root"></div>
    <script>
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if(d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <style>
        #boxAboutFilm2015 .mainFilm2015 .imageFilm2015 .image2015 {
            background-image: url("<?php
            if($values = get_post_custom_values("imagenes")){
                $stringImgs = get_post_meta($post->ID, "imagenes", $single = true);
                $arrayImgs = array_filter(explode("\n", $stringImgs));

                if(count($arrayImgs) > 0){
                    $imageThumb = trim(str_replace("/t/p/w300/", "/t/p/original/", $arrayImgs[0]));
                    echo get_bloginfo("url")."/tmdbCache.php?img=".base64_encode($imageThumb);
                }
                else{
                    echo trim($imgsrc);
                }
            }
            else{
                echo trim($imgsrc);
            }
            ?>");
        }
    </style>
    <div class="s_left">
        <div id="boxAboutFilm2015" class="box">
            <div class="mainFilm2015">
                <div class="imageFilm2015">
                    <div class="image2015"></div>
                    <div class="linear2015"></div>
                </div>
                <div class="infoFilm2015">
                    <div class="posterFilm2015">
                        <img src="<?php echo $imgsrcm; $imgsrcm = ''; ?>" alt="<?php the_title(); ?>" width="160" height="235" />
                    </div>
                    <div class="infoTopFilm2015">
                        <div class="nameFilm2015">
                            <h1 title="<?php the_title(); ?>">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="genFilm2015">
                            <div>
                                <?php
                                $allCatThisPost = get_the_category($post->ID);
                                $allCatNames = array();
                                $htmlOutput = "";
                                $numLoopForeach = 0;
                                foreach($allCatThisPost as $catOfPost){
                                    $nameCurCat = $catOfPost->cat_name;
                                    $linkCurCat = get_category_link($catOfPost->cat_ID);
                                    if($nameCurCat != "Lançamentos" && $nameCurCat != "Series" && $nameCurCat != "Legendado"){
                                        if($numLoopForeach > 0){
                                            $htmlOutput .= ", ";
                                        }
                                        $htmlOutput .= "<a href=".$linkCurCat." title=".$nameCurCat.">".$nameCurCat."</a>";
                                    }
                                    $numLoopForeach++;
                                }

                                echo $htmlOutput;
                                ?>
                            </div>
                        </div>
                        <div class="durFilm2015">
                            <div>
                                <span><?php
                                if(has_category(4426)){
                                    echo "Série";
                                }
                                else{
                                    echo "Filme";
                                }
                                ?></span>
                                 (<?php echo get_the_term_list($post->ID, ''.$year_estreno.'', '', '', ''); ?>)<?php
                                 if($values = get_post_custom_values("Runtime")){
                                     $durationTime = (int)$values[0];
                                     if($durationTime < 60){
                                         echo  " - ".$durationTime."min de duração";
                                     }
                                     else{
                                         $durHours = floor($durationTime/60);
                                         $durMinutes = $durationTime-($durHours*60);
                                         if($durMinutes == 0){
                                             echo " - ".$durHours."h de duração";
                                         }
                                         else{
                                             echo " - ".$durHours."h e ".$durMinutes."min de duração";
                                         }
                                     }
                                 }
                                 ?>
                            </div>
                        </div>
                        <?php if($values=get_post_custom_values("imdbRating")){ ?>
                        <style>
                            #boxAboutFilm2015 .rightTopFilm2015 .starsRate2015 {
                                background-image: url("<?php echo get_template_directory_uri(); ?>/images/starsRateBig.png");
                            }
                            #boxAboutFilm2015 .rightTopFilm2015 .starsRate2015 div {
                                background-image: url("<?php echo get_template_directory_uri(); ?>/images/starsRateBigActive.png");
                            }

                            @media only screen and (max-width: 540px) {
                                #boxAboutFilm2015 .rightTopFilm2015 .starsRate2015 {
                                    background-image: url("<?php echo get_template_directory_uri(); ?>/images/starsRate.png");
                                }
                                #boxAboutFilm2015 .rightTopFilm2015 .starsRate2015 div {
                                    background-image: url("<?php echo get_template_directory_uri(); ?>/images/starsRateActive.png");
                                }
                            }
                        </style>
                        <div class="rightTopFilm2015">
                            <div class="starsRate2015" title="Nota do IMDB">
                                <div style="width: <?php echo $values[0]*10; ?>%;"></div>
                            </div>
                            <div class="imdbFilm2015">
                                <span>IMDB</span>
                                 <?php echo $values[0]."/10"; ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="moreInfoFilm2015">
                        <?php
                        $directorName = trim(get_the_term_list($post->ID, ''.$director.'', '', ', ', ''));
                        if(!preg_match("/(N\/A)/", $directorName)){
                        ?>
                        <div>
                            <span>Diretor:</span> <?php echo $directorName; ?>
                        </div>
                        <?php } ?>
                        <div>
                            <span>Elenco:</span> <?php echo get_the_term_list($post->ID, ''.$actor.'', '', ', ', ''); ?>
                        </div>
                        <?php if($noners = info_movie_get_meta("Country")){ ?>
                        <div>
                            <span>Nacionalidades:</span> <?php echo $noners; ?>
                        </div>
                        <?php }
                        if($mostrar = $terms=strip_tags($terms=get_the_term_list($post->ID, ''.$calidad.''))){ ?>
                        <div>
                            <span>Qualidade de vídeo:</span> <?php echo $mostrar; ?></span>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="sinopseFilm2015">
                        <div>
                            <?php echo strip_tags(get_the_content()); ?>
                        </div>
                    </div>
                    <div class="footerFilm2015">
                        <?php
                        $nameCurFilm = get_the_title();
                        ?>
                        <div class="socialsFilm2015">
                            <div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                            <div class="twiter-gplus2015">
                                <iframe src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo "Assista ".$nameCurFilm." online agora mesmo."; ?>&size=m" title="Tweetar" scrolling="no" frameborder="0" allowtransparency="true" style="position: static; visibility: visible; width: 82px; height: 20px;"></iframe>
                                <script src="https://apis.google.com/js/platform.js" async defer> {lang: 'pt-BR'} </script>
                                <div class="g-plusone" data-size="medium" data-href="<?php echo get_permalink(); ?>"></div>
                            </div>
                        </div>
                        <style>
                            #boxAboutFilm2015 .playTrailer2015 .butTrailer2015 div::before {
                                background-image: url("<?php echo get_template_directory_uri(); ?>/images/butTrailer.png");
                            }
                        </style>
                        <?php if($values=info_movie_get_meta("youtube_id")){ ?>
                        <div class="playTrailer2015">
                            <div class="butTrailer2015">
                                <div>
                                    Assistir trailer
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#boxAboutFilm2015 .playTrailer2015 .butTrailer2015").on("click", function(){
                                    $("#boxAboutFilm2015 .trailerFilm2015").toggleClass("showMenu");
                                });
                            });
                        </script>
                        <?php } ?>
                    </div>
                    <?php if($values=info_movie_get_meta("youtube_id")){ ?>
                    <div class="trailerFilm2015">
                        <?php
                        $trailers = get_post_meta($post->ID, "youtube_id", $single = true);
                        mostrar_trailer($trailers)
                        ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <script data-cfasync="false" type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@id": "<?php echo get_permalink(); ?>",
            "@type": "<?php if(has_category(4426)){ echo 'TVSeries'; }else{ echo 'Movie'; } ?>",
            "name": "<?php the_title(); ?>",
            "url": "<?php echo get_permalink(); ?>",
            "description": "<?php echo strip_tags(get_the_content()); ?>",
            <?php
                if(!has_category(4426)){
                    $durIso8051 = "PT";

                    if($values = get_post_custom_values("Runtime")){
                        $durationTime = (int)$values[0];
                        if($durationTime < 60){
                            $durIso8051 .= $durationTime."M";
                        }
                        else{
                            $durHours = floor($durationTime/60);
                            $durMinutes = $durationTime-($durHours*60);
                            if($durMinutes == 0){
                                $durIso8051 .= $durHours."H";
                            }
                            else{
                                $durIso8051 .= $durHours."H".$durMinutes."M";
                            }
                        }
                    }

                    echo '"duration": "'.$durIso8051.'",';
                }
            ?>
            "potentialAction": {
                "@type": "WatchAction",
                "target": {
                    "@type": "EntryPoint",
                    "urlTemplate": "<?php echo get_permalink(); ?>#watch",
                    "actionPlatform": [
                        "http://schema.org/DesktopWebPlatform",
                        "http://schema.org/MobileWebPlatform",
                        "http://schema.org/IOSPlatform",
                        "http://schema.org/AndroidPlatform"
                    ],
                    "inLanguage" : [
                        "pt",
                        "en"
                    ]
                },
                "expectsAcceptanceOf": {
                    "category": "free",
                    "availabilityStarts":"2015-01-01T00:00",
                    "availabilityEnds":"2030-01-31T00:00"
                }
            },
            "hasPart": {
                "@type": "Clip",
                "description": "Trailer",
                "potentialAction": {
                    "@type": "WatchAction",
                    "target": {
                        "@type": "EntryPoint",
                        "urlTemplate": "<?php echo get_permalink(); ?>#trailer",
                        "actionPlatform": [
                            "http://schema.org/DesktopWebPlatform",
                            "http://schema.org/MobileWebPlatform",
                            "http://schema.org/IOSPlatform",
                            "http://schema.org/AndroidPlatform"
                        ],
                        "inLanguage" : [
                            "pt",
                            "en"
                        ]
                    },
                    "expectsAcceptanceOf": {
                        "category": "free",
                        "availabilityStarts":"2015-01-01T00:00",
                        "availabilityEnds":"2030-01-31T00:00"
                    }
                }
            },
            "image": {
                "@type": "ImageObject",
                "height": 594,
                "width": 396,
                "url": "<?php echo $imgsrc; ?>"
            },
            "actor" : [
                <?php
                $terms = wp_get_post_terms($post->ID, $elenco);
                $numActorsAdded = 0;
                foreach ($terms as $term) {
                    if($numActorsAdded > 0){
                        echo ", ";
                    }
                    $term_link = get_term_link($term);
                    if(is_wp_error($term_link)) {
                        continue;
                    }
                    else{
                        $numActorsAdded++;
                    }
                    echo '{"@type" : "Person", "name" : "'.$term->name.'", "url" : "'.esc_url($term_link).'"}';
                }
                ?>
            ],
            "director" : [
                <?php
                $terms = wp_get_post_terms($post->ID, $director);
                $numDirectAdded = 0;
                foreach ($terms as $term) {
                    if($numDirectAdded > 0){
                        echo ", ";
                    }
                    $term_link = get_term_link($term);
                    if (is_wp_error($term_link)) {
                        continue;
                    }
                    else{
                        $numDirectAdded++;
                    }
                    echo '{"@type" : "Person", "name" : "'.$term->name.'", "url" : "'.esc_url($term_link).'"}';
                }
                ?>
            ],
            <?php
            if($values=get_post_custom_values("imdbRating")){
            ?>
            "aggregateRating" : {
                "@type": "AggregateRating",
                "worstRating" : "0",
                "bestRating" : "10",
                "ratingValue" : "<?php echo $values[0]; ?>",
                "ratingCount" : "<?php $values = info_movie_get_meta("imdbVotes"); echo $values; ?>",
                "reviewCount" : "0"
            }
            <?php
            }
            ?>
        }
        </script>
        <script>
            $(document).ready(function(){
                $("#boxPlayerFilm2015 .reportFilm2015").on("click", function(){
                    if($("#boxPlayerFilm2015 .mainReport2015").hasClass("showMenu")){
                        $("#boxPlayerFilm2015 .mainReport2015").removeClass("showMenu");
                        $("#boxPlayerFilm2015 .contPlayer2015").addClass("showMenu");
                        $("#boxPlayerFilm2015 .header h3").text("Assista agora");
                    }
                    else{
                        $("#boxPlayerFilm2015 .contPlayer2015").removeClass("showMenu");
                        $("#boxPlayerFilm2015 .mainReport2015").addClass("showMenu");
                        $("#boxPlayerFilm2015 .header h3").text("Reportar erro");
                    }
                });
            });
        </script>
        <div id="boxPlayerFilm2015" class="box">
            <div class="header">
                <h3>Assista agora</h3>
                <div class="reportFilm2015">Reportar erro</div>
            </div>
            <div class="contPlayer2015 showMenu">
                <?php include_once 'player.php'; ?>
            </div>
            <div class="mainReport2015">
                <div class="contReport2015">
                    <?php include_once 'report.php'; ?>
                </div>
            </div>
        </div>
        <div id="fb-root"></div>
        <script >
            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div id="boxRel2015" class="box">
            <div class="contRel2015">
                <?php include_once 'relacionados.php'; ?>
            </div>
        </div>
        <?php $activar_ads = get_option('activar-anuncio-728-90'); if($activar_ads=="true") { ?>
            <div id="boxMgid2015" class="box">
                <div class="contMgid2015">
                    <?php $ads = get_option('anuncio-728-90'); if(!empty($ads)){ echo stripslashes(get_option( 'anuncio-728-90')); } ?>
                </div>
            </div>
        <?php } ?>
        <div id="commentsFilm2015" class="box">
            <div class="header">
                <h3>Deixe um comentário</h3>
            </div>
            <div class="mainComm2015">
                <div class="contMainComm2015">
                    <div class="fb-comments" data-href="<?php echo get_permalink(); ?>" data-numposts="5" data-colorscheme="dark"></div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php get_footer(); ?>
</div>
