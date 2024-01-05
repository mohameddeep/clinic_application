<?php
function connect($pdo, $username, $password)
{
    try {
        $con = new PDO($pdo, $username, $password);
        return $con;
    } catch (Throwable $e) {
        die("Error " . $e->getMessage());
    }
}
$con = connect("mysql:host=localhost;dbname=clinic", 'root', '');

function getDataFromTable($table, $con, $col = ["*"], $filter = null)
{
    $cols = implode(",", $col);
    $query = "SELECT $cols FROM $table";
    if ($filter) {
        $query .= " WHERE ";
        foreach ($filter as $key => $value) {
            $query .= "`$key` = '$value' and ";
        }
        $query = substr($query, 0, strlen($query) - 5);
    }
    $data = $con->prepare($query);
    $data->execute();
   
        return $data->fetchALL(PDO::FETCH_ASSOC);
    
}

function getonerow($table, $con, $col = ["*"], $filter = null){
    $cols = implode(",", $col);
    $query = "SELECT $cols FROM $table";
    if ($filter) {
        $query .= " WHERE ";
        foreach ($filter as $key => $value) {
            $query .= "`$key` = '$value' and ";
        }
        $query = substr($query, 0, strlen($query) - 5);
    }
    $data = $con->prepare($query);
    $data->execute();
    if($data->rowCount() >0){


        return $data->fetch(PDO::FETCH_ASSOC);
    }
    
       

    
    
}



function InsertData($table, array $col, array $data, $con, $filter = null)
{
    $cols = array_map(function ($e) {
        return "`" . $e . "`";
    }, $col);
    $columns = implode(",", $cols);
    $info = array_map(function ($e) {
        return "'" . $e . "'";
    }, $data);
    $data = implode(",", $info);
    $query = "INSERT INTO $table ($columns) VALUES ($data)";
    if ($filter) {
        $query .= " WHERE ";
        foreach ($filter as $key => $value) {
            $query .= $key . " = " . $value . " and ";
        }
        $query = substr($query, 0, strlen($query) - 5);
    }
    $sql = $con->prepare($query);
    return $sql->execute();
    
}




function updateData($table, array $data, $con, $filter = null)
{
    $setData = [];
    foreach ($data as $key => $value) {
        $setData[] = "`$key` = '$value'";
    }
    $setData = implode(", ", $setData);
    $query = "UPDATE $table SET $setData";
    if ($filter) {
        $query .= " WHERE ";
        foreach ($filter as $key => $value) {
            $query .= "`$key` = '$value' AND ";
        }
        $query = substr($query, 0, -5);
    }
    $sql = $con->prepare($query);
    return $sql->execute();
}



function deleteData($table, $con, $filter)
{
    $query = "DELETE FROM $table WHERE ";
    foreach ($filter as $key => $value) {
        $query .= "`$key` = '$value' AND ";
    }
    $query = substr($query, 0, -5);
    $sql = $con->prepare($query);
    return $sql->execute();
}
