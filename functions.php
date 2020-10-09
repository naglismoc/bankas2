<?php
function generateRndUsers($howMany){
  $_SESSION["bank"]=[];
  for ($i=0; $i < $howMany ; $i++) { 
        $birthDate = generateRndBirthDate();
        $natId=generateRndNatId($birthDate);

      if(isset($_SESSION["bank"][$natId])){
          $i--;
          continue;
      }
      $_SESSION["bank"][$natId]=
      new BankUser("Petras".$i,"Petraitis".$i,"Vilnius".$i,$natId);
  }
}
  function generateRndBirthDate(){
    $start = strtotime("01 January 1900");
    $timestamp = mt_rand($start,time());
    return date("Ymd", $timestamp);
  }
  function generateRndNatId($birthDate){
    if($birthDate[0]>1){
        return "".rand(5,6).substr($birthDate,-6).rand(1000,9999);
    }else{
        return "".rand(3,4).substr($birthDate,-6).rand(1000,9999);
    }
  }

  function consoleLog($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
function delete(){
    
        if($_SESSION['bank'][$_POST['delete']]->accontBalance==0){
            unset($_SESSION['bank'][$_POST['delete']]);
            echo  '<div id="msg" class="msgGood"><h2>Vartotojas istrintas</h2></div>';
        }else{
            echo  '<div id="msg" class="msgBad"><h2>Vartotojas turi '.$_SESSION['bank'][$_POST['delete']]->accontBalance.' pinigu, todel trinimas negalimas</h2></div>';
              
        }
    }

?>