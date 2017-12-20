<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 20.12.2017.
 * Time: 14:50
 */
include("php/first.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("php/head.php"); ?>
    <title>Login</title>
</head>

<body>
<div id='logeriner' style="position: absolute;
    top: 30%;
    left: 50%;
    min-width: 95%;
    transform: translate(-50%, -50%);">
    <input type='text' style='display: none'>
    <input type='password' style='display: none'>
    <div id="start">
        <p class="title text-center"><img src='/img/logo.png' id='logo1'></p>
        <div class="row center">
            <div class="hidden-xs col-sm-2 col-md-3 col-lg-4"></div>
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4">
                <div id="zaalerte">
                    <div class='alert alert-danger skrv' id='alrt'>
                        <span class='skrv' id='usnn'><strong>No Username!</strong> Please enter a Username.<br></span>
                        <span class='skrv' id='pww'><strong>No Password!</strong> Please enter a Password.</span>
                        <span class='skrv' id='wup1'><strong>Wrong Username!</strong> Username doesn't exist.</span>
                        <span class='skrv' id='wup2'><strong>Wrong Password!</strong> Please try again.</span>
                        <span class='skrv' id='wup3'><strong>Error!</strong> Error occured.</span>
                    </div>
                    <div class='alert alert-success skrv' id='scs'>
                        <strong>Successful login!</strong> Please wait, redirecting...<br>
                    </div>
                </div>
                <div class="form-group has-feedback" id='unc'>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <input type="text" name="username" class="form-control prijava" placeholder="Username"
                           id='username'>
                </div>
                <div class="form-group has-feedback" id='pwc'>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <input type="password" name="password" class="form-control prijava" placeholder="Password"
                           id='password'>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary center-block" value="Log in" id="logger">
                </div>
            </div>
            <div class="hidden-xs col-sm-2 col-md-3 col-lg-4"></div>
        </div>
    </div>
</div>
<?php include ("php/scripts.php");?>
<script type="text/javascript" src="/js/login.js"></script>
</body>
</html>