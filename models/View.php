<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of View
 *
 * @author pabhoz
 */
class View implements IView{
    
    private $title;

    public function render($controller,$view,$title = ''): void{
        
        $controllerWithTail = get_class($controller);
        $controllerName = substr($controllerWithTail, 0, -11);
        $path = './views/'.$controllerName.'/'.$view;
        
        if ($title != "") {
                $this->title = $title;
        }
            
        if(file_exists($path.".php")) {
            require_once $path.".php";
        }elseif (file_exists($path.".html")) {
            require_once $path.".html";
        }else{
            die("Error: Invalid view ".$view." to render");
        }
    }
    
    public function loadFragment($fragmentName) : void{
        $path = './views/_fragments/'.$fragmentName;
        if(file_exists($path.".php")) {
            require_once $path.".php";
        }else{
            die("Error: Invalid view ".$view." to render");
        }
    }

}
