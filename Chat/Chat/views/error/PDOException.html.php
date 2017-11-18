<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Erro de Banco de Dados</title>

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

            <div class="header">Erro de Banco de Dados</div>

            <div class="content">
                
                <!-- Message -->
                
                <p class="intro">
                    O aplicativo não pôde se conectar ao seu banco de dados. Por favor, certifique-se de que as configurações de banco de dados estão corretos.
                    
                    <br><br>
                    
                    <strong>
                        Se seu banco de dados — <?php echo $vars['config']['dbName'] ?> —ainda não existe, por favor criá-lo
                        manualmente usando sua ferramenta favorita de administração de banco de dados (e. g. <i>phpMyAdmin</i>) e tente novamente.
                    </strong>
                    
                    <br><br>
                    
                    Mensagem de erro retornado do banco de dados foi:
                </p>
                
                <p class="error">
                    <?php echo $vars['message'] ?>
                </p>
                
                <!-- Actions -->

                <div class="row buttons">
                    <a class="btn" href="<?php echo $app->path('Install:wizard') ?>">
                        Sign in as administrator and correct your database settings
                        <i class="icon-circle-arrow-right icon-white"></i>
                    </a>
                </div>

            </div>
        </div>

    </body>
</html>
