<?php

function con(){
    return mysqli_connect("localhost","root","","invoice");
}

define("URL","http://".$_SERVER["SERVER_NAME"]."/pos/");
define("ASSET",URL."assets");

