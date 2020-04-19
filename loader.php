<?php

spl_autoload_register(function($class){
    
    if(file_exists(INTERFACES.$class.".php")){
        require_once INTERFACES.$class.".php";
        return 0;
    }
    
    if(file_exists(FACTORIES.$class.".php")){
        require_once FACTORIES.$class.".php";
        return 0;
    }

    if(file_exists(MODELS.$class.".php")){
        require_once MODELS.$class.".php";
        return 0;
    }

});

