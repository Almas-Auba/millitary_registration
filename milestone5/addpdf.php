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



$spr=$_POST['refname'];
$topdf = $_POST['toaddpdf'];
$g_row =  $pdo_conn->query("SELECT * FROM students ") ;
foreach ($g_row as $row1){
    if($topdf == $row1['iin']){
        $id_db = $row1['db_id'];
        break;
    }
}
$table2="insert into issued_certificates(id, reference_id, stud_id, time_is) value (null,?,?,?)";
$r = $pdo_conn->prepare($table2);
$r->execute(array( $spr, $id_db,date("Y-n-j")));


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
if($spr == 5) {
    $html = "<style type='text/css'>
    body{
        align-items: center;
        width: 800px;
        font-family:DejaVu Sans,sans-serif;
    }    
</style>
<div class='main' style='width:  700px'>
<div class='first' style='float: right; margin-bottom: 20px'>
    <h6>Приложение 1</h6>
    <h4>к Правилам о порядке <br>
        ведения воинского<br>
        учета военнообязанных и призывников<br>
        в Республике Казахстан</h4>
        </div>   
        <div class='second' style='margin-top: 250px'>
            <h5 style='text-align: center'>Форма N 1</h5>
            <p style='ma'>Фамилия:________________<u>$surname</u>______________</p>
            <p>Имя:________________<u>$name</u>______________</p>
            <p>Отчество:________________<u>$lastname</u>______________</p>
            <p>Адрес:________________<u>$address</u>______________</p>
            
            <br>
            <h5 style='text-align: center'>I. Общие сведения</h5>
            <p>1. Место рождения:________________<u>$address</u>______________</p>
            <p>2. Образование:________________<u>$education</u>______________</p>
            <p>3. Гражданские специальности:________________<u>$special</u>______________</p>
            <p>4. Наличие первого спортивного разряда или спортивного звания:________________<u>$sport</u>______________
            </p>
            <p>5. Семейное положение ________________<u>$m_status</u>______________</p>
                    </div>
                    </div>
                
";

    $dompdf->loadHtml($html);
}
$g_row6 =  $pdo_conn->query("SELECT * FROM commissariat") ;
foreach ($g_row6 as $row6){
    if ($address=="Алматы" and $row6['id'] == 1){
        $commisname = $row6['name1'];
    }
    if ($address=="Шымкент" and $row6['id'] == 3){
        $commisname = $row6['name1'];
    }
    if ($address=="Нур-Султан" and $row6['id'] == 4){
        $commisname = $row6['name1'];
    }
    if ($address=="Актобе" and $row6['id'] == 5){
        $commisname = $row6['name1'];
    }if ($address=="Семей" and $row6['id'] == 6){
        $commisname = $row6['name1'];
    }
    if ($address=="Караганда" and $row6['id'] == 7){
        $commisname = $row6['name1'];
    }
}
if($spr == 6){
    $html = "<style type='text/css'>
    body{
        align-items: center;
        width: 800px;
        font-family:DejaVu Sans,sans-serif;
    }    
</style>
<div class='main' style='width:  700px'>
<div class='first' style='float: right; margin-bottom: 20px'>
    <h6>Приложение 2</h6>
    <br>
    <h4>к Правилам о порядке  <br>
        ведения воинского<br>
        учета военнообязанных и призывников<br>
        в Республике Казахстан</h4>
        
        </div>   
        <div class='second' style='margin-top: 250px'>
            <h5 style='text-align: center'>СВОДНЫЙ СПИСОК</h5>
           
           <table>
               <tr>
               <th>№<br>п/п</th>
               <th>Фамилия,имя и отчество</th>
               <th>Образование</th>           
               <th>Место жительства</th>
               <th>Отметка управления (отдела) по делам обороны <br>
                о дате приписки к призывному участку
                  <br>и под каким порядковым номером записан в протоколе призывник</th>                                
               </tr>
               <tr>
               <th>1</th>
               <th>2</th>
               <th>3</th>
               <th>4</th>
               <th>5</th>
                </tr>
                <tr>
                <td>1</td>
                <td>$surname, $name <br> $lastname</td>
                <td>$education</td>
                <td>$address</td>
                <td>$commisname</td>
                </tr>
           
</table>
            
            <br>
            <h5 style='text-align: center'>I. Общие сведения</h5>
            <p>1. Место рождения:________________<u>$address</u>______________</p>
            <p>2. Образование:________________<u>$education</u>______________</p>
            <p>3. Гражданские специальности:________________<u>$special</u>______________</p>
            <p>4. Наличие первого спортивного разряда или спортивного звания:________________<u>$sport</u>______________
            </p>
            <p>5. Семейное положение ________________<u>$m_status</u>______________</p>
                    </div>
                    </div>                
";

    $dompdf->loadHtml($html);
}
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("Reference.pdf");
?>
