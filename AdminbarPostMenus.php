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

    /**
     * Display Schedule post
     * @param bool $display_schedule true/false
     * @return \AdminbarPostMenus
     */
    public function set_display_schedule($display_schedule) {
        $this->display_schedule = $display_schedule;
        return $this;
    }

    /**
     * Display publish post post
     * @param bool $display_published true/false
     * @return \AdminbarPostMenus
     */
    public function set_display_published($display_published) {
        $this->display_published = $display_published;
        return $this;
    }

    /**
     * Display pending post
     * @param bool $display_pending true/false
     * @return \AdminbarPostMenus
     */
    public function set_display_pending($display_pending) {
        $this->display_pending = $display_pending;
        return $this;
    }

    /**
     * Display Draft post
     * @param bool $display_draft true/false
     * @return \AdminbarPostMenus
     */
    public function set_display_draft($display_draft) {
        $this->display_draft = $display_draft;
        return $this;
    }

    /**
     * Set your post types
     * @param array $post_types array('post' => 'Posts', 'page' => 'Pages')
     * @return \AdminbarPostMenus
     */
    public function set_post_types($post_types) {
        $this->post_types = $post_types;
        return $this;
    }

    /**
     * Set the number of menu items to displas
     * @param init $list_count - 5
     * @return \AdminbarPostMenus
     */
    public function set_list_count($list_count) {
        $this->list_count = $list_count;
        return $this;
    }

    /**
     * factory pattern
     * @return type
     */
    public static function add_menus() {
        $apm = new AdminbarPostMenus();
        return $apm;
    }

    public function __construct() {

    }

    /**
     * Create the nodes
     */
    public function nodes() {


        foreach ($this->post_types as $post_type => $title) {
            // TODO localize note titles
            // man I really hate localization
            if ($this->display_published):
                /** Display published pages * */
                Ext_Post_Menus::add()->set_node_id($post_type . '_menu')->set_node_title(ucfirst($title))
                        ->set_parent_url(trailingslashit(admin_url())  . 'edit.php?post_type=' . $post_type)->set_items($this->list_count)->set_post_type($post_type)->menu_data($post_type);
            endif;


            if ($this->display_schedule):
                Ext_Post_Menus::add()->set_node_id($post_type . '_schedule')->set_node_parent($post_type . '_menu')
                        ->set_items($this->list_count)->set_node_title('Scheduled')->set_post_type($post_type)
                        ->menu_data($post_type, 'future');
            endif;


            if ($this->display_pending):
                Ext_Post_Menus::add()->set_node_id($post_type . '_pending')->set_node_parent($post_type . '_menu')
                        ->set_node_title('Pendings')->set_post_type($post_type)->menu_data($post_type, 'pending');
            endif;

            if ($this->display_draft):
                Ext_Post_Menus::add()->set_node_id($post_type . '_draft')->set_node_parent($post_type . '_menu')
                        ->set_items($this->list_count)->set_node_title('Drafts')
                        ->set_post_type($post_type)->menu_data($post_type, 'draft');
            endif;
        }
    }

}