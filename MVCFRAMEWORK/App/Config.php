<?php
namespace App;

class Config{
    const DB_HOST = 'localhost';
    const DB_NAME = 'mvc';
    const DB_USER = 'bhakti';
    const DB_PASSWORD = '1234';
    const SHOW_ERRORS = false;
    public static function checkLogin(){
        if(isset($_SESSION['user'])){
            return true;
        }
        else{
            return false;
        }
    }
}
?>