<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    class Servico {

    }

    $servico = new Servico;

    $container = $app->getContainer();
    $container['servico'] = function() {
        return new Servico;
    };

    $app->get('/servico', function(Request $request, Response $response) use($servico){
        $servico = $this->get('servico');
        var_dump($servico);
    });

    $app->run(); 

    /* 
    
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
    
    */

?>