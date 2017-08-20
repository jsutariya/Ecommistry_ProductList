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
 * @category    Ecommistry
 * @package     Ecommistry_ProductList
 * @license     GNU General Public License v3.0
 */
 
class Ecommistry_ProductList_Helper_Data extends Mage_Core_Helper_Abstract
{
	const PAGE_TITLE = "product_list/general/page_title";
	const PAGE_URL = "product_list/general/page_url";
	const MODULE_STATUS = "product_list/general/enabled";
	const ATTRIBUTE_CODE = "handle_display";
	const PRODUCT_COUNT = "product_list/general/product_count";
	const COLUMN_COUNT = "product_list/general/column_count";
	const VIEW_MODE = "product_list/general/view_mode";
	const LOGIN_REQUIRED_ERROR_MESSAGE = "product_list/general/login_required_error_message";
	
	/**
     * Get Product List Page URL
     * @access public
     * @return string|boolean false
     */
    public function getProductListUri(){
		if(!$this->isEnabled()) return false;
        return Mage::getUrl((Mage::getStoreConfig(self::PAGE_URL,Mage::app()->getStore())) ? Mage::getStoreConfig(self::PAGE_URL,Mage::app()->getStore()) : 'productlisting');
    }
	
	/**
     * Get Product List Page URL
     * @access public
     * @return string|boolean false
     */
    public function getProductListUrl(){
		if(!$this->isEnabled()) return false;
        return (Mage::getStoreConfig(self::PAGE_URL,Mage::app()->getStore())) ? Mage::getStoreConfig(self::PAGE_URL,Mage::app()->getStore()) : 'ecommistry';
    }
	
	/**
     * Get Product List Page Title
     * @access public
     * @return string|boolean false
     */
    public function getProductListTitle(){
		if(!$this->isEnabled()) return false;
        return (Mage::getStoreConfig(self::PAGE_TITLE,Mage::app()->getStore())) ? Mage::getStoreConfig(self::PAGE_TITLE,Mage::app()->getStore()) : 'Ecommistry Products';
    }
	
	/**
     * Check Module Status
     * @access public
     * @return boolean
     */
    public function isEnabled(){
        return Mage::getStoreConfig(self::MODULE_STATUS,Mage::app()->getStore());
    }
	
	/**
     * Get Product List Column count
     * @access public
     * @return number|boolean false
     */
    public function getProductCount(){
		if(!$this->isEnabled()) return false;
        return (int)(Mage::getStoreConfig(self::PRODUCT_COUNT,Mage::app()->getStore())) ? Mage::getStoreConfig(self::PRODUCT_COUNT,Mage::app()->getStore()) : 10;
    }
	
	/**
     * Get Product List Column count
     * @access public
     * @return number|boolean false
     */
    public function getProductColumnCount(){
		if(!$this->isEnabled()) return false;
        return (int)(Mage::getStoreConfig(self::COLUMN_COUNT,Mage::app()->getStore())) ? Mage::getStoreConfig(self::COLUMN_COUNT,Mage::app()->getStore()) : 5;
    }
	
	/**
     * Get Product List Column count
     * @access public
     * @return number|boolean false
     */
    public function getViewMode(){
		if(!$this->isEnabled()) return false;
        return (Mage::app()->getRequest()->getParam('mode')) ? Mage::app()->getRequest()->getParam('mode') : Mage::getStoreConfig(self::VIEW_MODE,Mage::app()->getStore());
    }
}
	 