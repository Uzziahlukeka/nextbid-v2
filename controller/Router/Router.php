<?php

class Router{

    protected $routes=[];

    public function add($method,$url,$controller){

        $this->routes[]=[
            'url'=>$url,
            'controller'=>$controller,
            'method'=>$method
        ];

    }

    public function get($url,$controller){

        return $this->add('GET',$url,$controller);
        
    }

    public function post($url,$controller){

        return $this->add('POST',$url,$controller);
        
    }

    public function put($url,$controller){

        return $this->add('PUT',$url,$controller);
        
    }

    public function delete($url,$controller){

        return $this->add('DELETE',$url,$controller);
        
    }

    public function patch($url,$controller){

       return $this->add('PATCH',$url,$controller);
        
    }

    public function route($url,$method){
        foreach ($this->routes as $route){
            if($route['url']==$url && $route['method'] == strtoupper($method)){
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