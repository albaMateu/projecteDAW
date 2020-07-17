<?php

/**
 * connectar amb la base de dades
 *
 * @author Alba
 */

class conectar {
    private static $driver;
    private static $host;
    private static $user;
    private static $pass;
    private static $database;
    private static $charset;
    
    
    public static function load() {
        $db_cfg = Config::dataDB();
        self::$driver=$db_cfg["driver"];
        self::$host=$db_cfg["host"];
        self::$user=$db_cfg["user"];
        self::$pass=$db_cfg["pass"];
        self::$database=$db_cfg["database"];
        self::$charset=$db_cfg["charset"];
    }
    //fa la conexió i la retorna
    public static function conexion(){
        self::load();
        if(self::$driver=="mysqli" || self::$driver==NULL){
            $con =new mysqli(self::$host, self::$user, self::$pass, self::$database);
            //$con->query("SET NAMES 'utf8'"); //en firfox si, en chrome no
            return $con;
        }
        throw new Exception("Error al crear la conexion");
    }
}
