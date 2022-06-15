<?php 
class Order
{
	public function getOrders()
	{
		global $db;
		$data = $db->query("SELECT id,u_name,u_organization,u_phone,u_date FROM orders ORDER BY id DESC");
		return Db::returnResults($data,true);
	}
}