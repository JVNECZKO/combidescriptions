<?php
class CombiDescriptionsGetCombinationDescriptionsModuleFrontController extends ModuleFrontController
{
    public function initContent()
    {
        parent::initContent();

        $idCombination = (int)Tools::getValue('id_combination');
        if ($idCombination) {
            $sql = 'SELECT description, description_short FROM ' . _DB_PREFIX_ . 'dfc_product_attribute_lang WHERE id_product_attribute = ' . (int)$idCombination;
            $result = Db::getInstance()->getRow($sql);

            if ($result) {
                die(Tools::jsonEncode($result));
            }
        }
        die(Tools::jsonEncode(array('error' => true)));
    }
}
