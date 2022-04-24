<?php

/**
 * Clase para realizar validaciones en el modelo
 * Es utilizada para realizar validaciones en el modelo de nuestras clases.
 *
 */
class Validacion
{
    
    protected $_atributos;
    
    protected $_error;
    
    public $mensaje;
    
    /**
     * Metodo para indicar la regla de validacion
     * El método retorna un valor verdadero si la validación es correcta, de lo contrario retorna el objeto
     * actual, permitiendo acceder al atributo Validacion::$mensaje ya que es publico
     */
    public function rules($rule = array(), $data)
    {
        
        if (! is_array($rule)) {
            $this->mensaje = "las reglas deben de estar en formato de arreglo";
            return $this;
        }
        foreach ($rule as $key => $rules) {
            $reglas = explode(',', $rules['regla']);
            if (array_key_exists($rules['name'], $data)) {
                foreach ($data as $indice => $valor) {
                    if ($indice === $rules['name']) {
                        foreach ($reglas as $clave => $valores) {
                            $validator = $this->_getInflectedName($valores);
                            if (! is_callable(array(
                                $this,
                                $validator
                            ))) {
                                throw new BadMethodCallException("No se encontro el metodo $valores");
                            }
                            $respuesta = $this->$validator($rules['name'], $valor);
                        }
                        break;
                    }
                }
            } else {
                
                $this->mensaje[$rules['name']] = "el campo {$rules['name']} no esta dentro de la regla de validación o en el formulario";
            }
        }
        if (!empty($this->mensaje)) {
            return $this;
        } else {
            return true;
        }
    }
    
    /*
     * Metodo inflector de la clase
     * por medio de este metodo llamamos a las reglas de validacion que se generen
     */
    private function _getInflectedName($text)
    {
        $validator = "";
        $_validator = preg_replace('/[^A-Za-z0-9]+/', ' ', $text);
        $arrayValidator = explode(' ', $_validator);
        if (count($arrayValidator) > 1) {
            foreach ($arrayValidator as $key => $value) {
                if ($key == 0) {
                    $validator .= "_" . $value;
                } else {
                    $validator .= ucwords($value);
                }
            }
        } else {
            $validator = "_" . $_validator;
        }
        
        return $validator;
    }
    
    /**
     * Metodo de verificacion de que el dato no este vacio o NULL
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _noEmpty($campo, $valor)
    {
        if (isset($valor) && ! empty($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de estar lleno";
            return false;
        }
    }
    
    /**
     * Metodo de verificacion de tipo numerico
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _numeric($campo, $valor)
    {
        if (is_numeric($valor)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe de ser numerico";
            return false;
        }
    }
    
    /**
     * Metodo de verificacion de tipo email
     * El metodo retorna un valor verdadero si la validacion es correcta de lo contrario retorna un valor falso
     * y llena el atributo validacion::$mensaje con un arreglo indicando el campo que mostrara el mensaje y el
     * mensaje que visualizara el usuario
     */
    protected function _email($campo, $valor)
    {
        if (filter_var($valor,FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->mensaje[$campo][] = "el campo $campo debe estar en el formato de email usuario@servidor.com";
            return false;
        }
    }
}

function quitarEspacios($contenido){
    $resultado = trim(preg_replace("/ +/", " ", $contenido)); //Elimina de delante y de atrás espacios de (sustituye cuando haya más de un espacio por solo un espacio)
    return $resultado;
}

function recoge($name){
    if(isset($_REQUEST[$name])){
        $tmp = strip_tags(quitarEspacios($_REQUEST[$name]));
        return $tmp;
    }else{
        return $tmp="";
    }
}

function recogeArray($name){
    if(isset($_REQUEST[$name])){
        $tmp = $_REQUEST[$name];
        return $tmp;
    }else{
        return $tmp = "";
    }
}

function quitarTildes($contenido){
    $tildes= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","à","è","ì","ò","ù","À","È","Ì","Ò","Ù");
    $sintildes= array ("a","e","i","o","u","A","E","I","O","U","a","e","i","o","u","A","E","I","O","U");
    return str_replace($tildes, $sintildes ,$contenido);
}

function cFile($nombre, $usuario, $rutaPerfil, &$ruta, &$errores) 
{
    if ($_FILES[$nombre]['error'] != 0) {
        switch ($_FILES[$nombre]['error']) {
            case 1:
                $errores[] = "UPLOAD_ERR_INI_SIZE";
                $errores[] = "Fichero demasiado grande";
                break;
            case 2:
                $errores[] = "UPLOAD_ERR_FORM_SIZE";
                $errores[] = 'El fichero es demasiado grande';
                break;
            case 3:
                $errores[] = "UPLOAD_ERR_PARTIAL";
                $errores[] = 'El fichero no se ha podido subir entero';
                break;
            case 4:
                $errores[] = "UPLOAD_ERR_NO_FILE";
                $errores[] = 'No se ha podido subir el fichero';
                break;
            case 6:
                $errores[] = "UPLOAD_ERR_NO_TMP_DIR";
                $errores[] = "Falta carpeta temporal";
                break;
            case 7:
                $errores[] = "UPLOAD_ERR_CANT_WRITE";
                $errores[] = "No se ha podido escribir en el disco";
                break;
                
            default:
                $errores[] = 'Error indeterminado.';
        }
        return false;
    } else {
        $nombreArchivo = $usuario;
        $directorioTemp = $_FILES[$nombre]['tmp_name'];
        $extension = $_FILES[$nombre]['type'];
        
        if (! in_array($extension, Config::$extensiones)) {
            $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
            return false;
        }
        
        if($_FILES[$nombre]["size"]>3302254){
            $errores[] = "Imagen demasiado grande";
            return false;
        }
        
        $partes_ruta = pathinfo($_FILES[$nombre]['name']);
        $extension=$partes_ruta['extension'];
        
        if (move_uploaded_file($directorioTemp, $rutaPerfil . $nombreArchivo.'.'.$extension)) {
            $ruta = $rutaPerfil . $nombreArchivo . '.'.$extension;
            return true;
        } else {
            $errores[] = "Error: No se puede mover el fichero a su destino";
            return false;
        }
        
    }
}

//INICIO



?>
