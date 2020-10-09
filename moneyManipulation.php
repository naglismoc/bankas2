<?php


function moneyManipulation(){
    $input = $_POST["amount"];
    $input = str_replace(",",".",$input);
    if(is_numeric($input)){
        if($input<=0){//jei suma neigiama
            echo  '<div id="msg" class="msgBad"><h2>'.$input.' yra minusinis skaicius, galite prideti tik teigiamus</h2></div>'; 
        }else{
        if(round($input,2)!=$input){
            echo  '<div id="msg" class="msgBad"><h2>'.$input.' neteisingas skaiciaus formatas</h2></div>';
        }else{
           
                //reik cia patikrinti ar skaicius ne per didelis
            if (isset($_POST["add"])) {
                $_SESSION["bank"][$_POST["add"]]->accontBalance+=$_POST["amount"];
                echo  '<div id="msg" class="msgGood"><h2>'.$input.'</h2></div>';
            }elseif (isset($_POST["substract"])) {
                if($_SESSION["bank"][$_POST["substract"]]->accontBalance>=$_POST["amount"]){
                $_SESSION["bank"][$_POST["substract"]]->accontBalance-=$_POST["amount"];
                echo  '<div id="msg" class="msgGood"><h2>'.$input.'</h2></div>';
                }else{
                    echo  '<div id="msg" class="msgBad"><h2>turite per mazai pinigu, '.$input.'</h2></div>';
                }
            }
        }
    }
    }elseif (strpos($input," ")) {
        echo  '<div id="msg" class="msgBad"><h2>skaicius '.$input.' turetu savyje netureti tarpu</h2></div>'; 
    }else{

        echo  '<div id="msg" class="msgBad"><h2>'.$input.' nera skaicius</h2></div>'; 
    }
}



?>