<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 26.12.2017.
 * Time: 08:47
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
    <title>New Service</title>
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
        <h4><span class="fa fa-fw fa-plus"></span><span class="fa fa-fw fa-wrench"></span> Add New Service</h4>
        <table class="fluid">
            <tr>
                <td class="bld">Name of Service</td>
                <td><input type="text" class="usinpt2" placeholder="Name of Service"></td>

                <td class="bld">Default Price</td>
                <td><input type="text" class="usinpt2" placeholder="Default Price (in USD)"></td>
            </tr>
        </table>
    </div>
    <br>
    <div class="row">
        <div class="col-sm-12">
            <button id="addsrvcr" class="btn btn-primary pull-right"><span class="fa fa-fw fa-check"></span> Add Service</button>
        </div>
    </div>
    <br>
    <div class="row">
        <h4><span class="fa fa-fw fa-times"></span><span class="fa fa-fw fa-wrench"></span> View or Delete Services</h4>
        <table class="table table-hover table-sm fluid">
            <thead>
            <tr>
                <th>Name of Service</th>
                <th>Default Price</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $y=mysqli_query($c,"select * from services");
            while($bn=mysqli_fetch_array($y)){
                echo'<tr>
<td>'.$bn[1].'</td>
<td>'.number_format($bn[2],2).' USD</td>
<td class="zadel2 pointer text-danger" data-zadelid="'.$bn[0].'"><span class="fa fa-fw fa-times"></span></td>
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

