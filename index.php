<?php

require 'vendor/autoload.php';

$app = new \Slim\App;

$app->group('/v1', function() use($app) {
    // Instantiate the postcode class
//    $postcode = new Postcode();

    // API Endpoint for our postcodes
    $app->get('/postcodes/{postcode}', function ($request, $response, $args) {
        $postcodeData = PostcodeDatabase::getPostcodeData($args['postcode']);
        var_dump(json_encode($postcodeData));
//        return $response->write(json_encode($postcodeData))
//                ->withHeader('Content-Type', 'application/json');
    });
});

// Run app
$app->run();
