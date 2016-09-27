<?php
    $dbCon = mysqli_connect("localhost:3306", "root", "", "controlroom");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_error();
    }
?>