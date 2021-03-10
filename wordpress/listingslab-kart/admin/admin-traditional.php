<?php

function advicator_register_settings() {
   add_option( 'advicator_enabled', true );
   register_setting( 
    'advicator_options_group', 
    'advicator_enabled', 
    'advicator_callback' );

  add_option( 'advicator_affiliateId', 'XYZ-123' );
   register_setting( 
    'advicator_options_group', 
    'advicator_affiliateId', 
    'advicator_callback' );
}
add_action( 'admin_init', 'advicator_register_settings' );

add_action('admin_menu', 'advicator_plugin_setup_menu');
function advicator_plugin_setup_menu(){
    add_menu_page( 
        'Advicator', 
        'Advicator', 
        'manage_options', 
        'advicator', 
        'advicator_admin',
        plugin_dir_url(__DIR__) . 'public/png/advicator_admin.png',
        2
    );
}

function advicator_admin(){
    $fields = array(
                'name', 
                'description', 
                'wpurl', 
                'url', 
                'admin_email', 
                'charset', 
                'version', 
                'html_type', 
                'language'
            );
    $data = array();
    foreach($fields as $field) {
        $data[$field] = get_bloginfo($field);
    }
    echo '<div class="traditional">';
    
    echo '<img src="' . plugin_dir_url(__DIR__) . 'public/png/advicator_wordpress_plugin.png' . '" />';
    echo '<form method="post" action="options.php">';
   

    echo settings_fields( 'advicator_options_group' );

    echo '<div class="traditional-field">';
    echo '<h3>Enable PWA ';
    echo '<input type="checkbox" name="advicator_enabled" value="1" ' . checked( 1, get_option( 'advicator_enabled' ), false ) . ' /></h3>';
    echo '</div>';

    echo '<div class="traditional-field">';
    echo '<h3>advicator_affiliateId';
    echo '<input type="text" name="advicator_affiliateId" value="' . get_option( 'advicator_affiliateId' ) . '" /></h3>';

    echo submit_button();
    echo '</form>';

    
    echo '<div class="footer">';

    echo '<a href="/" target="_self">Home</a>';

    echo '&nbsp;|&nbsp;';
     echo '<a href="https://listingslab.com" target="_blank">Listingslab</a>';
    
    echo '&nbsp;|&nbsp;';
    echo '<a href="https://github.com/listingslab-software/advicator/pull/10" target="_blank">GitHub</a>';

    echo '</div>';  


    echo '</div>';    

}
