<?php 
class OrderController
{
	public function actionOrder($template)
	{
		$order = new Order();
		$data = $order->getOrders();
		TemplateController::actionTemplate($template,$data);
		return true;
	}
}