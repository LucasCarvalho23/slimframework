<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/postagens', function(Request $request, Response $response){
        $response->getBody()->write("Vasco");
        return $response;
    });

    $app->post('/usuarios/add', function(Request $request, Response $response){
        $post = $request->getParsedBody();
        return $response->getBody()->write($post['nome']);
    });

    $app->put('/usuarios/update', function(Request $request, Response $response){
        $post = $request->getParsedBody();
        return $response->getBody()->write($post['email']);
    });

    $app->delete('/usuarios/delete', function(Request $request, Response $response){
        $post = $request->getParsedBody();
        return $response->getBody()->write('User ' . $post['nome'] . ' deletado com sucesso');
    });


    $app->run(); 

?>