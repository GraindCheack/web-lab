<?php
class Model_Goods extends Model
{
	public function get_data()
	{	
		require 'connection.php';
		if(isset($_POST['sortCheck']) and isset($_POST['filterCheck']))
			return $link->query("select * from good where ".$_POST['filterSelect']." like '%".$_POST['filterCheck']."%' order by ".$_POST['sortSelect'].";");
		elseif(isset($_POST['filterCheck']))
			return $link->query("select * from good where ".$_POST['filterSelect']." like '%".$_POST['filterCheck']."%';");
		elseif(isset($_POST['sortCheck']))
			return $link->query("select * from good order by ".$_POST['sortSelect'].";");
		else
			return $link->query("select * from good;");
	}
	public function give_data()
	{
		session_start();
		if (!isset($_SESSION['flag'])) 
		{
			$_SESSION['flag'] = 0;
			$_SESSION['id_good_custom'] = array();
		}
		if(isset($_POST['product_id']))
		{
		//	print("add");
			$_SESSION['id_good_custom'][] = $_POST['product_id'];
		}
	//	var_dump($_SESSION['id_good_custom']);
	}
}
?>