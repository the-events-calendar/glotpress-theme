<?php

class TEC_Child_Theme extends GP_Plugin {
    public $id = 'child_theme';
    private $child_path;

    public function __construct() {
        parent::__construct();

        $this->add_action( 'plugins_loaded' );
        $this->add_filter( 'tmpl_load_locations', array( 'args' => 4 ) );
        $this->add_filter( 'export_locale', array( 'args' => 2 ) );

        $url = gp_url_public_root();
        wp_enqueue_script( 'tec', $url . '/plugins/tec-theme/templates/js/tec.js', array( 'jquery' ) );

        if ( is_object ) {
            GP::$translation->per_page = 30;
        }
    }

    public function plugins_loaded() {
        $this->child_path = dirname( __FILE__ ) . '/templates/';
    }

    public function tmpl_load_locations( $locations, $template, $args, $template_path ) {
        array_unshift( $locations, $this->child_path );

        return $locations;
    }

    public function export_locale( $slug, $locale ) {
        return $locale->wp_locale;
    }
}

GP::$plugins->child_theme = new TEC_Child_Theme;
