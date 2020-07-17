<?php
//configuració de la base de dades 
class Config {

    public static function dataDB() {
        return array(
            "driver" => "mysqli",
            "host" => "db621058511.db.1and1.com",
//    "host"      =>"localhost",
            "user" => "dbo621058511",
            "pass" => "1234ZxcV",
            "database" => "db621058511",
            "charset" => "utf8"
        );
    }

}
?>

