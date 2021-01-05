<?php

        class Citys
        {
            private $Cityy;
            public function __construct()
            {
                require_once 'Conect.php';
                $this->Cityy = $_POST['Namecys'];
                $this->Data = array(
                    'Cityy' => "$this->Cityy",
                );
                self::How_Action($this->Data);
            }

            public function How_Action($Kwargs)
            {
                extract($Kwargs);
               if(($Cityy =="") )
               {
                    echo 1;
               }
               else
               {
                    self::Cty_Exist($Cityy);
                    //echo 'city ' .$Cityy;
               }
            }

            static function Cty_Exist($C)
            {
                //echo "C: ". $C;
                
                
                $coonect = new CONNECCT();
                $coonect->Con();
                $Sel = "call All_Ctys('".$C."')";
                //$Sel="call Sel_User('".$Ma."','".$Us."')";
                $Result_Cty =mysqli_query($coonect->Cons,$Sel); 
                if ($Result_Cty->num_rows > 0)
                {
                    echo '2';
                    mysqli_free_result($Result_Cty);
                    mysqli_close($coonect->Cons);
                } else
                {
                    self::Ins_Cty($C);
                }
            }

            static function Ins_Cty($C)
            {
                try
                {
                    //echo "ciudad:" . $C;
                    $coonect = new CONNECCT();
                    $coonect->Con();
                    $InsCty="call Add_City('".$C."')";
                    $ReIns_Cty=mysqli_query($coonect->Cons,$InsCty);
                    if($ReIns_Cty)
                    {
                        echo 5;
                        
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
        $Ctys = new Citys();
?>
