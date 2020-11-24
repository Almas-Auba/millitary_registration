<?php
require_once 'connection.php';

$sql = "insert into db_students (id , name1, surname, lastname, birthday, education,nationality, special,  military_traning, sport_category , postpo  , address, marital_status, conviction,  	rank, email) values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$table2="insert into students(id,iin,db_id) value (null,?,?)";

$name1 = $_POST['name'];
$sname = $_POST["surname"];
$lastname = $_POST["lastname"];
$birthday = $_POST["birthday"];
$education = $_POST["education"];
$nationality = $_POST["nation"];
$special = $_POST["special"];
$military_traning = $_POST["military"];
$sport_category= $_POST["sports_category"];
$address = $_POST["place"];
$marital_status = $_POST["wife"];
$postpo = $_POST['postponement'];
$rank = $_POST["order"];
$email=$_POST['email'];
$conviction=$_POST['conviction'];

$inn=$_POST['inn'];


$r = $pdo_conn->prepare($sql);

if ($r->execute(array( $name1, $sname, $lastname,$birthday,$education,$nationality, $special, $military_traning,$sport_category, $postpo, $address,$marital_status, $conviction,$rank,$email )) == true)
{
    echo "data inserted";
    $r2 = $pdo_conn->prepare($table2);
    $g_row =  $pdo_conn->query("select * from db_students ") ;
    foreach($g_row as $row)
    {
        $tt=$row['id'];
    }
    if ($r2->execute(array($inn,$tt))){
        echo "super";
    }
}
else
    Echo "error";


header("Location: ../index.php")
?>