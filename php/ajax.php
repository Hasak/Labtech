<?php
/**
 * Created by PhpStorm.
 * User: Hasak
 * Date: 14.12.2017.
 * Time: 18:13
 */
session_start();
include("db.php");
date_default_timezone_set("Europe/Sarajevo");
mysqli_set_charset($c,"utf-8");
$a = $_REQUEST['a'];
if ($a == "saveprice") {
    $q = "INSERT INTO prices (service_contract_name, manufacture, model, price, currency) VALUES ('" . $_GET['scn'] . "','" . $_GET['man'] . "','" . $_GET['model'] . "','" . $_GET['price'] . "'," . $_GET['curr'] . ");";
    if (mysqli_query($c, $q))
        echo "Added Successfully";
    else echo mysqli_error($c);
} else if ($a == "savequote") {
    $q = "INSERT INTO quote (user, customer, quote_number, date_requested, valid_to, quote_type, price_id, quantity,
serial_number, contract_start, contract_end, part_number, part_description, discount) VALUES 
('" . $_REQUEST['loginperson'] . "','" . $_REQUEST['customer'] . "','" . $_REQUEST['quteno'] . "','" . $_REQUEST['datereq'] . "',
'" . $_REQUEST['validto'] . "','" . $_REQUEST['quotetype'] . "','" . $_REQUEST['priceid'] . "','" . $_REQUEST['quantity'] . "','" . $_REQUEST['serialnumber'] . "',
'" . $_REQUEST['contractstart'] . "','" . $_REQUEST['contractend'] . "','" . $_REQUEST['partnumber'] . "','" . $_REQUEST['partdescription'] . "','" . $_REQUEST['discount'] . "');";
    if (mysqli_query($c, $q))
        echo "Added Successfully";
    else echo mysqli_error($c);
} else if ($a == "seaarch") {
    $koji = $_GET['koji'];
    $sta = $_GET['sta'];

    if ($koji == 1)
        $string = "customers.company_name='" . $sta . "'";
    else if ($koji == 2)
        $string = "contact_persons.department='" . $sta . "'";
    else if ($koji == 3)
        $string = "contact_persons.name='" . $sta . "'";
    else if ($koji == 4)
        $string = "users.username='" . $sta . "'";
    else die("<h2>Error</h2>");

    $q = mysqli_query($c, "SELECT  company_name, department, contact_persons.name, contact_persons.email, adress, city, state, customers.ID FROM customers, adresses, contact_persons, users WHERE customers.ID = adresses.customer AND customers.ID = contact_persons.customer_id AND customers.user=users.ID AND " . $string);
    if (mysqli_num_rows($q))
        while ($b = mysqli_fetch_array($q))
            echo '<a href="/customer/' . strtolower($b['company_name']) . '/' . $b['ID'] . '" class="result">
                            <div class="row">
                                <div class="col">' . $b[0] . '</div>
                                <div class="col">' . $b[1] . '</div>
                                <div class="col">' . $b[2] . ' (' . $b[3] . ')</div>
                                <div class="col">' . $b[4] . ' ' . $b[5] . ' ' . $b[6] . '</div>
                            </div>
                        </a>';
    else echo "<h2>Nothing found</h2>";

}

if ($a=="logg" and isset($_POST['userrr'])) {
    $usr = $_POST['userrr'];
    $pw = md5($_POST['passs']);
    $q = mysqli_query($c, "SELECT * FROM users WHERE username='" . $usr . "'");
    if (!mysqli_num_rows($q))
        echo 0;
    else {
        $b = mysqli_fetch_array($q);
        if ($pw == $b['password']) {
            $_SESSION['user'] = $b['username'];
            $_SESSION['uid'] = $b['ID'];
            $_SESSION['lvl']= $b['level'];
            echo 1;
        } else echo 3;

    }
}

