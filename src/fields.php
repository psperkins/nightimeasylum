<?php


add_action( 'cmb2_admin_init', 'nightime_register_presskit_url' );

function nightime_register_presskit_url() {
    $nta_cmb = new_cmb2_box( array(
        'title'         => __( 'Press Kit', 'cmb2' ),
        'id'            => 'presskit_metabox',
        'object_types'  => array( 'client', ),
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true,
        'desc' => __( 'field description (optional)', 'cmb2' ),
    ));

    //echo "<pre>"; // var_dump($cmb); //die();

    $nta_cmb->add_field( array(
        'name' => __( 'Press kit URL', 'cmb2' ),
        'id'   => 'presskit_url',
        'type' => 'text_url',
        'protocols' => array( 'http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet' ), // Array of allowed protocols
    ) );
}