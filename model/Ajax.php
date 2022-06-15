<?php
class Ajax
{
	static public function oblineZakaz()
	{
		$initOnlineZakaz = new OnlineZakaz();
		$initOnlineZakaz->setDataObj($_POST['oblineZakaz']);
		$initOnlineZakaz->initSendMess(true);

	}
}