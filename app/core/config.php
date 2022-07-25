<?php

// app info
define('APP_NAME', 'Udemy Clone');
define('APP_DESC', 'Free and paid tutorials');

// database config

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    // database config for local machine

    define('DBHOST', 'localhost');
    define('DBNAME', 'udemy_db');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');

    // root path
    define('ROOT', 'http://localhost/udemyClone/public');
} else {
    // database config for live server

    // root path e.g. https://www.yourwebsite.com
    define('ROOT', 'http://');
}
