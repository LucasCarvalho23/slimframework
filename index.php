<?php

    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;
    use Illuminate\Database\Capsule\Manager as Capsule;

    require 'vendor/autoload.php';

    $app = new \Slim\App;

    $container = $app->getContainer();
    $container['db'] = function() {

        $capsule = new Capsule;

        $capsule->addConnection([
            'driver' => 'mysql',
            'host' => 'locahost',
            'database' => 'database',
            'username' => 'root',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        return $capsule;
    };

    $app->get('/usuarios', function(Request $request, Response $response) {
        $db = $this->get('db')->schema();
        $db->dropIfExists('teste');
        $db->create('teste', function($table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email');
            $table->timestamps();
        });
    });

    $app->run(); 
    
?>