<?php

# Configuração dos bancos de dados suportados no PDO
$databases = array(
    # MYSQL
    'default' => array
        (
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => 3306,
        'dbname' => 'flux_17',
        'user' => 'root',
        'password' => 'root',
	    'limite_produto' => 1000, //limite de produtos cadastrados
        'emailAdmin' => 'admin@gmail.com'
    )
);


/* end file */
