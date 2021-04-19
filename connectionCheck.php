<?php
session_start();
$connected = isset($_SESSION['email']);
$admin = isset($_SESSION['haunter']);
$vendor = isset($_SESSION['vendor']);