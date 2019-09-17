<?php

use slavkluev\Bizon365\Client;

require_once __DIR__ . '/../vendor/autoload.php';

$client = new Client('BJZM_178BHkxZfdyX8Sr1b-zOyXIrS1fbfukmUSrJmWM_1X8B');
$arrayOfWebinars = $client->webinar->getList();

print_r($arrayOfWebinars);

foreach ($arrayOfWebinars->getWebinars() as $webinar) {
    $arrayOfViewers = $client->webinar->getViewers($webinar->getWebinarId());

    foreach ($arrayOfViewers->getViewers() as $viewer) {
        print_r($viewer);
    }
}
