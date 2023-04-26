<?php session_start(); // Session active
session_destroy(); // Session fermée
header("location: login.php"); // Redirection vers login.php
