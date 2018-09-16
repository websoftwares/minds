<?php
/*
|--------------------------------------------------------------------------
| Strict types
|--------------------------------------------------------------------------
 */
declare (strict_types=1);
/*
|--------------------------------------------------------------------------
| Start session
|--------------------------------------------------------------------------
 */
session_start();
/*
|--------------------------------------------------------------------------
| Error reporting enabled default remove for production
|--------------------------------------------------------------------------
 */
error_reporting(E_ALL);
ini_set('display_errors', '1');
/*
|--------------------------------------------------------------------------
| Autoload classes
|--------------------------------------------------------------------------
 */
include 'vendor/autoload.php';
/*
|--------------------------------------------------------------------------
| Imports
|--------------------------------------------------------------------------
 */
use Minds\Provider\GetGuestPickupLocationsServiceProvider;
use Minds\Provider\GetLeaderBoardServiceProvider;
use Minds\Provider\GetTotalGuestServiceProvider;
use Minds\Provider\GuestsDataServiceProvider;
use Slim\Container;
use Slim\App;
use Minds\Action\{
    GetTotalGuestAction, GetLeaderBoardAction, GetGuestPickupLocationsAction
};
/*
|--------------------------------------------------------------------------
| Create container
|--------------------------------------------------------------------------
 */
$container = new Container;
/*
|--------------------------------------------------------------------------
| Inversion of control
|--------------------------------------------------------------------------
 */
$container->register(new GuestsDataServiceProvider());
$container->register(new GetTotalGuestServiceProvider());
$container->register(new GetLeaderBoardServiceProvider());
$container->register(new GetGuestPickupLocationsServiceProvider());
/*
|--------------------------------------------------------------------------
| Create app
|--------------------------------------------------------------------------
 */
$app = new App($container);
/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
 */
$app->get('/beatles/tour/guests', GetTotalGuestAction::class);
$app->get('/beatles/tour/guests/pickup', GetGuestPickupLocationsAction::class);
$app->get('/beatles/tour/guests/leader-board', GetLeaderBoardAction::class);
/*
|--------------------------------------------------------------------------
| Run
|--------------------------------------------------------------------------
 */
try {
    $app->run();
} catch (Exception $exception) {
    die($exception->getMessage());
}
