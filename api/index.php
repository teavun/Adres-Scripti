<?php

/**
 * $db->cities()
 * $db->towns(34)
 * $db->neigborhoods(2005)
 * $db->roadstreets(40184)
 */


require_once '../inc/config.php';
require_once '../classes/request.class.php';
require_once 'api.class.php';

$api = new Api();

$type = Request::type();
$id = Request::id();


if (Request::getHttpMethod() == 'GET') {

    if (!$id && $type != 'cities') {
        die();
    }

    switch ($type) {
        case 'cities':
            echo $api->cities();
            break;
        case 'city':
            echo  $api->towns($id);
            break;
        case 'town':
            echo  $api->neigborhoods($id);
            break;
        case 'neigborhood':
            $obj->roads = $api->roads($id);
            $obj->streets = $api->streets($id);
            echo json_encode($obj, JSON_UNESCAPED_UNICODE);
            break;
        default:
            die();
            break;
    }
}

if (Request::getHttpMethod() == 'POST') {
    switch ($type) {
        case 'city':
            $cityID  = $api->addCity(Request::posts()['CityTitle']);
            echo $api->getCityKey($cityID);
            break;
        case 'town':
            $townID = $api->addTown(Request::posts()['TownTitle'], Request::posts()['CityKey']);
            echo $api->getTownKey($townID);
            break;
        case 'neigborhood':
            $neigborhoodID = $api->addNeigborhood(Request::posts()['NeigborhoodTitle'], Request::posts()['TownKey']);
            echo $api->getNeigborhoodKey($neigborhoodID);
            break;
        case 'road':
            echo $api->addRoad(Request::posts()['RoadTitle'], Request::posts()['NeigborhoodKey']);
            break;
        case 'street':
            echo $api->addStreet(Request::posts()['StreetTitle'], Request::posts()['NeigborhoodKey']);
            break;
        default:
            die();
            break;
    }
}
