<?php session_start(); // Session active
session_destroy(); // Session fermée
header("location: login.php?message=Vous avez été déconnecté"); // Redirection vers login.php
