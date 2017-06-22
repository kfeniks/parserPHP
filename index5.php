<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.06.2017
 * Time: 11:21
 */

        require_once 'vendor/autoload.php';
        header("Content-Type: text/html; charset=utf-8");
        //Нужен полный путь иначе не запишет файл
        $cookiefile = __DIR__.'/cookie.txt';

        $ch = curl_init('http://parser/cookie_test.php');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);

        //Дальше вариант не самый удачный, в нем нельзя
        //сымитировать пользователя
        //curl_setopt($ch, CURLOPT_COOKIE, 'curl_session_cookie=1');

        curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
        curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);
        //Передаем тольно нормальные куки
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);

        $html = curl_exec($ch);

        curl_close($ch);

        xprint($html);

