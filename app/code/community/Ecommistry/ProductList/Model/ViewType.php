<?php
class Ecommistry_ProductList_Model_ViewType
{

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
		
            array('value' => 'grid', 'label'=>Mage::helper('productlist')->__('Grid')),
            array('value' => 'slider', 'label'=>Mage::helper('productlist')->__('Slider')),
        );
    }

}
