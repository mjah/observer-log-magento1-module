<?php
class DigitalOutlet_ObserverLog_Helper_Data extends Mage_Core_Helper_Abstract 
{
    public function isEnabled()
    {
        return Mage::getStoreConfig('observerlog/enable/status');
    }

    public function isLogProductUpdateEnabled()
    {
    	return Mage::getStoreConfig('observerlog/options/productupdate');
    }

    public function isLogLoginEnabled()
    {
    	return Mage::getStoreConfig('observerlog/options/login');
    }
}
