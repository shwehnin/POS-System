<?php
include "template/base.php";

if(isset($_POST['add'])){

    $postId = explode(",",$_POST['idArr']);

    $str = "";

    $x = 0;
    foreach ($postId as $pid){
        $x++;
        $str .= "('{$_POST['itemName-'.$pid]}','{$_POST['quantity-'.$pid]}','{$_POST['unitPrice-'.$pid]}')".($x == count($postId)?"":",");

    }

    echo $str;

    $sql = "INSERT INTO items ( itemName, quantity, unitPrice) VALUES ".$str;
//    die($sql);
    if(mysqli_query(con(),$sql)){
        header("location:index.php");
    }else{
        echo "something error";
    }









}else{

    header("location:add-data.php");

}