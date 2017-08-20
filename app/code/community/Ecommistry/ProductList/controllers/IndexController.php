<?php
/**
 * Ecommistry
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 */
 
 /**
 * Ecommistry Product List Controller
 *
 * @category    Ecommistry
 * @package     Ecommistry_ProductList
 * @license     GNU General Public License v3.0
 */
 
class Ecommistry_ProductList_IndexController extends Mage_Core_Controller_Front_Action{
	
	/**
     * Product List page
     */
    public function indexAction() {
		
		$ecommistryHelper = Mage::helper('productlist');
		/**
		 * Check if Ecommistry product list module enabled. 
		 * Redirect to 404/No-Route page if module is disabled.
		 */
		if(!$ecommistryHelper->isEnabled()){
			$this->norouteAction();
			return;
		}
		
		/**
		 * Check if user is logged in. If Guest user, redirect back to login page.
		 */
		if(! Mage::helper('customer')->isLoggedIn()){
			Mage::getSingleton('customer/session')->addError(
				/**
				 * Add \ in string to escape (') and (") sign
				 */
				Mage::helper('core')->quoteEscape(
					/**
					 * Get Error message from Configuration field
					 */
					$ecommistryHelper->__(Mage::getStoreConfig(Ecommistry_ProductList_Helper_Data::LOGIN_REQUIRED_ERROR_MESSAGE,Mage::app()->getStore()))
				)
			);
			/**
			 * Redirect User to Login page
			 */
            Mage::app()->getFrontController()->getResponse()->setRedirect(Mage::getUrl('customer/account/login', array('referer' => Mage::helper('core')->urlEncode($ecommistryHelper->getProductListUri()))));
        }
		/**
		 * Load Product List Page
		 */
		$this->loadLayout();   
		$this->getLayout()->getBlock("head")->setTitle($ecommistryHelper->getProductListTitle());
			$breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
		$breadcrumbs->addCrumb("home", array(
				"label" => $ecommistryHelper->__("Home Page"),
				"title" => $ecommistryHelper->__("Home Page"),
				"link"  => Mage::getBaseUrl()
		   ));

		$breadcrumbs->addCrumb("ecommistry products", array(
				"label" => $ecommistryHelper->getProductListTitle(),
				"title" => $ecommistryHelper->getProductListTitle()
		   ));

		$this->renderLayout();
    }
	
}
