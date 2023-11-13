<?php 
    if (isset($_COOKIE["login"]) && empty($_COOKIE['login'])) 
    { 
        header("Location: ./lidlar/");
    } 
    else
    { 
        header("Location: ./login/");
    } 
?>