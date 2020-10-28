<?php 



if(!function_exists('setOpacity')){

	function setOpacity($total,$jumlah)
	{
		if($total>0){
			$persen=$jumlah / $total;
			return number_format($persen,2);
		}
		return 0;

		
	}
}

 ?>