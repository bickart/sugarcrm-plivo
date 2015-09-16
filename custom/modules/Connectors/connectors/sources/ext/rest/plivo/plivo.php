<?php
/**
 * Copyright 2015 Jeff Bickart
 *
 * User: @bickart
 * Date: 09/16/2015
 * Time: 10:49 AM
 * 
 */

require_once('include/connectors/sources/ext/rest/rest.php');

class ext_rest_plivo extends ext_rest {
    protected $_has_testing_enabled = false;

    public function __construct() {
        parent::__construct();
        $this->_enable_in_wizard = false;
        $this->_enable_in_hover = false;
        $this->_enable_in_admin_display = false;
        $this->_enable_in_admin_mapping = false;
        $this->_required_config_fields = array('auth_id', 'auth_token', 'src_phone');
    }

    public function test() {
        $api = ExternalAPIFactory::loadAPI('Plivo', true);
        return $api->getAccountDetails();
    }

    /*
     * getItem
     *
     * As the D&B connector does not have a true API call, we simply
     * override this abstract
     */
    public function getItem($args=array(), $module=null){}


    /*
     * getList
     *
     * As the D&B connector does not have a true API call, we simply
     * override this abstract method
     */
    public function getList($args=array(), $module=null){}
}

?>
