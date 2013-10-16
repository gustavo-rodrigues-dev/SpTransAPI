<?php

// GET index route
$app->get('/', function () use ($app) {
    $oStuff = new models\Stuff();
    $hello = $oStuff->setStuff();
    $app->render('index.html', array('hello' => $hello));
});
$app->get('/parada/:termo', function ($termo) use ($app) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/');
    curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/v0/Parada/Buscar?termosBusca='.$termo);
    $content = curl_exec ($ch);
    echo $content;
    curl_close ($ch);
});

$app->get('/linha/:termo', function ($termo) use ($app) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/');
    curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/v0/Linha/Buscar?termosBusca='.$termo);
    $content = curl_exec ($ch);
    echo $content;
    curl_close ($ch);
});

$app->get('/previsao/:termo', function ($termo) use ($app) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/');
    curl_setopt ($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $store = curl_exec ($ch);
    curl_setopt($ch, CURLOPT_URL, 'http://olhovivo.sptrans.com.br/v0/Previsao/Parada?codigoParada='.$termo);
    $content = curl_exec ($ch);
    echo $content;
    curl_close ($ch);
});
