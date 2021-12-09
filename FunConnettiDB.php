<?php
    function connettiDB($servername, $username, $password, $nameDB){

        $conn = new mysqli($servername, $username, $password, $nameDB); 
        return $conn;  
    }
?>