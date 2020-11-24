<?php
require_once 'connection.php';

$sql = "insert into reference (id , name1, description, issued) values (null,?,?,?)";

$name1 = $_POST['name1'];
$description=$_POST['description'];
$organ=$_POST['organ'];

$r = $pdo_conn->prepare($sql);

if ($r->execute(array( $name1,$description,$organ )) == true)
{
    echo "data inserted";

}
else
    Echo "error";


header("Location: ../admin_spr.php")
?>