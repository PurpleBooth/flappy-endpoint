<?php
use Monolog\Handler\FingersCrossedHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\TagProcessor;
use Monolog\Formatter\LogstashFormatter;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$app          = new Silex\Application();
$app['debug'] = true;

/**
 * A very basic endpoint allowing us to demo how logstash can parse nginx access logs
 */
$app->get(
    '/', function () use ($app) {
    return 'Everything is okay! see /flappy for something that\'s less reliable';
}
);

/**
 * An additional endpoint to demonstrate rolling updates
 */
$app->get(
    '/v2', function () use ($app) {
    return 'Hey look, a new version!';
}
);


/**
 * This endpoint produces either a succesfull response or one of a few predefined errors.
 * It allows us to demo logstash's ability to surface errors from logs.
 *
 * Errors include a 404, a 500 and a sucesfull but latent request.
 */
$app->get(
    '/flappy', function (Request $req) use ($app) {

    $option = rand(0, 3);

    switch ($option) {
        case 0:
            $response = new Response("NOT FOUND", 404);
            break;
        case 1:
            $response = new Response("Something terrible has happened", 500);
            break;
        case 2:
            sleep(3);
            $response = new Response("Slow response");
            break;
        case 3:
            $response = new Response("Normal response");
            break;
    }

    return $response;
}
);

$app->run();