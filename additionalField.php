add_action( 'woocommerce_review_order_before_submit', 'additional_refund_checkbox', 10 );
/**
 * Add WooCommerce additional Checkbox checkout field
 */
function additional_refund_checkbox() {
   
    woocommerce_form_field( 'checkout_checkbox', array( // CSS ID
       'type'          => 'checkbox',
       'class'         => array('form-row mycheckbox'), // CSS Class
       'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
       'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
       'required'      => true, // Mandatory or Optional
       'label'         => 'I understand and accept that in the case of refunds the delivery costs will be paid by me, the client.', // Label and Link
    ));    
}

add_action( 'woocommerce_checkout_process', 'additional_refund_checkbox_warning' );
/**
 * Alert if checkbox not checked
 */ 
function additional_refund_checkbox_warning() {
    if ( ! (int) isset( $_POST['checkout_checkbox'] ) ) {
        wc_add_notice( __( 'Please, accept the refund policy' ), 'error' );
    }
}
