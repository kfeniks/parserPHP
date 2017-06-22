<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22.06.2017
 * Time: 19:45
 */

        require_once 'vendor/autoload.php';

        setcookie('curl_session_cookie', 1);
        setcookie('curl_normal_cookie', 1, microtime(true)+1000);
        $cook = false;

        if( isset($_COOKIE['curl_session_cookie']) ){
            $cook = true;
            echo 'Сессия кука есть\r\n';
        }
        if( isset($_COOKIE['curl_normal_cookie']) ){
            $cook = true;
            echo 'Нормальная кука есть\r\n';
        };

        if($cook) echo 'Я тебя знаю!';
        else echo 'Вы здесь новенький?';