 <?php
 	
 	class CloSe
 	{

 		private $Close;

	 	public function __construct()
	 	{
	 		include 'sesion.php';

	 		session_destroy();
	 		echo 5;
	 		//header("Location: ../index.php");
	 	}
	 	
 	}
 	$Cs = new CloSe();
?>