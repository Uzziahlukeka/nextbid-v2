<?php

namespace middle;

use Exception;

class Middleware{

    //creating a static map for the keys

    public const MAP =[
        'guest' => Guest::class,
        'auth'=> Auth::class
    ];

    public static function resolve($key){

        if(! $key){
            return ;
        }

        $middleware=Middleware::MAP[$key] ?? false;

        if(!$middleware){
            throw new Exception("no match for this key".$key);
        }

        (new $middleware)->handle();

    }

    public function orin(){
        echo " im in";
    }


}