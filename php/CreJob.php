<?php

    class CreJobs
    {
        private  $Title;
        private  $Descrip;
        private  $Profess;
        private  $Userr; 
        private  $Presupu;
        public   $SesionName;

        public function __construct() 
        {
           
            require_once 'sesion.php';
            $this->Userr = new Session();
            $this->Title = $_POST['Title'];
            $this->Descrip = $_POST['Descrip'];
            $this->Profess = $_POST['Profess']; 
            $this->Presupu = $_POST['Presupu']; 

            $this->SesionName = $this->Userr->NamseSe;
            //echo "title: " . $this->Title . "  " ."Des " .$this->Descrip ."pro " .$this->Profess ."pre: " .$this->Presupu;
            //echo $this->Userr->NamseSe;
            //echo $this->SesionName;
            $this->Data = array(
                'Tle' => "$this->Title",
                'Des' => "$this->Descrip",
                'Pro'=> "$this->Profess",
                'Pre' => "$this->Presupu",
                'Sesion' => "$this->SesionName"
            );
            self::How_Action($this->Data);
        }

        public function How_Action($Kwargs)
        {
            extract($Kwargs);
            //echo "Tle:" .$Tle ." Des: " .$Des ."  Pro: ".$Pro;
            require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Per = "call GetId_Person('".$this->Userr->NamseSe."')";
            $Resultt =mysqli_query($coonect->Cons,$Sel_Per);
            $numResults =  mysqli_num_rows($Resultt);
            if($Tle=="" or $Des=="" or $Pre=="")
            {
                echo 1;
            }  
            else if ($numResults > 0) 
            {
                //echo "Encontro Data";
                while($Fila=$Resultt->fetch_row())
                {
                    //echo  "Fila" .$Fila[0];
                    self::Add_Job($Tle,$Des,$Pro,$Fila[0],$Pre);
                }
            }else if($numResults == 0)
            {
                mysqli_free_result($Resultt);
                mysqli_close($coonect->Cons);
                self::Sel_JobCo($Tle,$Des,$Pro,$Pre,$Sesion);
            }
    
        }

        static function Add_Job($T,$D,$P,$IdP,$Pr)
        {
            require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            try
            {
                $Ins_Job = "call Add_Job ('$T', '$D',$P,$IdP,'$Pr')";
                $ReIns_Us=mysqli_query($coonect->Cons,$Ins_Job);
                if($ReIns_Us)
                {
                    echo 5;
                    //mysqli_free_result($ReIns_Us);
                    mysqli_close($coonect->Cons);
                }else
                {
                    echo ("descripcion error:").mysqli_error($coonect->Cons);
                }
            }
            catch(Exception $e)
            {
                echo "El error es:".$e->getMessage();
            }

        }

        static function Sel_JobCo ($Tl,$De,$Pr,$pres,$Se)
        {
            
            require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Com = "call GetIdCompany('".$Se."')";
            $ResultCo =mysqli_query($coonect->Cons,$Sel_Com);
            $numReCo =  mysqli_num_rows($ResultCo);
            if ($numReCo  > 0) 
            {
                //echo "encontro el nombre de la empresa!";
                while($Fila=$ResultCo->fetch_row())
                {
                    //echo  "Fila" .$Fila[0];
                    self::Add_JobCom($Tl,$De,$Pr,$Fila[0],$pres);
                }
            }if ($numReCo == 0)
            {
                mysqli_free_result($ResultCo);
                mysqli_close($coonect->Cons);
            }

        }
        static function Add_JobCom($Til, $Dee,$Proo, $IdCoo, $Prr)
        {
            //echo $Til. " " . $Dee . " " .$Proo . " " .$IdCoo ." " . $Prr;
            require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            try
            {
                $Ins_JobCo = "call Add_JobCom  ('$Til', '$Dee',$Proo,$IdCoo,'$Prr')";
                $ReIns_Co=mysqli_query($coonect->Cons,$Ins_JobCo);
                if($ReIns_Co)
                {
                    echo 5;
                    //mysqli_free_result($ReIns_Us);
                    mysqli_close($coonect->Cons);
                }else
                {
                    echo ("descripcion error:").mysqli_error($coonect->Cons);
                }
            }
            catch(Exception $e)
            {
                echo "El error es:".$e->getMessage();
            }
            
        }

           

          
    }
        $Job = new CreJobs();

?>
