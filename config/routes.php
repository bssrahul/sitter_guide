<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function ($routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/fb_login', ['controller' => 'Facebook', 'action' => 'fb_login']);
    $routes->connect('/guests', ['controller' => 'guests', 'action' => 'home']);
    $routes->connect('/Guests/index', ['controller' => 'guests', 'action' => 'home']);
    $routes->connect('/guests/index', ['controller' => 'guests', 'action' => 'home']);
    
    $routes->connect('/admin', ['controller' => 'users', 'action' => 'login', 'home']);

	$routes->connect('/', ['controller' => 'Guests', 'action' => 'home']);
    $routes->connect('/dashboard', ['controller' => 'dashboard', 'action' => 'home']);
    $routes->connect('/search', ['controller' => 'search', 'action' => 'search']);
  

       // $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'cms']);
		$routes->connect('/about-us', ['controller' => 'Pages', 'action' => 'cms','about-us']);
		$routes->connect('/privacy', ['controller' => 'Pages', 'action' => 'cms','privacy']);
		$routes->connect('/terms', ['controller' => 'Pages', 'action' => 'cms','terms']);
		$routes->connect('/safety', ['controller' => 'Pages', 'action' => 'cms','safety']);
		$routes->connect('/contact-us', ['controller' => 'Pages', 'action' => 'contactUs']);
		$routes->connect('/news', ['controller' => 'Pages', 'action' => 'news']);
		$routes->connect('/help', ['controller' => 'Pages', 'action' => 'help']);
		$routes->connect('/help-listing', ['controller' => 'Pages', 'action' => 'help-listing']);
		$routes->connect('/help-search-listing', ['controller' => 'Pages', 'action' => 'help-search-listing']);
		$routes->connect('/news-detail', ['controller' => 'Pages', 'action' => 'news-detail']);
		
		//Services Pages
		$routes->connect('/day-night-care', ['controller' => 'Pages', 'action' => 'cms','day-night-care']);
		$routes->connect('/marketplace', ['controller' => 'Pages', 'action' => 'cms','marketplace']);
		$routes->connect('/drop-in-visit', ['controller' => 'Pages', 'action' => 'cms','drop-in-visit']);
		$routes->connect('/house-sitting', ['controller' => 'Pages', 'action' => 'cms','house-sitting']);
		$routes->connect('/boarding', ['controller' => 'Pages', 'action' => 'cms','boarding']);
		
		$routes->connect('/view-profile/*', ['controller' => 'Search', 'action' => 'viewProfile']);
		
		$routes->connect('/blog-listing/*', ['controller' => 'Blogs', 'action' => 'blogListing']);
		$routes->connect('/blog-details/*', ['controller' => 'Blogs', 'action' => 'blogDetails']);


    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
