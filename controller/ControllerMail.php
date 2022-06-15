<?php
/**
* 
*/
class ControllerMail
{
	public function initSendMess()
	{
		if(isset($_POST['send_from_dbi']))
		{
			$initMail = new MailSender();
			$initMail->initSendMess();
		}
	}
}