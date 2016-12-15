<?php

class DataBase extends PDO
{
    private static $instance = null;
    private static $db = [
        'dbhost'=>'localhost',
        'dbname'=>'sistema',
        'dbuser'=> 'root',
        'dbpass' => '123',
    ];
    public function __construct()
    {
        parent::__construct(
            'mysql:host=' .self::$db['dbhost'] . ';dbname=' . self::$db['dbname'],
            self::$db['dbuser'],
            self::$db['dbpass']
        );
    }
    public static function singleton()
    {
        if(is_null(self::$instance))
            self::$instance = new DataBase();
        return self::$instance;
    }
}

