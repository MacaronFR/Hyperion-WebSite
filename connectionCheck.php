<?php
session_start();
$connected = isset($_SESSION['email']);
$level = isset($_SESSION['level']);