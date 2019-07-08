<?php

class DB extends PDO
{

    public function __construct($host, $dbname, $username, $pass)
    {
        try {
            parent::__construct("mysql:host=$host;dbname=$dbname;", $username, $pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->query("SET CHARACTER SET UTF8");
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function select($tablename, $fkcolumn = null, $id = null)
    {
        if ($id == null || $fkcolumn == null)
            $stmt = "SELECT * FROM $tablename";
        else {
            $stmt = "SELECT * FROM $tablename WHERE $fkcolumn = $id";
        }

        $query = $this->query($stmt);
        $items = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0)
            return json_encode($items, JSON_UNESCAPED_UNICODE);
        return false;
    }

    public function selectAsArray($tablename, $fkcolumn = null, $id = null)
    {
        if ($id == null || $fkcolumn == null)
            $stmt = "SELECT * FROM $tablename";
        else {
            $stmt = "SELECT * FROM $tablename WHERE $fkcolumn = $id";
        }

        $query = $this->query($stmt);
        $items = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($query->rowCount() > 0)
            return $items;
        return false;
    }

    public function create($tablename, $values, $key = null)
    {
        $columns = "";
        $prep = "";

        foreach ($values as $key => $value) {
            $columns .= $key . ",";
            $prep .= ',:' . $key;
        }
        $columns = substr($columns, 0, strlen($columns) - 1);
        $prep = substr($prep, 1, strlen($prep));

        $stmt = 'INSERT INTO ' . $tablename . ' (' . $columns . ') VALUES (' . $prep . ')';


        try {
            $query = $this->prepare($stmt);
            $query->execute($values);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if ($query->rowCount())
            return $this->lastInsertId();

        return false;
    }

    public function getNextKey($tablename, $keycolumn): int
    {
        $query = $this->query("SELECT * FROM " . $tablename . " order by " . $keycolumn . " desc");
        $key = (int) $query->fetch()[$keycolumn];
        return $key + 1;
    }

    public function selectSingleByID($tableName, $columnName, $id)
    {
        $stmt = "SELECT * FROM " . $tableName . " WHERE "  . $columnName . " = " . $id;
        $query = $this->query($stmt);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
