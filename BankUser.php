<?php

class BankUser{

    public $name;
    public $surname;
    public $address;
    public $natId;
    public $accountNr;
    public $accontBalance;
    public $birhDate;
    public $bankCountry = "LT";
    public static $accUniqueNr = 730000000000;

    public function __construct($name,$surname,$address,$natId){
        $this->name=$name;
        $this->surname=$surname;
        $this->address=$address;
        $this->natId=$natId;
        $this->birhDate=$this->birhDate();
        $this->accountNr=$this->bankCountry. $this::$accUniqueNr;
        $this::$accUniqueNr++;
        $this->accontBalance=0;

    }
    public function birhDate(){
        $birhDate="20";
        if($this->natId[0]=="3" || $this->natId[0]=="4"){
        $birhDate="19";
        }
        return date ( 'Y-m-d' , strtotime (  $birhDate.substr($this->natId,1,6) ) );
       ;
    }




//     Sukurti Asmens kodą (patikrinti ar unikalus, jei ne - neįadinti), 
// .
// sugeneruotumėte random 100 vartotojų. (atkreipti dėmesį, kad
//  AK turi būti unikalūs, o vartotojų 100).
// surušiuoti pagal amžių.
// gražiai atspausdinti lentelėje.
// ekstra- padaryti pinigų įdėjimo/atėmimo mygtuką veikiantį. 
// negalima atimti pinigų i minusą, 
// trinti vartotoją, negalima trinti vartotojo jei pinigų likutis nėra 0 
}

?>