<?php 

/**
 * Add Metaboxx
 */
function myplugin_add_invoice_metaboxes() {
    add_meta_box(
        'myplugin_invoice_metabox_id',
        'invoice Options',
        'myplugin_invoice_metaboxes_template',
        'invoice'
    );
}
add_action( 'add_meta_boxes', 'myplugin_add_invoice_metaboxes' );

/**
 * Metabox Template
 */
function myplugin_invoice_metaboxes_template($post) {

   
    $invoice       = get_post_meta( $post->ID, '_myplugin_invoice_invoice', true );
    $invoice_phone = get_post_meta( $post->ID, '_myplugin_invoice_phone', true );
    $invoice_email = get_post_meta( $post->ID, '_myplugin_invoice_email', true );

    ?>

    
    <table class="form-table" style="width: 76%;">
        
 
        <tr>
            <td>Address: </td>
            <td>
            <textarea  class="large-text" name="myplugin_invoice_invoice" value="<?php echo myplugin_get_invoice_metavalues($invoice); ?>"rows="10"></textarea>
                
            </td>
        </tr> 

        <tr>
            <td>Phone: </td>
            <td>
            <input  class="regular-text" type="text"  name="myplugin_invoice_phone" value="<?php echo myplugin_get_invoice_metavalues($invoice_phone); ?>">
            
                
            </td>
        </tr> 
        <tr>
            <td>Email: </td>
            <td>
            <input  class="regular-text" type="email"  name="myplugin_invoice_email" value="<?php echo myplugin_get_invoice_metavalues($invoice_email); ?>">
            
                
            </td>
        </tr> 
        
    </table>
    <?php
}

/**
 * Save metabox values
 */
function myplugin_save_move_metabox_values($post_id) {

    
    if( isset($_POST['myplugin_invoice_invoice']) ) {
        update_post_meta( $post_id, '_myplugin_invoice_invoice', sanitize_text_field($_POST['myplugin_invoice_invoice']) );
    }
    if( isset($_POST['myplugin_invoice_phone']) ) {
        update_post_meta( $post_id, '_myplugin_invoice_phone', sanitize_text_field($_POST['myplugin_invoice_phone']) );
    }
    if( isset($_POST['myplugin_invoice_email']) ) {
        update_post_meta( $post_id, '_myplugin_invoice_email', sanitize_text_field($_POST['myplugin_invoice_email']) );
    }
   
}
add_action('save_post', 'myplugin_save_move_metabox_values');

/**
 * Get the invoice metavalues
 */
function myplugin_get_invoice_metavalues($value) {
    if( isset($value) && ! empty($value) ) {
        return $value;
    }else {
        return '';
    }
}
