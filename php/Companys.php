<?php
	class Companys
	{
		private $NameCompanyy;
		private $UserCompany;
		private $MailCompany;
		private $PassCompany;
		private $Activityy;
		private $TpDocu;
		private $Roll;

		public function Get_Fields()
		{
			$this->NameCompanyy = $_POST['NameCompanyy'];
			$this->UserCompany = $_POST['UserCompany'];
			$this->MailCompany = $_POST['MailCompany'];
			$this->PassCompany = $_POST['PassCompany'];
			$this->Activityy	= $_POST['Activityy'];
			$this->TpDocu 		= $_POST['TpDocu'];
			$this->Roll 		= $_POST['Roll'];
			
			

			//Array of fields:
			$this->Data = array
			(
                'Company' => "$this->NameCompanyy",
                'Userr' => "$this->UserCompany",
                'Email' => "$this->MailCompany",
                'Pass' => "$this->PassCompany",
                'EcoAct' => "$this->Activityy",
                'TpDo' => "$this->TpDocu",
                'Roll' => "$this->Roll",
            );
            //Show vartiables in json
            //echo json_encode($this->Data);
            self::How_ToDo($this->Data);

		}
		public function How_ToDo($Kwargs)
		{
			extract($Kwargs);
			//echo "empresa: " .$Company . " UsuarioEmpresa: ". $Userr ." correo: " .$Email . " Clave: " . $Pass . "Actividad Economica: " . $EcoAct;
			if (($Company =="") or ($Userr=="") or ($Email=="") or ($Pass==""))
			{
				echo 1;
			}else
			{
				//Hashear Password
				$PassEn=password_hash($Pass,PASSWORD_BCRYPT);
				self::Add_Company($Company,$Userr,$Email, $PassEn, $EcoAct,$TpDo,$Roll );
			}
		}

		static function Add_Company ($Co, $Us, $Em, $Psd, $E, $Td, $Rol)
		{
			//Echo $Co . " " . $Us ." " . $Em ." " . $Psd . " " .$E . " " . $Td . " " . $Rol;
			require_once 'Conect.php';
            $coonect = new CONNECCT();
            $coonect->Con();
            $SelCo = "SELECT id_company,name_company,user,mail FROM companys  WHERE user= '$Us'  OR mail='$Em' LIMIT 1";
                
            $Resultt =mysqli_query($coonect->Cons,$SelCo); 

            if ($Resultt->num_rows > 0)
            {
                echo '2';
                mysqli_free_result($Resultt);
                mysqli_close($coonect->Cons);
            }else
            {
            	//insert company in database:
            	try 
            	{
            		$InsCom = "CALL Add_Company('".$Co."', '".$Us."', '".$Em."', '".$Psd."', '".$E."','".$Td."', '".$Rol."' )";
            		$ReIns_Co=mysqli_query($coonect->Cons,$InsCom);
            		if($ReIns_Co)
                        {
                            echo 5;
                            mysqli_free_result($Resultt);
                            mysqli_close($coonect->Cons);
                        }else
                        {
                            echo ("descripcion error:").mysqli_error($coonect->Cons);
                        }

            	} catch (Exception $e) {
            		echo "El error es:".$e->getMessage();
            	}
            }
		}
	}

	$Company = new Companys();
	$Company->Get_Fields();

?>