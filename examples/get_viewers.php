<?php

use slavkluev\Bizon365\Client;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Client('BJZM_178BHkxZfdyX8Sr1b-zOyXIrS1fbfukmUSrJmWM_1X8B');
$webinars = $client->webinar->getList('29648:k0bg6wab13*2019-09-09T00:02:34');

foreach ($webinars as $webinar) {
    $viewers = $client->webinar->getViewers($webinar->getWebinarId());

    foreach ($viewers as $viewer) {
        print_r($viewer->toArray());
    }
}
