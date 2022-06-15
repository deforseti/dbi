<?php

class MailSender
{
	public $to = 'rroommaann806@gmail.com';
	public $subject = '';
	public $secred_key = '6LfFc3kUAAAAAExpXcFhwr9nkrvshE3TXuwdTUQb';
	public function initSendMess($redirect=false)
	{
		$notBot = $this->testBot();
		if( $notBot )
		{
			$DataMess = $this->getData();
			$mess = $this->HtmlMess($DataMess);
			$this->getEmailSend();
			$this->sendMess($mess);
			if(!$redirect)
			{
				$this->thanksRedirect();
			}
		}
		
	}
	public function getEmailSend()
	{
		global $db;
		$data = $db->query("SELECT meta_value FROM dbi_postmeta WHERE meta_key = 'send_email'");
		$mail = Db::returnResults($data);
		$this->to = trim($mail['meta_value'],'"');
	}
	public function getData()
	{
		$arr_send = array();
		foreach ( $_POST as $k => $v ) {
			$arr_send[$k] = Core::ClearSearchString($v);
		}
		$this->subject = 'Заявка от '.$arr_send['u_email'];
		return $arr_send;
	}

	public function HtmlMess($arr)
	{
		include $_SERVER['DOCUMENT_ROOT'] . "/lib/bx24/add_lead.php";
		$dataAttr = [
			'type' => 'dbi.com.ua (быстрый звонок)',
			'name' => $arr['u_name'],
			'phone' => $arr['u_phone'],
			'email' => $arr['u_email'],
			'comment' => $arr['u_text']

		];
		addLeadToBx24($dataAttr);
		$mess = '  
		<html>
			<head>
			  <title>'.$this->subject.'</title>
			</head>
			<body>
				<p>Имя: '.$arr['u_name'].'</p>
				<p>Телефон: '.$arr['u_phone'].'</p>
				<p>Почта: '.$arr['u_email'].'</p>
				<p>Сообщение: '.$arr['u_text'].'</p>
			</body>
		</html>
		';
		return $mess;
	}

	public function sendMess($mess)
	{
		$headers = 'From: dbi.com.ua' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		
		$t = mail($this->to, $this->subject, $mess, $headers);
		
	}

	public function testBot()
	{
		require_once('./lib/google_recapcha/googl_recapcha_lib.php');
		$response = null;
		// проверка секретного ключа
		$reCaptcha = new ReCaptcha($this->secred_key);
		if ($_POST["g-recaptcha-response"]) {
		$response = $reCaptcha->verifyResponse(
		        $_SERVER["REMOTE_ADDR"],
		        $_POST["g-recaptcha-response"]
		    );
		}
		if ($response != null && $response->success) {
        	return $response->success;
      	}

	}

	public function thanksRedirect()
	{
		header('Location: /thanks');
		exit();
	}
}