<?php

// Resolve the public path for the application
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Load our paths config file
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';

// ^^^ Change this if you move your application folder
$paths = new Config\Paths();

// Change to FCPATH if you want other Paths class properties to use "public/" as basis.
// No leading slash. No trailing slash.
define('APPPATH', $paths->appDirectory . DIRECTORY_SEPARATOR);
define('ROOTPATH', $paths->rootDirectory . DIRECTORY_SEPARATOR);
define('SYSTEMPATH', $paths->systemDirectory . DIRECTORY_SEPARATOR);
define('WRITEPATH', $paths->writableDirectory . DIRECTORY_SEPARATOR);
define('ENVIRONMENT', env('CI_ENVIRONMENT', 'production'));

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * the autoloader, loads the constant definitions, loads the database
 * connection details from the .env file, and sets any per-environment
 * variables that the application needs.
 */

require SYSTEMPATH . 'bootstrap.php';

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is setup, it's time to actually fire
 * up the engines and make this app do its job.
 */

// The closure wrapper keeps the variable scope clean
(function () {
    $app = service('app');
    $app->run();
})();
?>
