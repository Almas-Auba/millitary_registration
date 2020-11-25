<?php
require_once "connection.php";
if ( !empty($_POST['idcommis']))
{
    $sql1="UPDATE commissariat SET name1=:n ,address =:a, quantity = :q WHERE id =:id1";

    $dbcon = $pdo_conn->prepare($sql1);

    $dbcon->execute(array(':id1'=>$_POST['idcommis'],':n'=>$_POST['nameof'],
        ':a'=>$_POST['addressnameofcom'],':q'=>$_POST['quantityofcom'] ));

    if ($dbcon->rowCount()>=1)
        echo "one row was updated";
    else
        echo "nothing was returned";
}
header("Location: ../udo.php");

