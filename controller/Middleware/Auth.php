<?php

namespace middle;

class Auth{
    public function handle(){
        if(! $_SESSION['data'] ?? false && $_SERVER['REQUEST_URI'] !== '/guest'){
            header('location: /');
            exit;
        }
    }
}