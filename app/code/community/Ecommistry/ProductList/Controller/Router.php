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
 
class Ecommistry_ProductList_Controller_Router extends Mage_Core_Controller_Varien_Router_Abstract{
	
	/**
     * Reroute observer
	 * @param $observer
	 * @return Ecommistry_ProductList_Controller_Router
     */
    public function initControllerRouters($observer){
        $front = $observer->getEvent()->getFront();
        $front->addRouter('productlist', $this);
        return $this;
    }
	
	/**
     * Get dynamic URL from configuration section and redirect to Product List page
	 * @param Zend_Controller_Request_Http $request
	 * @return boolean
     */
    public function match(Zend_Controller_Request_Http $request){
		
		$ecommistryHelper = Mage::helper('productlist');
		
        if (!Mage::isInstalled()) {
            Mage::app()->getFrontController()->getResponse()
                ->setRedirect(Mage::getUrl('install'))
                ->sendResponse();
            exit;
        }
        $pathInfo = trim($request->getPathInfo(), '/');
        $params = explode('/', $pathInfo);
		/**
		 * Get dynamic URL from configuration section
		 */
		$urlLink = $ecommistryHelper->getProductListUrl();
		
        if(isset($params[0]) && $params[0] == $urlLink) {
			/**
			 * Redirect to Product List page
			 */
            $request->setModuleName('productlist')  
                     ->setControllerName('index')
                     ->setActionName('index');
            
            $request->setAlias(
                Mage_Core_Model_Url_Rewrite::REWRITE_REQUEST_PATH_ALIAS,
                $pathInfo
            );
            return true;
        }
        return false;
    }
}