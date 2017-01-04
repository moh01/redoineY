<?php
if($_SERVER['SERVER_NAME'] =="test"){
	return array(
    'db' => array(
        'driver'         => 'Pdo_mysql',
        'dsn'            => 'mysql:dbname=lvpi_fr;host=localhost',
        'username' => 'root',
        'password' => 'tizurin',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
	);
}
elseif ($_SERVER['SERVER_NAME']=="127.0.0.1"){
	return array(
	    'db' => array(
	        'driver'         => 'Pdo_mysql',
	        'dsn'            => 'mysql:dbname=lvpi_fr;host=127.0.0.1',
	        'username' => 'root',
	        'password' => '',
	        'driver_options' => array(
	            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
	        ),
	    ),
	);	
}
elseif ($_SERVER['SERVER_NAME']=="dev.lampe-videoprojecteur.info") {
    return array(
    'db' => array(
        'driver'         => 'Pdo_mysql',
        'dsn'            => 'mysql:dbname=lvpi_fr;host=mysqleasy3',
        'username' => 'lmpvideoproj',
        'password' => '5vGiC46G122S',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    );
}
else{
    return array(
    'db' => array(
        'driver'         => 'Pdo_mysql',
        'dsn'            => 'mysql:dbname=lvpi_fr_prod;host=vmeasyl3priv',
        'username' => 'lmpvprojprod',
        'password' => 'GGg1QzEARaro',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''
        ),
    ),
    );
	
}


