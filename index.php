<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/header', function(Request $request, Response $response) {
        $response->write('Esse é um retorno header');
        return $response->withHeader('allow', 'PUT')
                        ->withAddedHeader('Content-Length', '10');
    });

    $app->get('/json', function(Request $request, Response $response) {
        return $response->withJson([
            "nome" => "Lucas Carvalho",
            "nome2" => "Maria Eduarda"
        ]);
    });

    $app->get('/xml', function(Request $request, Response $response) {
        $xml = file_get_contents('arquivo');
        $response->write($xml);
        return $response->withHeader('Content-Type', 'application/xml');
    });

    $app->add(function(Request $request, Response $response, $next) {
        $response->write('This is Middleware + ');
        $response = $next($request, $response);
        $response->write(' + End the middleware.');
        return $response;
    });

    $app->get('/usuario', function(Request $request, Response $response) {
        $response->write('This is Usuário');
    });

    $app->get('/postagem', function(Request $request, Response $response) {
        $response->write('This is Postagem');
    });



    $app->run(); 
    
?>