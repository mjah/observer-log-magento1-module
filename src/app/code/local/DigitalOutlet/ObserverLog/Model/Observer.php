<?php
class DigitalOutlet_ObserverLog_Model_Observer
{
	public function logProductUpdate(Varien_Event_Observer $observer)
	{
		// 
		if(Mage::helper('observerlog')->isEnabled() == 1 && Mage::helper('observerlog')->isLogProductUpdateEnabled() == 1) {
			$username = Mage::getSingleton('admin/session')->getUser()->getUsername();
			$product = $observer->getEvent()->getProduct();
			$name = $product->getName();
			$sku = $product->getSku();

			Mage::log("{$username} updated {$sku} | {$name}.", null, 'digitaloutlet_productupdates.log');
		}
	}

	public function logLogin(Varien_Event_Observer $observer)
	{
		if(Mage::helper('observerlog')->isEnabled() == 1 && Mage::helper('observerlog')->isLogLoginEnabled() == 1) {
			$username = Mage::getSingleton('admin/session')->getUser()->getUsername();
			
			if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
			    $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			    $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
			    $ipAddress = $_SERVER['REMOTE_ADDR'];
			}

			Mage::log("{$username} has logged in. IP: {$ipAddress}", null, 'digitaloutlet_logins.log');
		}
	}
}