<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index_controller
 *
 * @author pabhoz
 */
class Index_controller extends Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(): void {
        $this->view->render($this,"index","Woooooah MVC");
    }
    
    public function login(): void {
        $this->view->render($this, "login", "Login");
    }
    
    public function arena(): void{
        if(!isset($_SESSION['user'])) {            
            header('Location:' . URL);
        }
        $this->view->render($this,"arena","Arena");
    }
    
    public function characters(): void{
        if(!isset($_SESSION['user'])) {            
            header('Location:' . URL);
        }
        $this->view->render($this,"characters","Characters");
    }
    
}