if($a=="inscontper"){
    $cid=$_REQUEST['cid'];
    for($i=0;$i<7;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    if(isset($_REQUEST['update']) and $_SESSION['lvl']>3){
        $quu="delete from contact_persons WHERE ID=".$_REQUEST['update'];
        if(!mysqli_query($c,$quu))
            echo mysqli_error($c);
    }
    //$var=(array)$_REQUEST['ddat'];
    $q="insert into contact_persons (customer_id, name, department, email, office_number, extention, lab_number, other_number) VALUES 
('$cid', '$var[0]', '$var[3]', '$var[4]', '$var[1]', '$var[5]', '$var[2]', '$var[6]')";
    //echo $q."\n";
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}

if($a=="adrrnjuu"){
    $cid=$_REQUEST['cid'];
    for($i=0;$i<5;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    if(isset($_REQUEST['update']) and $_SESSION['lvl']>3){
        $quu="delete from adresses WHERE ID=".$_REQUEST['update'];
        if(!mysqli_query($c,$quu))
            echo mysqli_error($c);
    }
    //$var=(array)$_REQUEST['ddat'];
    $q="insert into adresses (customer, adress, city, state, zip, country) VALUES 
('$cid', '$var[0]', '$var[1]', '$var[2]', '$var[3]', '$var[4]')";
    //echo $q."\n";
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}

if($a=="svenju"){
    $namee=$_REQUEST['nae'];
    for($i=0;$i<13;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    //$var=(array)$_REQUEST['ddat'];
    $q="insert into customers (company_name, note, user) VALUES ('$namee','$var[12]','".$_SESSION['uid']."')";
    if(mysqli_query($c,$q)){
        //echo "Successfully added";
        $cid = mysqli_insert_id($c);
        $q1="insert into contact_persons (customer_id, name, department, email, office_number, extention, lab_number, other_number) VALUES 
        ('$cid', '$var[0]', '$var[3]', '$var[4]', '$var[1]', '$var[5]', '$var[2]', '$var[6]')";
        if(mysqli_query($c,$q1)){
            //echo "Successfully added";
            $q2="insert into adresses (customer, adress, city, state, zip, country) VALUES 
            ('$cid', '$var[7]', '$var[8]', '$var[9]', '$var[10]', '$var[11]')";
            if(mysqli_query($c,$q2)){
                echo "Successfully added";
            }
            else echo mysqli_error($c);
        }
        else echo mysqli_error($c);
    }
    else echo mysqli_error($c);
}

if($a=="calll"){
    $cid=$_REQUEST['cid'];
    $sta=$_REQUEST['koojkal'];
    $hu=$_SESSION['uid'];
    $somevar=$_REQUEST['quuiid'];
    for($i=0;$i<3;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    if($_REQUEST['d1']==true)
        $varrr=1;
    else $varrr=0;
    $daten=date("Y-m-d",time());
    //$var=(array)$_REQUEST['ddat'];
    $q="insert into calls (user, customer, date_of_entry, reminder, date_of_reminder, requested, quote_requested, conservation) VALUES 
('$hu','$cid','$daten', '$varrr', '$var[2]', '$sta', '$somevar', '$var[0]')";
    //echo $_REQUEST['d1']." ".$var[1];
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}

if($a=="adduseer"){
    //$cid=$_REQUEST['cid'];
    for($i=0;$i<7;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    $pw=md5($var[6]);
    $q="insert into users (username, name, surname, email, phone, level, password) VALUES 
('$var[0]', '$var[1]', '$var[2]', '$var[3]', '$var[4]', '$var[5]', '$pw')";
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}

if($a=="delone" and $_SESSION['lvl']>3){
    $q="delete from users WHERE ID=".$_REQUEST['zadeel'];
    if(mysqli_query($c,$q)){
        echo "Successfully deleted";
    }
    else echo mysqli_error($c);
}

if($a=="addsrvc" and $_SESSION['lvl']>3){
    //$cid=$_REQUEST['cid'];
    for($i=0;$i<2;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    $q="insert into services (name, price) VALUES ('$var[0]', '$var[1]')";
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}

if($a=="delonesrvc" and $_SESSION['lvl']>3){
    $q="delete from services WHERE ID=".$_REQUEST['zadeel'];
    if(mysqli_query($c,$q)){
        echo "Successfully deleted";
    }
    else echo mysqli_error($c);
}

if($a=="deloncusti" and $_SESSION['lvl']>3){
    $q="delete from customers WHERE ID=".$_REQUEST['zadeel'];
    $q2="delete from contact_persons where customer_id=".$_REQUEST['zadeel'];
    $q3="delete from adresses where customer=".$_REQUEST['zadeel'];
    if(mysqli_query($c,$q) and mysqli_query($c,$q2) and mysqli_query($c,$q3)){
        echo "Successfully deleted";
    }
    else echo mysqli_error($c);
}

if($a=="sveinstr" and $_SESSION['lvl']>3){
    $i=0;
    $rt=mysqli_query($c,"select ID from customers ORDER BY ID DESC limit 1");
    $uid=mysqli_fetch_array($rt);
    $uid=$uid[0];
    while(isset($_REQUEST["dd".$i])){
        $v1=$_REQUEST["dd".$i];
        $v2=$_REQUEST["ddd".$i];
        $v3=$_REQUEST["dddd".$i];
        $q="insert into instruments (customer, manufacturer, model, serial) VALUES ('".$uid."','".$v1."','".$v2."','".$v3."');";
        if(mysqli_query($c,$q)){
            echo $i.". Successfully added ";
        }
        else echo mysqli_error($c);
        $i++;
    }

}

if($a=="instnju"){
    $cid=$_REQUEST['cid'];
    for($i=0;$i<3;$i++){
        $ss="d".$i;
        $var[$i]=$_REQUEST[$ss];
    }
    if(isset($_REQUEST['update']) and $_SESSION['lvl']>3){
        $quu="delete from instruments WHERE ID=".$_REQUEST['update'];
        if(!mysqli_query($c,$quu))
            echo mysqli_error($c);
    }
    //$var=(array)$_REQUEST['ddat'];
    $q="insert into instruments (customer, manufacturer, model, serial) VALUES 
('$cid', '$var[0]', '$var[1]', '$var[2]')";
    //echo $q."\n";
    if(mysqli_query($c,$q)){
        echo "Successfully added";
    }
    else echo mysqli_error($c);
}