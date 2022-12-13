<?php

session_start();

unset($_SESSION['user']);
unset($_SESSION['access']);

session_reset();
session_destroy();


header("location: auth.php");
