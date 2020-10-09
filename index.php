<?php

require __DIR__."/BankUser.php";
include ("functions.php");
include ("moneyManipulation.php");
session_start();



// unset($_SESSION["bank"]);//useriu resetas, atkomentavus vienam reloadui
if(!isset($_SESSION["bank"])){
    generateRndUsers(50);
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
    #msg{
        width: 90%;
        margin-left:5%;
       
        margin-bottom:-40px;
        border-radius: 5px;
        text-align:center;
        margin-block-start: 0;
        margin-block-end: 0;
    }
    .msgGood{
        background-color:rgb(215, 250, 190);
    }
    .msgBad{
        background-color:rgb(245, 186, 186);
    }
</style>

<?php
if(isset($_POST["amount"])){
    moneyManipulation();
}

if(isset($_POST["delete"])){
    detelete();
}
if(isset($_POST["update"])){
    //update();
}
?>



<table>
  <tr>
    <th>Asmens kodas</th>
    <th>Vardas</th>
    <th>Pavardė</th>
    <th>Adresas</th>
    <th>Birth date</th>
    <th>accountNr</th>
    <th>accontBalance</th>
    <th>prideti</th>
    <th>atimti</th>
    <th>delete</th>
    <th>edit</th>
</tr>

<?php
echo ($_POST["amount"]);
// die;
if(!empty($_SESSION["bank"])){
  foreach ($_SESSION["bank"] as $natId => $bankUser) {?>
     
    <tr>    
        <td><?=$natId?></td>
        <td><?=$bankUser->name?></td>
        <td><?=$bankUser->surname?></td>
        <td><?=$bankUser->address?></td>
        <td><?=$bankUser->birhDate?></td>
        <td><?=$bankUser->accountNr?></td>
        <td><?=$bankUser->accontBalance?></td>
        <td><form action='' method='post'>
            <input type="hidden" name="add" value="<?=$natId?>">
            <input type="text"   name="amount" maxlength="10" size="7" value="<?=isset($_POST["add"])?(isset($_POST["amount"]) ?($natId==$_POST['add']? $_POST["amount"] :""):""):"" ?>">
            <input type="submit" value="add">
        </form></td>
        <td><form action='' method='post'>
            <input type="hidden" name="substract" value="<?=$natId?>">
            <input type="text"   name="amount" maxlength="10" size="7" value="<?=isset($_POST["substract"])?(isset($_POST["amount"]) ?($natId==$_POST['substract']? $_POST["amount"] :""):""):"" ?>">
            <input type="submit" value="substract">
        </form></td>
        <td><form action='' method='post'>
            <input type="hidden" name="delete" value="<?=$natId?>">
            <input type="submit" value="Delete">
        </form></td>
        <td><form action='edit.php' method='post'>
            <input type="hidden" name="update" value="<?=$natId?>">
            <input type="submit" value="update">
        </form></td>
    </tr>
  <?php
}}





?>




</table>
</body>
</html>