<?php

function getData($condition){
    $sql = "SELECT * FROM items WHERE $condition ORDER BY id DESC";
    $query = mysqli_query(con(),$sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)){
        array_push($data,$row);
    }
    return $data;
}