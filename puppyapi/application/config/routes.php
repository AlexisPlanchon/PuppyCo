<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'cities';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Routes for cities
$route['cities']['get'] = 'cities/index';
$route['cities/(:num)']['get'] = 'cities/find/$1';
$route['cities']['post'] = 'cities/index';
$route['cities/(:num)']['put'] = 'cities/index/$1';
$route['cities/(:num)']['delete'] = 'cities/index/$1';

// Routes for category
$route['category']['get'] = 'category/index';
$route['category/(:num)']['get'] = 'category/find/$1';
$route['category']['post'] = 'category/index';
$route['category/(:num)']['put'] = 'category/index/$1';
$route['category/(:num)']['delete'] = 'category/index/$1';

// Routes for produit
$route['produit']['get'] = 'produit/index';
$route['produit/(:num)']['get'] = 'produit/find/$1';
$route['produit']['post'] = 'produit/index';
$route['produit/(:num)']['put'] = 'produit/index/$1';
$route['produit/(:num)']['delete'] = 'produit/index/$1';

// Routes for produit
$route['clients']['get'] = 'clients/index';
$route['clients/(:num)']['get'] = 'clients/find/$1';
$route['clients']['post'] = 'clients/index';
$route['clients/(:num)']['put'] = 'clients/index/$1';
$route['clients/(:num)']['delete'] = 'clients/index/$1';


// Routes for commands
$route['commands']['get'] = 'commands/index';
$route['commands/(:num)']['get'] = 'commands/find/$1';
$route['commands']['post'] = 'commands/index';
$route['commands/(:num)']['put'] = 'commands/index/$1';
$route['commands/(:num)']['delete'] = 'commands/index/$1';

// Routes for forecast
$route['forecast']['get'] = 'forecast/index';
$route['forecast/(:num)']['get'] = 'forecast/find/$1';
$route['forecast']['post'] = 'forecast/index';
$route['forecast/(:num)']['put'] = 'forecast/index/$1';
$route['forecast/(:num)']['delete'] = 'forecast/index/$1';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
//$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
//$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
