<?php
class Model extends PDO{
    
    private static $instance = null;
    
    public function __construct(){
        parent::__construct('mysql:host='.Config::$hostname.';dbname='.Config::$name.'',Config::$user, Config::$password);
        parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        parent::exec("set names utf8");
    }
    
    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function idUser($username,$password){
        $consulta = "SELECT username FROM users WHERE username=:valor1 and password=:valor2";
        $stmt=$this->prepare($consulta);
        $stmt->bindParam(":valor1", $username);
        $stmt->bindParam(":valor2", $password);
        $stmt->execute();
        return $stmt->fetch();
        
    }
    
    public function login($username,$password){
        $consulta = "SELECT * FROM users WHERE username=:valor1 and password=:valor2 ;";
        $stmt= $this->prepare($consulta);
        $stmt->bindParam(":valor1", $username);
        $stmt->bindParam(":valor2", $password);
        $stmt->execute();
        
        if ($stmt->rowCount() == 1) {
            $valor = $stmt->fetch();
            if($valor["username"] == $username && $valor["password"] == $password){
                $_SESSION["user"] = $valor;
                return $valor["type_user"];
            }else {
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function increaseSalesId(){
        
        $consulta = "SELECT purchase_id FROM sales ORDER BY purchase_id DESC LIMIT 1";
        $stmt=$this->prepare($consulta);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function getVideogames(){
        
        $consulta ="SELECT * FROM videogames";
        $stmt = $this -> prepare($consulta);
        $stmt -> execute();
        
        return $stmt -> fetchAll();
        
    }
    
}
?> 