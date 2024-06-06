<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class CombiDescriptions extends Module
{
    public function __construct()
    {
        $this->name = 'combi_descriptions';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Łukasz Janeczko';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('Combi Descriptions');
        $this->description = $this->l('Zmienia długi i krótki opis produktu po zmianie kombinacji.');
        $this->ps_versions_compliancy = array('min' => '1.7', 'max' => _PS_VERSION_);
        $this->bootstrap = true;
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayHeader') &&
            $this->registerHook('displayProductExtraContent');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS($this->_path . 'views/js/combi_descriptions.js');
    }

    public function hookDisplayProductExtraContent($params)
    {
        return $this->display(__FILE__, 'views/templates/hook/displayProductExtraContent.tpl');
    }
}
