<?php
	
    class LoadJobs
    {
    	private $limit ;
    	public $total_HowFields;
    	public $pages;
        public $pro;
    	public function __construct()
    	{
    		
    		$this->limit  = $_POST['limit'];
            $this->pro = $_POST['pro'];
    	}

        public function How_Elements()
        {

            require_once 'Conect.php';
            $coonectt = new CONNECCT();
            $coonectt->Con();
            $howFields = "CALL Job_id_Pro($this->pro)";
            $resHowFields = mysqli_query($coonectt->Cons,$howFields); 
            $this->total_HowFields =  mysqli_num_rows($resHowFields);
            //echo "cuantos" .$this ->total_HowFields;
            mysqli_free_result($resHowFields);
            mysqli_close($coonectt->Cons);
        }

    	public function Show_All()
    	{
    		self::How_Elements();
    		require_once 'Conect.php';
            $coonectt = new CONNECCT();
            $coonectt->Con();
    		$pages = ceil($this->total_HowFields/5);
            $SelectJob = "CALL Job_Pros ($this->pro,$this->limit,5)";
            $resSelJob = mysqli_query($coonectt->Cons,$SelectJob); 

            $numResSelJob =  mysqli_num_rows($resSelJob);
            if ($numResSelJob	> 0)
            {
            	//echo'<script type="text/javascript">alert("Tarea Guardada");</script>';
            ?>
				<table class="table table-bordered">
			  		<thead>
						<tr>
				  			<th>Titulo</th>
				  			<th>Descripcion</th>
				  			<th>Presupuesto</th>
				            
				<tbody>
				<?php
				while($Fila=$resSelJob->fetch_array())
				{
					$Job[$Fila['id_job']] = $Fila['id_job'];
				?>
					<tr>
						<td><?php echo $Fila['title'];?></td>
						<td><?php echo $Fila['description'];?></td>
						<td><?php echo $Fila['Presupuesto'];?></td>
                        <td>
                            <button type="button" class="btn btn-primary Jo" data-toggle="modal" data-target="#exampleModal" id="<?php echo $Fila['id_job'] ?>" onclick="Id_Job('<?php echo $Fila['id_job'] ?>')">
                                Aplicar
                            </button>            
                        </td>
					</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		<?php

           }
            //anterio
            if ($this->limit > 0)
            {
            	$limitt = $this->limit-5; //le resto para retroceder
            	echo "<aside  class='beforee' onclick='Load_Jobs($limitt,$this->pro)'>Anterior</aside> ";
            }else
            {
            	echo "<aside  class='beforee' ></aside> ";
            }
            
            foreach ($Job as $key) 
            {
            	echo "<article class='productt'>". $key ."</article>";
            }
            if ($this->limit < $this->total_HowFields - 5) 
            {
            	$limitt = $this->limit +5;
            	echo "<aside  class='Nextt' onclick='Load_Jobs($limitt,$this->pro)'>Siguiente</aside> ";
            }else
            {
            	echo "<aside  class='Nextt' ></aside> ";
            }
            
    	}


    
    }
//}
    $Lo = new LoadJobs();
    
    
    $Lo->Show_All();
?>