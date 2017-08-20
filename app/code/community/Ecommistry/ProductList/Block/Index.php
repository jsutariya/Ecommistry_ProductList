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
 
class Ecommistry_ProductList_Block_Index extends Mage_Catalog_Block_Product_List{   

	/**
     * Initialize product collection
     *
     * @return null|Mage_Catalog_Model_Resource_Eav_Mysql4_Product_Collection $collection
     */
	public function getProducts(){
		$ecommistryHelper = Mage::helper('productlist');
	
		if(!$ecommistryHelper->isEnabled()) return null;

		$collection = Mage::getModel('catalog/product')->getCollection();
		$collection
            ->addAttributeToSelect('*')
            ->addMinimalPrice()
            ->addFinalPrice()
            ->addTaxPercents();
		/**
		 * Filter using custom attribute 'handle_display'
		 */
		$collection->addAttributeToFilter(Ecommistry_ProductList_Helper_Data::ATTRIBUTE_CODE, 1);
		
        Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($collection);
        Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($collection);
		$collection->setPageSize($ecommistryHelper->getProductCount())->setCurPage(1);
		
        return $collection;
	}
	
	/**
     * Set columns to display for grid view
     *
     * @return (int) number
     */
	public function getColumnCount(){
		return Mage::helper('productlist')->getProductColumnCount();
	}
	
	/**
     * Set page view mode
     *
     * @return string (grid|slider)
     */
	public function getMode(){
		return Mage::helper('productlist')->getViewMode();
	}
	
	/**
     * Set page view mode
     *
     * @return array
     */
	public function getModes(){
		return Mage::getModel('productlist/viewType')->toOptionArray();
	}
	
}