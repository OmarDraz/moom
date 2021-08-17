<?php 

    session_start(); 

    session_unset(); //Unset The DAta

    session_destroy();

    header('Location: login.php');

    exit();