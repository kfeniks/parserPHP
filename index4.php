<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.06.2017
 * Time: 11:21
 */

        require_once 'vendor/autoload.php';
        header("Content-Type: text/html; charset=utf-8");

        $ch = curl_init('http://ya.ru/');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        // проверяем выдачу заголовка от сервера
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        //Отключаем проверку https

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $html = curl_exec($ch);
        curl_close($ch);
        xprint($html);