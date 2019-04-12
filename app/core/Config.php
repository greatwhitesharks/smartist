<?php

// TODO : Convert this to a singleton object

/* Configuration for special urls */

define('PUBLIC_URL', dirname(($_SERVER['PHP_SELF'])));


/* Configuration for database*/

define('DB_HOST', 'localhost');
define('DB_NAME', 'smartist');
define('DB_USER', 'root');
define('DB_PASS', '');

/* Configurations */

// The key set in $_SESSION to indicate the current user
define('ACCOUNT_IDENTIFIER', 'accountId');

define('LOGIN_REDIRECT_URL', '/smartist/public/login');

define('FOLLOW_TABLE', 'following');
define('CONTROLLER_PATH', '../app/controllers/');
define('VIEW_PATH', '../app/views/');
define('MODEL_PATH', '../app/models/');
