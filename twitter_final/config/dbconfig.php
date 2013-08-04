<?php
    define('DB_SERVER', 'mysqlv109');
    define('DB_USERNAME', 'imtiaz818');
    define('DB_PASSWORD', 'Multimedia123');
    define('DB_DATABASE', 'garden_mysqladmin');

    $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
    $database = mysql_select_db(DB_DATABASE) or die(mysql_error());

  $currency = '&euro;'; //Currency sumbol or code
?>
