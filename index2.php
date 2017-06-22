<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.06.2017
 * Time: 11:21
 */

require_once 'vendor/autoload.php';
header("Content-Type: text/html; charset=utf-8");
$html = file_get_contents('http://pogoda.yandex.ru');

/** Тестируем вывод страницы
 * xprint($html, '$html');
 */

phpQuery::newDocument($html);

//Забираем заголовок
//$title = pq('title')->html();
//xd($title);

//Забираем температуру
//$temperature = pq('.current-weather__thermometer_type_now')->text();
//xprint($temperature);

//Забираем направление ветра
//$wind = pq('.current-weather__info-row > abbr.icon-abbr')->attr('title');
//xd($wind);

$forecast = pq('ul.forecast-brief')->children('li.forecast-brief__item:not(.forecast-brief__item_gap)');

foreach ($forecast as $li){
    $li = pq($li);
   // xprint($li->html());
    //Теперь убираем какой-то элемент, наприммер, icon, то есть иконки
    $li->find('.icon')->remove();
    //можно добавить новые данные в выдачу, но на практике это нафиг не упало никому
    //вот так через append. ага, привет jquery...
    //$li->append('olololo');
    xprint($li->html());
}

phpQuery::unloadDocuments();