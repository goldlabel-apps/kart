<?php

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
    echo '<script>';
        echo 'var wpBloginfo=' . json_encode($data) . '; ';
    echo '</script>';
    $html = file_get_contents(plugin_dir_path( __DIR__ ) . 'advicator/react/wp-advicator/build/index.html');
    $html = str_replace('href="/static', 'href="'. plugin_dir_url( __DIR__ ) .
        'advicator/react/wp-advicator/build/static', $html);
    $html = str_replace('src="/static', 'src="'. plugin_dir_url( __DIR__ ) .
        'advicator/react/wp-advicator/build/static', $html);
    echo $html;
}
