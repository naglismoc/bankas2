<?php

require __DIR__."/BankUser.php";
session_start();

unset($_SESSION["bank"]);

if(!isset($_SESSION["bank"])){
$_SESSION["bank"]=[];

for ($i=0; $i <100 ; $i++) { 
    consoleLog($i);
    $natId="".rand(3,6);
    $year= rand(0,99);
    if($year<10){
        $natId.="0".$year; 
    }else{
        $natId.=$year; 
    }
    $month=rand(1,12);
    if($month<10){
        $natId.="0".$month; 
    }else{
        $natId.=$month; 
    }
    $day=rand(1,31);
    if($day<10){
        $natId.="0".$day; 
    }else{
        $natId.=$day; 
    }
    
    $natId.=rand(1000,9999);
    // $natId="".rand(30001010001,69912319999);
    $_SESSION["bank"][$natId]=
     new BankUser("Petras".$i,"Petraitis".$i,"Vilnius".$i,$natId);
}}
function consoleLog($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }

    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }

    tr:nth-child(even) {
    background-color: #dddddd;
    }
</style>
<table>
  <tr>
    <th>Asmens kodas</th>
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Adresas</th>
    <th>age</th>
    <th>accountNr</th>
    <th>accontBalance</th>
    <th>prideti</th>
    <th>atimti</th>
    <th>delete</th>
    <th>edit</th>
</tr>

<?php
echo count($_SESSION["bank"]);
// die;
if(!empty($_SESSION["bank"])){
  foreach ($_SESSION["bank"] as $natId => $bankUser) {?>
     
    <tr>    
        <td><?=$natId?></td>
        <td><?=$bankUser->name?></td>
        <td><?=$bankUser->surname?></td>
        <td><?=$bankUser->address?></td>
        <td><?=$bankUser->age?></td>
        <td><?=$bankUser->accountNr?></td>
        <td><?=$bankUser->accontBalance?></td>
        <td><form action=''>
            <input type="hidden" name="add" value="<?=$natId?>">
            <input type="submit" value="add">
        </form></td>
        <td><form action=''>
            <input type="hidden" name="substract" value="<?=$natId?>">
            <input type="submit" value="substract">
        </form></td>
        <td><form action=''>
            <input type="hidden" name="delete" value="<?=$key?>">
            <input type="submit" value="Delete">
        </form></td>
        <td><form action='edit.php'>
            <input type="hidden" name="update" value="<?=$key?>">
            <input type="submit" value="update">
        </form></td>
    </tr>
  <?php
}}?>


</table>
</body>
</html>