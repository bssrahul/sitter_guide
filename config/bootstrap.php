<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * Configure paths required to find CakePHP + general filepath
 * constants
 */
require __DIR__ . '/paths.php';

// Use composer to load the autoloader.
require ROOT . DS . 'vendor' . DS . 'autoload.php';

/**
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

// You can remove this if you are confident you have intl installed.
if (!extension_loaded('intl')) {
    trigger_error('You must enable the intl extension to use CakePHP.', E_USER_ERROR);
}

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Network\Request;
use Cake\Routing\DispatcherFactory;
use Cake\Utility\Inflector;
use Cake\Utility\Security;

/**
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */
try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
} catch (\Exception $e) {
    die($e->getMessage() . "\n");
}

// Load an environment local configuration file.
// You can use a file like app_local.php to provide local overrides to your
// shared configuration.
//Configure::load('app_local', 'default');

// When debug = false the metadata cache should last
// for a very very long time, as we don't want
// to refresh the cache while users are doing requests.
if (!Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+1 years');
    Configure::write('Cache._cake_core_.duration', '+1 years');
}

/**
 * Set server timezone to UTC. You can change it to another timezone of your
 * choice but using UTC makes time calculations / conversions easier.
 */
date_default_timezone_set('UTC');

/**
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/**
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', 'en_US');

/**
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

// Include the CLI bootstrap overrides.
if ($isCli) {
    require __DIR__ . '/bootstrap_cli.php';
}

/**
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
    }
    unset($httpHost, $s);
}

Cache::config(Configure::consume('Cache'));
ConnectionManager::config(Configure::consume('Datasources'));
Email::configTransport(Configure::consume('EmailTransport'));
Email::config(Configure::consume('Email'));
Log::config(Configure::consume('Log'));
Security::salt(Configure::consume('Security.salt'));

/**
 * The default crypto extension in 3.0 is OpenSSL.
 * If you are migrating from 2.x uncomment this code to
 * use a more compatible Mcrypt based implementation
 */
// Security::engine(new \Cake\Utility\Crypto\Mcrypt());

/**
 * Setup detectors for mobile and tablet.
 */
Request::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();
    return $detector->isMobile();
});
Request::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();
    return $detector->isTablet();
});

/**
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 *
 * Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
 * Inflector::rules('irregular', ['red' => 'redlings']);
 * Inflector::rules('uninflected', ['dontinflectme']);
 * Inflector::rules('transliteration', ['/å/' => 'aa']);
 */

/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. make sure you read the documentation on Plugin to use more
 * advanced ways of loading plugins
 *
 * Plugin::loadAll(); // Loads all plugins at once
 * Plugin::load('Migrations'); //Loads a single plugin named Migrations
 *
 */

Plugin::load('Migrations');

// Only try to load DebugKit in development mode
// Debug Kit should not be installed on a production system
if (Configure::read('debug')) {
    Plugin::load('DebugKit', ['bootstrap' => true]);
}

/**
 * Connect middleware/dispatcher filters.
 */
DispatcherFactory::add('Asset');
DispatcherFactory::add('Routing');
DispatcherFactory::add('ControllerFactory');

/**
 * Enable default locale format parsing.
 * This is needed for matching the auto-localized string output of Time() class when parsing dates.
 */
Type::build('date')->useLocaleParser();
Type::build('datetime')->useLocaleParser();

/**
 * Configure the cache for model and datasource caches. This cache configuration
 * is used to store schema descriptions, and table listings in connections.
 */
 //pr($_SERVER); die;
$root	= explode('/',$_SERVER['REQUEST_URI']);
$rootPath	= isset($root[1])?$root[1]:'';
define("ROOT_PATH",$rootPath);
define("SITE_TITLE",'Sitter Guide');
define("SITE_OWNER",'Daevid Richards');
define("DEVELOPED_BY",'Beta-soft systems');
define("WEBROOT_PATH",$_SERVER['DOCUMENT_ROOT']."/".ROOT_PATH."/webroot/");
define('HTTP_ROOT','http://'.$_SERVER['HTTP_HOST'].'/'.$rootPath.'/');
define("DATE_FORMAT",'M d, Y');
define("AUTHENTICATION_FAILED",'Authentication Failed! Please try again.');
define("LOGGED_OUT",'You have logged out successfully.');
define("LOGIN_ERROR",'Invalid Email Address or Password! Please try again.');
define("LOGIN_SUCCESS",'You have logged in successfully.');
define("ACTIVATE_ACCT",'Your account has been activated successfully.');
define("UPDATE_PROFILE",'Profile has been updated successfully.');
define("SIGN_UP",'Registration process completed, Welcome to '.SITE_TITLE.' .');
define("UPDATE_PASS",'Password has been updated successfully.');
define('VALID_EMAIL','Please enter valid E-Mail!');
define('PASSWORD_LENGTH','Enter minimum 6 Characters for password!');
define('PASSWORD_DOES_NOT_MATCH','Password and confirm password does not matched!');
define('INVALID_EMAIL_ADDRESS','Please enter valid e-mail address!');
define('NUMERIC_VALUES','Only digits allowed!');
define('TEN_DIGIT_NUMBER','Enter Ten digit mobile number!');
define('PASSWORD_SENT','Password has been sent to your email address!');
define('SITE_OWNER_EMAIL','mike@razznation.com');

define('CURRENT_YEAR',date("Y"));
define('NEW_BOOKING_MESSAGE','You have been received new booking request');
define('BOOKING_DECLINED_MESSAGE','Your booking request has been declined.');
define('BOOKING_DECLINED_ACCEPTED','Booking request has been accepted by you.');

define('REFERAL_BONUS',20);
define('DEFAULT_CITY','Sydney Australia');

define("DEFAULT_RADIUS",10000);
ini_set('intl.default_locale', 'en_US');

require ROOT . DS . 'config' . DS . 'facebook_api_credentials.php';
require ROOT . DS . 'config' . DS . 'stripe_api_credentials.php';
require ROOT . DS . 'config' . DS . 'captcha_api_credentials.php';
require ROOT . DS . 'config' . DS . 'twilio.php';
require ROOT . DS . 'config' . DS . 'bandwidth.php';
require ROOT . DS . 'config' . DS . 'google_location_api.php';
