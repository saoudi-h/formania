<?php




use Formania\App\Router;
use formania\App\Config;

define('ROOT', dirname(__DIR__));
require ROOT . '../App/Config.php';
require ROOT . '../App/Router.php';


$router = new Router();

$router->get('/error/{slug}', 'ErrorController@show');
$router->get('/404', 'NotFoundController@index');
$router->get('/', 'HomeController@index');
$router->get('/course', 'CourseController@showAll');
$router->post('/course', 'CourseController@store');
$router->get('/course/{slug}', 'CourseController@show');
$router->put('/course/{slug}', 'CourseController@update');
$router->delete('/course/{slug}', 'CourseController@delete');
$router->get('/login', 'LoginController@index');
$router->post('/login', 'LoginController@login');
$router->get('/register', 'RegisterController@index');
$router->post('/register', 'RegisterController@register');


$router->handleRequest($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
