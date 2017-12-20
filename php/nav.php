<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 13.12.2017.
 * Time: 21:01
 */

if($_SESSION['lvl']>3)
    $hjm="/admin";
else $hjm="javascript:void(0);";
echo '<div class="container-fluid topBar">
    <div class="pull-left">
        <a href="/" class="logo"><img style="height: 40px; margin-top: -5px;" src="/img/logo.png" alt="Labtech Support Logo"></a>
        <a href="'.$hjm.'" class="logas">Logged in as: <span class="personName bld">'.$_SESSION['user'].'</span></a>
    </div>
    <div class="pull-right">
        <a href="/"><span class="fa fa-fw fa-user"></span> Customers</a>
        <a href="/pricecreation"><span class="fa fa-fw fa-book"></span> Books</a>
        <a href="javascript:void(0);"><span class="fa fa-fw fa-wrench"></span> Service</a>
        <a href="javascript:void(0);"><span class="fa fa-fw fa-dropbox"></span> Inventory</a>
        <a href="javascript:void(0);" id="logouter"><span class="fa fa-fw fa-sign-out"></span> Logout</a>
    </div>
</div>';