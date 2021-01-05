<?php
	class apliJob
	{
		private $Idd;
		private $pryce;
		private $msg;
		private  $Userr; 
        public   $SesionName;
		public function __construct()
		{
			require_once 'sesion.php';
            $this->Userr = new Session();
			$this->Idd=$_POST['Idd'];
			$this->pryce=$_POST['pryce'];
			$this->msg=$_POST['msg'];	
			$this->SesionName = $this->Userr->NamseSe;
			//echo $this->Idd . " " . $this->pryce ."   " .$this->msg .$this->SesionName ;
			$this->Data = array
			(
                'IdJob' => "$this->Idd",
                'Pryce' => "$this->pryce",
                'MSG'	=> "$this->msg",
                'UserName' => "$this->SesionName"
            );
            self::Srch_Person($this->Data);
		}
		public function Srch_Person($Kwargs)
		{
			extract($Kwargs);
			//echo $IdJob . "  " .$Pryce ."  " .$MSG ."   " .$UserName;
			require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Per = "call GetId_Person('".$this->Userr->NamseSe."')";
            $Resultt =mysqli_query($coonect->Cons,$Sel_Per);
            $numResults =  mysqli_num_rows($Resultt);
            if($Pryce=="" or $MSG=="")
            {
                echo 1;
            } 
            else if ($numResults > 0) 
            {
                //echo "Encontro Data";
                while($Fila=$Resultt->fetch_row())
                {
                    //echo  "Fila" .$Fila[0];
                    self::Person_ApliJob($Fila[0],$IdJob,$MSG,$Pryce );
                   
                }
            }else if($numResults == 0)
            {
                //search company:
                //echo "nothing in table person!";
                self::Srch_Company($IdJob,$MSG,$Pryce);
            }
            mysqli_free_result($Resultt);
            mysqli_close($coonect->Cons);
		}

		static function Person_ApliJob($IdPe,$idJ,$ME,$Pr)
		{
			//echo $IdPe . "  " . $idJ ;
			require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Per = "SELECT * FROM aplicattions WHERE fk_job = $idJ and fk_person = $IdPe";
            $Resultt =mysqli_query($coonect->Cons,$Sel_Per);
            $numResults =  mysqli_num_rows($Resultt);
            //echo  "numero :" .$numResults;
            if ($numResults >=1) 
            {
            	echo 2;
            }else
            {
            	//echo $IdPe . "  " . $idJ . "  " .$ME ."  " .$Pr;
            	try
            	{
                	$ApliPerson = "call Add_PerApli ('".$idJ."','".$IdPe."','".$Pr."','".$ME."')";
                	//echo "what= " .$ApliPerson ;
                	$Resultt=mysqli_query($coonect->Cons,$ApliPerson);
                	if($Resultt)
                	{
                    	echo 3;
                    	
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
            mysqli_close($coonect->Cons);
		}

		//Searching in compàny:
		public function Srch_Company($Id_Jo, $MSGG, $Prr)
		{
			//echo " " .$Id_Jo . "  "  . $MSGG . "   " . $Prr;
			require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Per = "call GetId_Company  ('".$this->Userr->NamseSe."')";
            $Resultt =mysqli_query($coonect->Cons,$Sel_Per);
            $numResults =  mysqli_num_rows($Resultt);
            if ($numResults > 0) 
            {
                //echo "Encontro Data";
                while($Fila=$Resultt->fetch_row())
                {
                    //echo  "hey in search company  Fila" .$Fila[0];
                    self::Company_ApliJob($Fila[0],$Id_Jo,$MSGG,$Prr );
                   
                }
            }else if($numResults == 0)
            {
               
                //no existe
            }
            mysqli_close($coonect->Cons);

		}

		static function Company_ApliJob($IdComp,$Id_Joo , $Ms_g, $P_r)
		{

			
			require_once 'Conect.php'; 
            $coonect = new CONNECCT();
            $coonect->Con();
            $Sel_Per = "SELECT * FROM aplicattions WHERE fk_job = $Id_Joo and  fk_company= $IdComp";
            $Resultt =mysqli_query($coonect->Cons,$Sel_Per);
            $numResults =  mysqli_num_rows($Resultt);
            //echo  "numero :" .$numResults;
            if ($numResults >=1) 
            {
            	echo 2;
            }else
            {
            	//echo $IdPe . "  " . $idJ . "  " .$ME ."  " .$Pr;
            	try
            	{
                	$ApliComp = "call Add_ComApli  ('".$Id_Joo."','".$IdComp."','".$P_r."','".$Ms_g."')";
                	//echo "what= " .$ApliPerson ;
                	$Resultt=mysqli_query($coonect->Cons,$ApliComp);
                	if($Resultt)
                	{
                    	echo 3;
                    	
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
            mysqli_close($coonect->Cons);
		}



	}
	$apl= new apliJob();
?>