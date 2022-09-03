<?php
    namespace App\core;
    
    class RouterCore {
        private $uri;
        private $method;
        private $get_array = [];

        public function __construct() {
            $this->initialize();
            require_once("../App/config/Router.php");
            $this->execute();
        }

        private function initialize() {
            $this->$method = $_SERVER["REQUEST_METHOD"];
            $uri = $_SERVER["REQUEST_URI"];

            $ex = explode("/", $uri);
            $uri = $this->normalizeURI($ex);

            for($i = 0; $i < UNSET_URI_COUNT; $i++) {
                unset($uri[$i]);
            }

            $this->$uri = implode('/', $this->normalizeURI($uri));
            if (DEBUG_URI){
                $this->dd($this->$uri); 
            }
        }

        private function execute() {
            switch($this->method){
                case 'GET':
                    $this->executeGET();
                break;
                case 'POST':
                    $this->executePOST();
                break;
            };
        }

        private function executeGET() {
            foreach($this->get_array as $get) {
                $r = $get['router'];
                echo $r.'- '.$this.$uri.'</br>';

                if($get['router'] == $this->$uri){
                    echo 'achamos !!';
                }
            }
        }

        private function executePOST() {
         
        }

        private function normalizeURI($arr) {
            return array_values(array_filter($arr));
        }

        private function get($router, $call) {
            $this->get_array[] = [
                'router' => $router,
                'call' => $call
            ];
        }

        function dd($params = [], $die = true) {
            echo "<pre>";
                print_r($params);
            echo "</pre>";
    
            if($die) die();
        }
    }

?>