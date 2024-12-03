<?php
include_once 'db_class.php';
session_start();

session_unset ();

session_destroy ();

header("Location: ../login/login.php");

exit();