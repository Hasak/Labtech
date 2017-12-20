<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 14.12.2017.
 * Time: 08:17
 */
session_start();
include("db.php");
date_default_timezone_set("Europe/Sarajevo");
mysqli_set_charset($c,"utf-8");

if(isset($_GET['lout']) and $_GET['lout']=='true')
    session_destroy();

if(!isset($_SESSION['uid']) and $_SERVER['PHP_SELF']!='/login.php')
    header("location:/login");
if(isset($_SESSION['uid']) and $_SERVER['PHP_SELF']=='/login.php')
    header("location:/");
