<?php
require_once "db/connection.php";

require_once 'dompdf/lib/html5lib/Parser.php';
require_once 'dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();
// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

$topdf = $_POST['toaddpdf'];
$g_row =  $pdo_conn->query("SELECT * FROM students ") ;
foreach ($g_row as $row1){
    if($topdf == $row1['iin']){
        $id_db = $row1['db_id'];
        break;
    }
}

$g_row2 =  $pdo_conn->query("SELECT * FROM db_students") ;
foreach ($g_row2 as $row2) {
    if ($id_db == $row2['id'] ) {
        $name = $row2['name1'];
        $surname = $row2['surname'];
        $lastname = $row2['lastname'];
        $lastname = $row2['lastname'];
        $lastname = $row2['lastname'];
        $birthdate = $row2['birthday'];
        $address = $row2['address'];
        $education = $row2['education'];
        $special =  $row2['special'];
        $sport = $row2['sport_category'];
        $m_status = $row2['marital_status'];

    }
}

$html="<style>
    body{
        align-items: center;
        width: 800px;
    }
    h2{
        font-family:DejaVu Sans,sans-serif;
        font-size: 14px;
        align-items: end ;

    }

    p{
        font-family:Times New Roman,sans-serif ;
        font-size: 14px;
    }
</style>
<p>name:         $surname </p>
<p>Имя:             $name</p>";
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("text.pdf");
?>
