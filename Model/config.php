<?php


define('DB_HOST', 'localhost');
define('DB_NAME', 'todo');
define('DB_USER', 'root');
define('DB_PASS', '');



class config{
    public static $pdo;

    public static function connection(){
        if(!isset(self::$pdo)){
            try{
                self::$pdo = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
            } catch(PDOException $e){
                echo "Connection Failed";
            }
        }
        return self::$pdo;
    }

    public function prepared($sql){
        return self::connection()->prepare($sql);
    }

}
