<?php
class Model_Cart extends Model
{
	public function checkOrder()
	{
		if(isset($_POST['first_name']) and isset($_POST['second_name']) and isset($_POST['middle_name']) and isset($_POST['address']))
			return true;
		else
			return false;
	}
	public function create_order()
	{
		include 'connection.php';
		$id_client = $link->query("select max(id_client) from client;")->fetch();
		$id_order = $link->query("select max(id_order) from _order;")->fetch();
		$id_list_good = $link->query("select max(id_list_good) from list_good;")->fetch();
		$id_client = $id_client[0] + 1;
		$id_order = $id_order[0] + 1;
		$id_list_good = $id_list_good[0] + 1;
		$link->query("insert into client values(".$id_client.", '".$_POST['second_name']."', '".$_POST['first_name']."', '".$_POST['middle_name']."', '".$_POST['address']."');");
		$link->query("insert into _order values(".$id_order.", 1000, '".date('Y-m-d H:i:s')."', ".$id_client.");");
		foreach($_SESSION['id_good_custom'] as $elem)
        {
			print "insert into list_good values(".$id_list_good.", ".$elem.", ".$id_order.");";
            $link->query("insert into list_good values(".$id_list_good.", ".$elem.", ".$id_order.");");
			$id_list_good++;
        }
		unset($_SESSION['id_good_custom']);
	}
	public function get_data()
	{	
        include 'connection.php';
		$result1 = array();
		if(isset($_SESSION['id_good_custom'])) {
			foreach($_SESSION['id_good_custom'] as $elem)
			{
				$row = $link->query("select * from good where id_good = ".$elem);
				$result1[] = $row;
			}
			if(sizeof($result1) == 0)
				$result1 = null;
		}
		
		return $result1;
	}
	public function give_data()
	{
		session_start();
		if(isset($_SESSION['id_good_custom'])) {
			foreach($_SESSION['id_good_custom'] as $elem => $elemVal)
			{
				$product_id = isset($_POST['product_id']) ? $_POST['product_id']: '';
				if(strval($elemVal) == $product_id)
				{
					unset($_SESSION['id_good_custom'][$elem]);
					break;
				}
			}
		}
		
		//var_dump($_SESSION['id_good_custom']);
	}
}
