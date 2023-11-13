<?php

if (isset($_COOKIE["login"]) && empty($_COOKIE['login'])) 
{ 
    unset($_COOKIE['login']); 
    setcookie('login', '', -1, '/');
    // return true;
    header("Location: ../login/");
    exit;
} 
else
{ 
    header("Location: ../login/");
} 

?>