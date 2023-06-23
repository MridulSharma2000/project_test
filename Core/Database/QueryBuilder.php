<?php

class Query
{

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getdata($table, $rows = "*", $join = null, $where = null, $order = null, $limit = null, $groupby = null)
    {
        $sql = "SELECT $rows FROM `$table` ";
        if ($join != null) {
            $sql .= "INNER JOIN $join";
        }

        if ($where != null) {

            $sql .= " WHERE $where ";
        }
        if ($order != null) {
            $sql .= "ORDER BY $order";
        }
        if ($limit != null) {
            $sql .= "LIMIT 0,$limit";
        }
        if ($groupby != null) {
            $sql .= "GROUP BY $groupby";
        }

        $statement = $this->pdo->prepare($sql);
        $statement->execute();
       
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    
    }



    public function InsertAll($table, $parameters)
    {

        foreach ($parameters as $key => $value) {
            $k[] = $key;
            $val[] = "'" . $value . "'";
        }
        $key = implode(",", $k);
        $value = implode(",", $val);

        try {
            $sql = "INSERT INTO $table ($key) VALUES ($value)";
            $statement = $this->pdo->prepare($sql);
            return  $statement->execute();
        } catch (Exception $e) {
            die("Something Went Wrong While Inserting Data" . $e->getMessage());
        }
    }

    
}
