<?php

namespace middle;

class Guest{
    public function handle(){
        if($_SESSION['data'] ?? false && $_SERVER['REQUEST_URI'] !== '/guest'){
            header('Location: /main');
            exit;
        }
    }
}