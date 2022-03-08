<?php

    $conn = mysqli_connect('localhost', 'Jake', 'Test1234', 'phpizza_shop');

    if(!$conn) {
        echo 'Connecion error: '.mysqli_connect();
    }

?>