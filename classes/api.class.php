<?php

/**
 * $db->cities()
 * $db->towns(34)
 * $db->neigborhoods(2005)
 * $db->roadstreets(40184)
 */

require_once 'db.class.php';

class Api
{
    public $db;

    public function __construct()
    {
        $this->db = new DB(host, dbname, user, pass);
    }

    /**
     * GETS
     */
    public function cities()
    {
        return $this->db->select("city");
    }

    public function towns($cityID)
    {
        return $this->db->select("town", "FK_CityKey", $cityID);
    }

    public function neigborhoods($townID)
    {
        return $this->db->select("neigborhood", "FK_TownKey", $townID);
    }

    public function roads($neigborhoodID)
    {
        return $this->db->selectAsArray("road", "FK_NeigborhoodKey", $neigborhoodID);
    }

    public function streets($neigborhoodID)
    {
        return $this->db->selectAsArray("street", "FK_NeigborhoodKey", $neigborhoodID);
    }

    /**
     * POSTS
     */
    public function addCity($title)
    {
        return $this->db->create('city', ['CityTitle' => $title, 'CityKey' => $this->db->getNextKey('city', 'CityKey')]);
    }

    public function addTown($title, $cityKey)
    {
        $key = $this->db->getNextKey('town', 'TownKey');
        return $this->db->create('town', ['TownTitle' => $title, 'TownKey' => $key, 'FK_CityKey' => $cityKey]);
    }

    public function addNeigborhood($title, $townKey)
    {
        $key = $this->db->getNextKey('neigborhood', 'NeigborhoodKey');
        return $this->db->create('neigborhood', ['NeigborhoodTitle' => $title, 'NeigborhoodKey' => $key, 'FK_TownKey' => $townKey]);
    }

    public function addRoad($title, $neigborhoodKey)
    {
        return $this->db->create('road', ['RoadTitle' => $title, 'FK_NeigborhoodKey' => $neigborhoodKey]);
    }

    public function addStreet($title, $neigborhoodKey)
    {
        return $this->db->create('street', ['StreetTitle' => $title, 'FK_NeigborhoodKey' => $neigborhoodKey]);
    }


    /**
     * 
     * get key
     */

    public function getCityKey($id)
    {
        $city = $this->db->selectSingleByID("city", "CityID", $id);
        return $city['CityKey'];
    }
    public function getTownKey($id)
    {
        $town = $this->db->selectSingleByID("town", "TownID", $id);
        return $town['TownKey'];
    }
    public function getNeigborhoodKey($id)
    {
        $neigborhood = $this->db->selectSingleByID("neigborhood", "NeigborhoodID", $id);
        return $neigborhood['NeigborhoodKey'];
    }
}
