<?php

$parameters = include ROOT_DIR . '/config/parameters.php';

$config = Utils::arrayMergeRecursive(array(

    // Environment info
    
    'env' => 'prod', // 'dev' / 'prod'
    
    // Other (do not modify manually)

    'services' => array(
        
        'configuration' => array(
            
            'appSettingsFile' => 'app.settings.php'
        ),
        
        'memory' => array(
            
            'file' => 'data/memory.dat'
        ),

        'logger' => array(
            
            'file'        => 'data/log.dat',
            'logErrors'   => true,
            'logWarnings' => true,
            'logInfos'    => true
        )
    ),
    
    'dbType' => 'mysql',
    
    'avatarImageSize' => 40,
    
    'defaultSettings' => array(
    
        'widgetTheme'            => 'widget-themes/comprepronto',
        'primaryColor'           => '#36a9e1',
        'secondaryColor'         => '#86C953',
        'labelColor'             => '#ffffff',
        'hideWhenOffline'        => false,
        'autoShowWidget'         => 'true',
        'autoShowWidgetAfter'    =>   10,
        'contactMail'            => 'admin@domain.com',
        'loadingLabel'           => 'Carregando...',
        'loginError'             => 'Erro de login',
        'chatHeader'             => 'Atendimento Online',
        'startInfo'              => 'Por favor preencha os campos para iniciar o chat',
        'askForMail'             => 'true',
        'headerHeight'           => 165,
        'widgetWidth'            => 340,
        'widgetHeight'           => 520,
        'widgetOffset'           =>  50,
        'mobileBreakpoint'       => 550,
        'maxConnections'         =>   10,
        'messageSound'           => 'audio/default.mp3',
        'startLabel'             => 'Iniciar',
        'backLabel'              => 'Voltar',
        'initMessageBody'        => 'Olá, como posso ajudá-lo?',
        'initMessageAuthor'      => 'Atendente',
        'chatInputLabel'         => 'Digite sua pergunta',
        'timeDaysAgo'            => 'dia(s)',
        'timeHoursAgo'           => 'hora(s)',
        'timeMinutesAgo'         => 'minuto(s)',
        'timeSecondsAgo'         => 'segundo(s)',
        'offlineMessage'         => 'Atendente off-line',
        'toggleSoundLabel'       => 'Som',
        'toggleScrollLabel'      => 'Auto-scroll',
        'toggleEmoticonsLabel'   => 'Emoticons',
        'toggleAutoShowLabel'    => 'Auto-show',
        'toggleFullscreenLabel'  => 'Tela Cheia',
        'endChatLabel'           => 'Sair do Chat',
        'endChatConfirmQuestion' => 'Você tem certeza?',
        'endChatConfirm'         => 'Sim',
        'endChatCancel'          => 'Cancelar',
        'contactHeader'          => 'Entrar em contato',
        'contactInfo'            => 'Não temos operadores disponíveis neste momento, tente mais tarde ou envie uma mensagem.',
        'contactNameLabel'       => 'Seu nome',
        'contactMailLabel'       => 'Your e-mail',
        'contactQuestionLabel'   => 'Sua dúvida',
        'contactSendLabel'       => 'Enviar',
        'contactSuccessHeader'   => 'Mensagem Enviada',
        'contactSuccessMessage'  => 'Sua mensagem foi enviada, Obrigado!',
        'contactErrorHeader'     => 'Ocorreu um erro',
        'contactErrorMessage'    => 'Erro ao enviar dúvida'
    )

), $parameters);

// Generate connection strings

$config['dbConnectionRaw_mysql'] = 'mysql:host=' . $config['dbHost'] . ';port=' . $config['dbPort'];
$config['dbConnection_mysql']    = 'mysql:dbname=' . $config['dbName'] . ';host=' . $config['dbHost'] . ';port=' . $config['dbPort'];

// Used connection strings

$config['dbConnectionRaw'] = $config['dbConnectionRaw_' . $config['dbType']];
$config['dbConnection']    = $config['dbConnection_'    . $config['dbType']];

return $config;

?>
