<?php

/**
 * @package WordPress
 * @subpackage Core-WP
 * @author shawnsandy
 * @link http://shawnsandy.com
 */

/**
 * Description of AdminbarPostMenus
 *
 * @author studio
 */


//include the class


class AdminbarPostMenus {

    private $display_published = true,
            $display_pending = true,
            $display_draft = true,
            $display_schedule = true,
            $post_types = array('post','pages'),
            $list_cont = 5;

            public function set_display_schedule($display_schedule) {
                $this->display_schedule = $display_schedule;
            }

            public function set_display_published($display_published) {
                $this->display_published = $display_published;
            }

            public function set_display_pending($display_pending) {
                $this->display_pending = $display_pending;
            }

            public function set_display_draft($display_draft) {
                $this->display_draft = $display_draft;
            }

            public function set_post_types($post_types) {
                $this->post_types = $post_types;
            }

            public function set_list_cont($list_cont) {
                $this->list_cont = $list_cont;
            }


    public function __construct() {

    }

    public function nodes(){


        foreach ($this->post_types as $post_type => $title) {


            if($this->display_published):
                /** Display published pages **/
            Ext_Post_Menus::add()->set_node_id($post_type.'_menu')->set_node_title(ucfirst($title))->published($this->post_types);
            endif;

            if($this->display_pending):
                 Ext_Post_Menus::add()->set_node_id($post_type.'_pending')->set_node_parent($post_type.'_menu')
                    ->set_node_title(ucfirst($title))->published($this->post_types);
            endif;

            if($this->display_schedule):
                 Ext_Post_Menus::add()->set_node_id($post_type.'_schedule')->set_node_parent($post_type.'_menu')
                    ->set_node_title(ucfirst($title))->published($this->post_types);
            endif;

            if($this->display_draft):
                 Ext_Post_Menus::add()->set_node_id($post_type.'_draft')->set_node_parent($post_type.'_menu')
                    ->set_node_title(ucfirst($title))->published($this->post_types);
            endif;

            
        }
    }

}

?>
