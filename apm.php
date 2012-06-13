<?php

/*
  Plugin Name: Adminbar-Post-Menus
  Plugin URI: http://shawnsandy.com
  Description: Adds menu list of post by status to your admin bar, quickly jump to and and from post easily from the admin menu.
  Author: Shawn Sandy
  Author URI: http://shawnsandy.com
  Version: 1.1.1
 */

include_once dirname(__FILE__) . '/AdminbarPostMenus.php';

class apm_plugin {




    public function __construct() {
        $this->init();
        //add_action('init', array($this, 'init'));
    }

    public function init() {
        $this->load();
         AdminbarPostMenus::add_menus()->nodes();
    }

    public function load() {
        if (!class_exists('al_manager')) :
            add_action('admin_notices', array($this, 'apm_admin_notice'));
            return;
        endif;
    }

    public function apm_admin_notice() {
        $msg = __('<div id="messages" class="error"><p>
       Admnbar-PostMenus requires the PHP <code>AL.Manager plugin</code>,
       http://autoloadmanager.shawnsandy.com, please install or disable the plugin
       </p></div>', 'apm');
        echo $msg;
    }

    public function menus($post_status = 'publish'){



    }

}

/**
 * Initalize the plugin
 */
add_action('init', function(){
 $adm_plugin = new apm_plugin();

});




