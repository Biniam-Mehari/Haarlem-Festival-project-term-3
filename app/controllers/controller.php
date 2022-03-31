<?php

// assigning a namespace so it can be used with 'use' in other places (c# way)
namespace Controllers;

class Controller {
    
    function displayView($model) {        
        $directory = strtolower(substr(get_class($this), 0, -10));
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }
}