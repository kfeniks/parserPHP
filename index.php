<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 20.06.2017
 * Time: 11:21
 */

        require_once 'vendor/autoload.php';
        header("Content-Type: text/html; charset=utf-8");

        $config = require_once( 'config.php' );

// ---------------------------------------------------------------------
// --[ Functions ]------------------------------------------------------
// ---------------------------------------------------------------------

function request( $url, $postdata = null, $cookiefile = 'tmp/cookie.txt' ){

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:47.0) Gecko/20100101 Firefox/47.0');

    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookiefile);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookiefile);

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);


    if( $postdata ){
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postdata );
    }

    $html = curl_exec($ch);
    curl_close( $ch );
    return $html;


}

// ---------------------------------------------------------------------
// --[ Main code ]------------------------------------------------------
// ---------------------------------------------------------------------

file_put_contents('tmp/cookie.txt','');

//$html = request('https://www.reddit.com/login');

$post = [
    'op' => 'login',
    'dest' => 'https://www.reddit.com/',

    'user' => $config_user,
    'passwd' => $config_passwd,
];

$html = request('https://www.reddit.com/post/login', $post);

echo $html;

