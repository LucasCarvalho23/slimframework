<?php 

namespace MyApp\controllers;

    class Home {
        
        protected $view;

        public function __construct($view) {
            $this->view = $view;
        }

        public function index($request, $response) {
            echo ("<pre>");
            var_dump($this->view);
            echo ("</pre>");
            return $response->write('Teste index');
        }

    }

?>