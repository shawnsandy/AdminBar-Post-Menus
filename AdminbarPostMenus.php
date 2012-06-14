<?php

/**
 * @package WordPress
 * @subpackage Core-WP
 * @author shawnsandy
 * @link http://shawnsandy.com
 */


class AdminbarPostMenus {

    private $display_published = true,
            $display_pending = true,
            $display_draft = true,
            $display_schedule = true,
            $post_types = array('post' => 'Posts', 'page' => 'Pages'),
            $list_count = 5;

    public function set_display_schedule($display_schedule) {
       $this->display_schedule = $display_schedule;
       return $this;

    }

    public function set_display_published($display_published) {
        $this->display_published = $display_published;
        return $this;
    }

    public function set_display_pending($display_pending) {
        $this->display_pending = $display_pending;
        return $this;
    }

    public function set_display_draft($display_draft) {
        $this->display_draft = $display_draft;
        return $this;
    }

    public function set_post_types($post_types) {
        $this->post_types = $post_types;
        return $this;
    }

    public function set_list_count($list_count) {
        $this->list_count = $list_count;
        return $this;
    }

    /**
     * factory pattern
     * @return type
     */
    public static function add_menus(){
        $apm = new AdminbarPostMenus();
        return $apm;
    }

    public function __construct() {

    }

    public function nodes() {


        foreach ($this->post_types as $post_type => $title) {
            // TODO localize note titles
            // man I really hate localization
            if ($this->display_published):
                /** Display published pages * */
                Ext_Post_Menus::add()->set_node_id($post_type . '_menu')->set_node_title(ucfirst($title))
                        ->set_items($this->list_count)->set_post_type($post_type)->published($post_type, $this->list_count);
            endif;


            if ($this->display_schedule):
                Ext_Post_Menus::add()->set_node_id($post_type . '_schedule')->set_node_parent($post_type . '_menu')
                        ->set_items($this->list_count)->set_node_title('SCHEDULE')->set_post_type($post_type)
                    ->scheduled($post_type, $this->list_count);
            endif;


            if ($this->display_pending):
                Ext_Post_Menus::add()->set_node_id($post_type . '_pending')->set_node_parent($post_type . '_menu')
                        ->set_node_title('PENDING')->set_post_type($post_type)->pending($post_type, $this->list_count);
            endif;

            if ($this->display_draft):
                Ext_Post_Menus::add()->set_node_id($post_type . '_draft')->set_node_parent($post_type . '_menu')
                        ->set_items($this->list_count)->set_node_title('DRAFTS')
                    ->set_post_type($post_type)->drafts($post_type,$this->list_count);
            endif;
        }
    }

}

?>
