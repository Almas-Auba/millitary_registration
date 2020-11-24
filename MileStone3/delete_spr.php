<?php
require_once "connection.php";

if ( !empty($_POST['idd']) )
{
    $sql="DELETE FROM reference WHERE id = :n";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->execute(array(':n'=> $_POST['idd']));
    header("Location: ../admin_spr.php");
}



if ( !empty($_POST['idddd']) )
{
    $sql="DELETE FROM commissariat WHERE id = :n";
    $stmt = $pdo_conn->prepare($sql);
    $stmt->execute(array(':n'=> $_POST['idddd']));
    header("Location: ../udo.php");
}


?>

