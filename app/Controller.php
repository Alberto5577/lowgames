<?php
include ('libs/utils.php');
ini_set("session.cookie_lifetime", 600);
session_start();

class Controller
{
    
    public function inicio(){
        
        try{
            $db = Model::getInstance();            
            $params = $db->getVideogames();
        } catch (Exception $e){
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logExceptio.txt");
            header('location:index.php?ctl=error');
        } catch (Error $e) {
            error_log($e->getMessage() . microtime() . PHP_EOL, 3, "logError.txt");
            header('location:index.php?ctl=error');
        }
        
        require __DIR__ . "/templates/inicio.php";
    }
    
    public function logout(){
        session_unset();
        session_destroy();
        header("location:index.php?ctl=inicio");
    }
    
    public function error(){
        require __DIR__. '/templates/error.php';
    }
    
}