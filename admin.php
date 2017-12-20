<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 24.12.2017.
 * Time: 08:39
 */

?>

<?php include("php/first.php");
if($_SESSION['lvl']<4)
header("location:/");
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("php/head.php"); ?>
    <title>Search for Customer</title>
</head>

<body>
<?php include("php/nav.php"); ?>
<div class="container moreOptions">
    <div class="row">
        <div class="col">
            <h2><span class="fa fa-fw fa-cogs"></span> Administrator page</h2>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>
</div>
<div class="container">
    <div class="row">
        <h4><span class="fa fa-fw fa-user-plus"></span> Add New User</h4>
        <table class="fluid">
            <tr>
                <td class="bld">Username</td>
                <td><input type="text" class="usinpt" placeholder="Username"></td>
            </tr>
            <tr>
                <td class="bld">Name</td>
                <td><input type="text" class="usinpt" placeholder="Name"></td>
            </tr>
            <tr>
                <td class="bld">Surname</td>
                <td><input type="text" class="usinpt" placeholder="Surname"></td>
            </tr>
            <tr>
                <td class="bld">Email</td>
                <td><input type="email" class="usinpt" placeholder="Email"></td>
            </tr>
            <tr>
                <td class="bld">Phone</td>
                <td><input type="text" class="usinpt" placeholder="Phone"></td>
            </tr>
            <tr>
                <td class="bld">Level</td>
                <td><input type="text" class="usinpt" placeholder="From 1 (lowest) to 5 (highest)"></td>
            </tr>
            <tr>
                <td class="bld">Password</td>
                <td><input type="password" class="usinpt" placeholder="Password"></td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <button id="adduserr" class="btn btn-primary pull-right"><span class="fa fa-fw fa-check"></span> Add User</button>
        </div>
    </div>
    <br>
    <div class="row">
        <h4><span class="fa fa-fw fa-user-times"></span> View or Delete Users</h4>
        <table class="table table-hover fluid">
            <thead>
            <tr>
                <th>Username</th>
                <th>Name & Surname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Level</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $y=mysqli_query($c,"select * from users");
            while($bn=mysqli_fetch_array($y)){
                echo'<tr>
<td>'.$bn[1].'</td>
<td>'.$bn[2].' '.$bn[3].'</td>
<td>'.$bn[4].'</td>
<td>'.$bn[5].'</td>
<td>'.$bn[6].'</td>
<td style="color:#f00;" class="zadel pointer" data-zadelid="'.$bn[0].'"><span class="fa fa-fw fa-times"></span></td>
</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<?php include("php/footer.php"); ?>
</body>

</html>

