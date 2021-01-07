<?php
        class Users
        {
            private $Name;
            private $Name1;
            private $LaNa;
            private $LaNa1;
            private $Maill;
            private $Fna;
            private $Userr;
            private $Pass;
            private $Gender;
            private $Rol;
            private $City;
            private $Tp;
            private $NoDoc;
            private $Prof;
            
            public function __construct()
            {
                $this->City = $_POST['Cityy'];
                //$option = isset($_POST['Cityy']) ? $_POST['Cityy'] : false;
               // if ($option) {
                 //   echo htmlentities($_POST['Cityy'], ENT_QUOTES, "UTF-8");
               // } else {
                 //   echo "task optio is required";
                //
                $this->Name = $_POST['Name'];
                $this->Name1 = $_POST['Name1'];
                $this->LaNa = $_POST['LaNa'];
                $this->LaNa1 = $_POST['LaNa1'];
                $this->Maill = $_POST['Maill'];
                $this->Fna = $_POST['Fna'];
                $this->Userr = $_POST['Userr'];
                $this->Gender = $_POST['Genero'];
                $this->Rol = $_POST['Rol'];
                $this->City = $_POST['Cityy'];
                $this->Pass = $_POST['Pass'];
                $this->Tp = $_POST['Tp'];
                $this->NoDoc = $_POST['NoDoc'];
                $this->Prof = $_POST['Prof'];
                $this->Data = array(
                    'Name' => "$this->Name",
                    'Name1' => "$this->Name1",
                    'LaNa' => "$this->LaNa",
                    'LaNa1' => "$this->LaNa1",
                    'Maill' => "$this->Maill",
                    'Fna' => "$this->Fna",
                    'Userr' => "$this->Userr",
                    'Gender' => "$this->Gender",
                    'Rol' => "$this->Rol",
                    'City' => "$this->City",
                    'Pass' => "$this->Pass",
                    'TypeDoc' => "$this->Tp",
                    'Document' => "$this->NoDoc",
                    'Profesion' => "$this->Prof"

                );
                //echo json_encode($this->Data);
                self::How_Action($this->Data);
            }

            public function How_Action($Kwargs)
            {

                extract($Kwargs);
                /*
                echo "". $City ."<br>";
               echo "nombre".$Name ."<br>";
               echo "nombre1". $Name1 ."<br>";
               echo "apellido". $LaNa ."<br>";
               echo "apellido1". $LaNa1 ."<br>";
               echo "correo". $Maill ."<br>";
               echo "fecha". $Fna ."<br>";
               echo "user". $Userr ."<br>";
               echo "genero". $Gender ."<br>";
               echo "rol". $Rol ."<br>";
               echo "ciudad". $City ."<br>";
               echo "clave". $Pass ."<br>";
               echo "TypeDoc" . $TypeDoc ."<br>";
                echo "Document" . $Document ."<br>";
                echo "Profesion" . $Profesion ."<br>";
                 */
               if(($Name=="")  or ($LaNa=="") or($LaNa1=="") or ($Maill=="") or($Fna=="") or($Userr =="")or ($Pass=="") or ($Document=="") )
               {
                    echo 1;
               }else
               {
                    //cho "la clave es: " .$Pass;
                    $PassEn=md5($Pass);
                    //echo "Clave encriptada:".$PassEn;
                    //$How=strlen($PassEn);
                    //echo "La clave tiene :" .$How."Caracteres";
                    self::Add_User($Name,$Name1,$LaNa,$LaNa1,$TypeDoc,$Document,$Rol,$City,$Gender,$Profesion,$Maill,$PassEn,$Userr,$Fna);
               }
            }

            static function Add_User($Na,$Na1,$LNa,$LNa1,$Td,$D,$R,$C,$Ge,$Proo,$Ma,$Pa,$Us,$F)
            {
                /*
                    na=name,na=name,Lna=LaNa,Lna1=LaNa1,$Ma=Mail,$F=FNa,US=User,Ge=gender,c=ciudad,Pa=pass
                */
                //echo $Na."  ".$Na1."  ".$LNa."  ".$LNa1."  ".$Ma."  ".$F."  ".$Us."  ".$Ge."  ".$R."  ".$C." clave ".$Pa . " documento ".$Td." numero ".$D." profesion ". $Proo ;
                
                require_once 'Conect.php';
                $coonect = new CONNECCT();
                $coonect->Con();
                $Sel = "SELECT mail,user FROM persons  WHERE mail='$Ma' or user='$Us' LIMIT 1";
                //$Sel="call Sel_User('".$Ma."','".$Us."')";
                $Resultt =mysqli_query($coonect->Cons,$Sel); 

                if ($Resultt->num_rows > 0)
                {
                    echo '2';
                    mysqli_free_result($Resultt);
                    mysqli_close($coonect->Cons);

                } else
                {
                    try
                    {
                        $InsUs="call Add_User('".$Na."','".$Na1."','".$LNa."','".$LNa1."','".$Td."','".$D."', '".$R."','".$C."','".$Ge."','".$Proo."', '".$Ma."','".$Pa."','".$Us."','".$F."')";
                        $ReIns_Us=mysqli_query($coonect->Cons,$InsUs);
                        if($ReIns_Us)
                        {
                            echo 5;
                             mysqli_free_result($Resultt);
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
    }
        $Us = new Users();
?>
