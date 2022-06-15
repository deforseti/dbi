<?php
class OnlineZakaz extends MailSender
{
	public $data_dbi = '';
	public function getData()
	{
		$data = json_decode($this->data_dbi);
		$this->addZakaz($data);
		$arr = array();
		$arr['u_name'] = strip_tags($data->name);
		$arr['u_phone'] = strip_tags($data->phone);
		$arr['u_email'] = strip_tags($data->email);
		$arr['u_text'] = 'Онлайн заказ оборудования от компании' . strip_tags($data->organization) . '. Проверьте заказы в админ панели сайта в раздели "Ваши заказы"!';
		$this->subject = 'Заявка от '.$arr['u_email'];

		include $_SERVER['DOCUMENT_ROOT'] . "/lib/bx24/add_lead.php";
		$dataAttr = [
			'type' => 'dbi.com.ua (заказ оборудования онлайн)',
			'name' => $arr['u_name'],
			'phone' => $arr['u_phone'],
			'email' => $arr['u_email'],
			'comment' => $arr['u_text']

		];
		addLeadToBx24($dataAttr);
		return $arr;
	}
	protected function addZakaz($data)
	{
		global $db;
		$time = date('Y-m-d H:i:s');
		$sql = 'INSERT INTO orders VALUES ( NULL, "'.$data->name.'", "'.$data->organization.'", "'.$data->phone.'", "'.$time.'", "'.htmlentities($data->html).'")';
		$result = $db->query($sql);
		if( $result )
		{
			echo 'thanks';
		}else
		{
			echo 'error';
		}
	}
	public function setDataObj($data)
	{
		$this->data_dbi = $data;
	}
}