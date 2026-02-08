<?php

// DATABASE NAME, PASSWORD, USERNAME
$conn = new mysqli("localhost", "ademola_user", "omomejih08", "ademola_db");

if(mysqli_connect_errno()){
    printf("connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>