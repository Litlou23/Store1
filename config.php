<?php
// HTTP
define('HTTP_SERVER', 'http://localhost/');

// HTTPS
define('HTTPS_SERVER', 'https://localhost/');

// DIR
define('DIR_APPLICATION', 'C:/xampp/htdocs/upload/catalog/');
define('DIR_SYSTEM', 'C:/xampp/htdocs/upload/system/');
define('DIR_IMAGE', 'C:/xampp/htdocs/upload/image/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// Localhost DB
// define('DB_DRIVER', 'mysqli');
// define('DB_HOSTNAME', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_DATABASE', 'shop');
// define('DB_PORT', '3306');
// define('DB_PREFIX', 'oc_');

//Live DB  settings
//Must update cpanel to your public ipaddress to get this to work. 
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'mi3-ss15.a2hosting.com');
define('DB_USERNAME', 'sockucom_ocar936');
define('DB_PASSWORD', 'sock4u2020');
define('DB_DATABASE', 'sockucom_ocar936');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');