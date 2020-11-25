<?php
require_once 'connection.php';

$sql = "insert into commissariat (id , name1, address, quantity) values (null,?,?,?)";

$name1 = $_POST['nameofcommis'];
$address=$_POST['addressname'];
$quantity=$_POST['quantity'];

$r = $pdo_conn->prepare($sql);

if ($r->execute(array( $name1,$address,$quantity )) == true)
{
    echo "data inserted";

}
else
    Echo "error";


header("Location: ../udo.php");
