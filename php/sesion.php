 <?php
 	session_start();
 	class Session
 	{
 		public $NamseSe;
	 	public function __construct()
	 	{
	 		$this->NamseSe= $_SESSION['Namee'];
	 	}
 	}
?>