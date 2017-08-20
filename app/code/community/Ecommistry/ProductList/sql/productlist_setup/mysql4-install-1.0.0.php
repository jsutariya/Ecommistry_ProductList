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
 
/* @var $installer Mage_Eav_Model_Entity_Setup */
$installer = $this;
$installer->startSetup();                   

/**
 Check if 'handle_display' attribute exists
 Skip attribute creation if attribute is already created
 */
if(!Mage::getResourceModel('catalog/eav_attribute')->loadByCode(Mage_Catalog_Model_Product::ENTITY, Ecommistry_ProductList_Helper_Data::ATTRIBUTE_CODE)->getId()){
 
	/**
	 * Add 'handle_display' attribute to the eav/attribute 
	 */
	$installer->addAttribute(Mage_Catalog_Model_Product::ENTITY, Ecommistry_ProductList_Helper_Data::ATTRIBUTE_CODE, array(
		'group'                     => 'General',
		'input'                     => 'select',
		'type'                      => 'int',
		'label'                     => 'Handle Display',
		'source'                    => 'eav/entity_attribute_source_boolean',
		'global'                    => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
		'visible'                   => 1,
		'required'                  => 0,
		'visible_on_front'          => 0,
		'is_html_allowed_on_front'  => 0,
		'is_configurable'           => 0,
		'searchable'                => 0,
		'filterable'                => 0,
		'comparable'                => 0,
		'unique'                    => false,
		'user_defined'              => false,
		'default'           		=> 0,
		'is_user_defined'           => false,
		'used_in_product_listing'   => true
	));

}
$installer->endSetup();