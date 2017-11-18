<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Caminho inválido</title>

        <!-- Fonts -->

        <?php echo $app->renderView('blocks/fonts.html'); ?>

        <!-- Styles -->

        <link rel="stylesheet" href="<?php echo $app->asset('css/jquery.mCustomScrollbar.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/framework.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/main.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/admin.css') ?>" />
        <link rel="stylesheet" href="<?php echo $app->asset('css/bootstrap.css') ?>" />
    </head>
    <body class="install-wizard">

        <div class="panel">

            <div class="header">Caminho inválido</div>

            <div class="content">
                
                <!-- Message -->
                
                <p class="intro">
                    O caminho <b>/<?php echo $app->request->getRoute() ?></b> não foi encontrado
                </p>

                <!-- Actions -->

                <div class="row buttons">
                    <a class="btn" href="<?php echo $app->path('Admin:index') ?>">
                        Ir para o login
                        <i class="icon-circle-arrow-right icon-white"></i>
                    </a>
                </div>

            </div>
        </div>

    </body>
</html>
