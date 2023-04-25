<?php

namespace Model;

class ActiveRecord
{
    //Base de datos
    protected static $db;
    protected static $columnaDB = [];
    protected static $tabla = '';

    //errores
    protected static $errores = [];

    

    
    public static function setDB($databade)
    {
        self::$db = $databade;
    }
    public function guardar()
    {
        if (!empty($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
    }

    public function crear()
    {
        $atributos = $this->sanitizarAtributos();
        //Sanitizar los datos
        $query = "INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES(' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        //debug($query);

        $resultado = self::$db->query($query);

        if ($resultado) {
            header("Location: /admin?mensaje=1");
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();

        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = " UPDATE " . static::$tabla . " SET ";
        $query .= join(',', $valores);
        $query .= " WHERE id='" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        $resultado;

        if ($resultado) {
            header("Location: /admin?mensaje=2");
        }
    }

    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id= " . self::$db->escape_string($this->id) . " LIMIT 1 ";
        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->eliminarImagen();
            header("Location: /admin?mensaje=3");
        }
    }

    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnaDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $atributos;
    }
    public function setImage($imagen)
    {
        //Eliminar imagen previa
        if (!empty($this->id)) {
            $this->eliminarImagen();
        }

        //asignar el atributo de imagen el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function eliminarImagen()
    {
        //comprobar si existe el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);

        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    //validación
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar()
    {
        static::$errores=[];
        return static::$errores;
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultaSQL($query);
        return $resultado;
    }
    //obtiene un numero determinado de registros
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla. ' LIMIT '.$cantidad;
        $resultado = self::consultaSQL($query);
        return $resultado;
    }

    //busca una propiedad por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id=$id";
        $resultado = self::consultaSQL($query);
        return array_shift($resultado);
    }
    public static function consultaSQL($query)
    {
        //consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        //liberar la memoria
        $resultado->free();
        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($resgistro)
    {
        $objeto = new static;

        foreach ($resgistro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar($args)
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
