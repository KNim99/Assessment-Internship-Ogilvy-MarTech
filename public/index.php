<?php

use app\controllers\AuthController;
use app\controllers\StudentController;
use app\controllers\SiteController;
use app\controllers\OwnerController;
use app\controllers\VehicleController;
use app\controllers\VehicleOwnerController;
use app\controllers\DriverController;
use app\core\Application;
use app\models\Customer;
use app\models\driver;
use app\models\owner;
use app\models\vehicle;
use app\models\vehicle_Owner;


require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

 
$config = [
    'customerClass'=>Customer::class,
    'ownerClass'=>owner::class,
    'vehicleOwnerClass'=> vehicle_Owner::class,
    'driverClass'=> driver::class,
    'db'=> [
        'dsn'=>$_ENV['DB_DSN'],
        'user'=>$_ENV['DB_USER'],
        'password'=>$_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(dirname(__DIR__),$config);

$app->router->get('/', [SiteController::class, 'home']);

$app->router->post('/user/register',[AuthController::class,'student_register']);

$app->router->get('/login', [SiteController::class, 'loginPage']);
$app->router->post('/login', [SiteController::class, 'loginPage']);




$app->run();