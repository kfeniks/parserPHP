<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.06.2017
 * Time: 11:21
 */

require_once 'vendor/autoload.php';
header("Content-Type: text/html; charset=utf-8");
$html = file_get_contents('https://www.re-store.ru/catalog/MJLQ2RU-A/');

/** Тестируем вывод страницы
 * xprint($html, '$html');
 */

phpQuery::newDocument($html);

//если селектор <meta> itemprop='price', то meta[itemprop=price] в pq
$name = pq('span[itemprop=item] > span[itemprop=name]')->text();
$price = pq('.product__price > span.product__price__num')->text();
xd($name.' '.$price);

phpQuery::unloadDocuments();