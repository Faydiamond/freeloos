<?php

        class Logg
        {
            private $Name;
            private $Pass;
            
            //__construct()
            public function Initt()
            {
                
                $this->Name = $_POST['Name'];
                $this->Pass = $_POST['Pass'];
                $this->Data = array(
                    'Name' => "$this->Name",
                    'Pass' => "$this->Pass",
                );
                self::How_Action($this->Data);
            }

            public function How_Action($Kwargs)
            {
                extract($Kwargs);
                if (($Name!="") &&   ($Pass!="")) 
                {
                    $PassEn=md5($Pass);
                    //echo "hashed " .$PassEn;
                    require_once 'Conect.php';
                    $coonect = new CONNECCT();
                    $coonect->Con();
                    $Sel = "CALL User_Login ('".$Name."','".$PassEn."')";
                    //$Resultt = $coonect->Cons->query($Sel);
                    $Resultt =mysqli_query($coonect->Cons,$Sel); 
                    $numResults =  mysqli_num_rows($Resultt);
                    if ($numResults > 0) 
                    {
                        //echo "Encontro Data";
                        while($Fila=$Resultt->fetch_assoc())
                        {
                            
                            //echo $Fila["Mail"] ,$Fila["Pass"] , $Fila["Userr"];
                            if($Fila["fk_rol"]==2)
                            {
                                //echo "Sos el Admin!";
                                echo 3;
                                session_start();
                                $_SESSION['Namee']=$Fila["user"];
                                break;
                                //$this->IdP =$_SESSION['Namee'];
        
                            }
                            if($Fila["fk_rol"]==1)
                            {
                                //echo "Sos el User!";
                                echo 4;
                                session_start();
                                $_SESSION['Namee']=$Fila["user"];
                                break;
                            }
                        }
                    } else {
                          //echo " No data";
                    }
                    if($Resultt->num_rows==0)
                    {
                        //ECHO "NO AHI FILAS";
                        //secho 1;
                        mysqli_free_result($Resultt);
                        mysqli_close($coonect->Cons);
                        self::Sel_Company($Name,$PassEn);
                    }

                    //echo $Name .  $Pass;
                }elseif(($Name="")  || ($Pass=""))
                {
                    echo 0;
                }
            }   


            static function Sel_Company($N,$P)
            {
                //hey, lets to search fields in table
                require_once 'Conect.php';
                $coonect = new CONNECCT();
                $coonect->Con();
                $SelCom = "CALL User_Company('".$N."','".$P."')";
                $ResultCo = mysqli_query($coonect->Cons,$SelCom);
                $numResultsCo =  mysqli_num_rows($ResultCo);
                if ($numResultsCo > 0)
                {
                    //echo "tengo datos!";
                    //echo "Encontro Data";
                    while($Fila=$ResultCo->fetch_assoc())
                    {
                        if($Fila["fk_rol"]==2)
                        {
                            //echo "Sos el Admin!";
                            echo 3;
                            session_start();
                            $_SESSION['Namee']=$Fila["user"];
                            break;
                            //$this->IdP =$_SESSION['name_company'];
                        }
                        if($Fila["fk_rol"]==1)
                        {
                            //echo "Sos el User!";
                            echo 4;
                            session_start();
                            $_SESSION['Namee']=$Fila["name_company"];
                            break;
                        }
                    }
                }if($ResultCo->num_rows==0)
                {
                    //ECHO "NO AHI FILAS";
                    echo 1;
                    mysqli_free_result($ResultCo);
                    mysqli_close($coonect->Cons);
                        
                }
            } 
            
           
    }
        $RR = new Logg();
        $RR->Initt();
        //echo $RR-> Id_Person();
        //echo "El ide de la persona es: " .$RR->Id_Person();
?>

