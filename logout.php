<?php
session_start();
include "conn.php";
session_unset();
session_destroy();
Header("Location: $secure://$hostname");
?>