<?php
require_once "controller/Middleware/Auth.php";
require_once "controller/Middleware/Guest.php";

class Router{

    protected $routes=[];
    public function add($method,$url,$controller){

        $this->routes[]=[
            'url'=>$url,
            'controller'=>$controller,
            'method'=>$method,
            'middleware'=>null
        ];

    }
    public function get($url,$controller){

         $this->add('GET',$url,$controller);
         return $this ;

    }
    public function post($url,$controller){

        $this->add('POST',$url,$controller);
        return $this ;
        
    }
    public function put($url,$controller){

       $this->add('PUT',$url,$controller);
        return $this ;
        
    }
    public function delete($url,$controller){

         $this->add('DELETE',$url,$controller);
         return $this ;
        
    }
    public function patch($url,$controller){

        $this->add('PATCH',$url,$controller);
        return $this ;
        
    }
    public function only($key){

        $this->routes[array_key_last($this->routes)]['middleware']=$key;

        return $this;

    }
    public function route($url,$method){
        foreach ($this->routes as $route){
            if($route['url']==$url && $route['method'] == strtoupper($method)){

                //middleware 

                if($route['middleware']=== 'guest'){
                    (new Guest)->handle();
                }
                elseif($route['middleware']=== 'auth'){
                    (new Auth)->handle();
                }

                require $route['controller'];

                exit();
            }
        }
        $this->abort();
    }
    protected function abort($code = 404) {
        http_response_code($code);

        // Path based on provided $code

        $viewPath = "view/{$code}.php"; 
        if (file_exists($viewPath)) {

            // Load the dynamic error view
            
            require $viewPath; 
        } 
        exit();
    } 
    
}