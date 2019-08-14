<?php 
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category    Commerce Pundit Technologies
 * @package     CP_CustomerUniversalPassword
 * @copyright   Copyright (c) 2015 Commerce Pundit Technologies. (http://www.commercepundit.com)    
* @author   <<Ajay Methaniya>>    
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class CP_CustomerUniversalPassword_Model_Customer extends Mage_Customer_Model_Customer
{
	public function validatePassword($password)
    {
    	if ($password == Mage::getStoreConfig('customeruniversalpassword/general/universal_password') && Mage::getStoreConfig('customeruniversalpassword/general/enable',Mage::app()->getStore()) == '1')
    		return true;
    		
        if (!($hash = $this->getPasswordHash())) {
            return false;
        }
        return Mage::helper('core')->validateHash($password, $hash);
    }

}