<?php
function connect()
{
    $user = "root";
    $pass = "root";
    $db = "DichVuDB";	
    $mysqli = new mysqli("localhost", $user, $pass, $db );
    if ($mysqli->connect_errno )
    {
        die( "Couldn't connect to MySQL" );
    }
    return $mysqli;
}
