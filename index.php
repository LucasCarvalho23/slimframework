<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/postagens', function(Request $request, Response $response){
        $response->getBody()->write("Vasco");
        return $response;
    });

    $app->run(); 

?>