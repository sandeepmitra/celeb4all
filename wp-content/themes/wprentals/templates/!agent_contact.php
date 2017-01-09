<?php
global $agent_email;
global $propid;
?>
                        
<div class="agent_contanct_form">
    <h4 id="show_contact" class="panel-title panel-title-agent"><?php esc_html_e('Contact Me', 'wpestate'); ?></h4>
    <div class="alert-box error">
        <div class="alert-message" id="alert-agent-contact"></div>
    </div> 

 
    <p class="third-form calendar_icon ">
        <label for="booking_from_date"><?php esc_html_e('Check In','wpestate');?></label>
        <input type="text" id="booking_from_date" size="40" name="booking_from_date" class="form-control" value="">
    </p>

    <p class="third-form calendar_icon ">
        <label for="booking_to_date"><?php esc_html_e('Check Out','wpestate');?></label>
        <input type="text" id="booking_to_date" size="40" name="booking_to_date" class="form-control" value="">
    </p>

    <p class="third-form last-third">

        <label for="booking_guest_no"><?php esc_html_e('Guests No','wpestate');?></label>
        <select id="booking_guest_no"  name="booking_guest_no"  class="cd-select form-control" >
            <option value="1">1 <?php esc_html_e('Guest','wpestate');?></option>
            <?php 
                for ($i = 2; $i <= 14; $i++) {
                    print '<option value="'.$i.'">'.$i.' '.esc_html__( 'Guests','wpestate').'</option>';
                }
            ?>
        </select>    
    </p>

                            
    <textarea id="agent_comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true" placeholder="<?php esc_html_e('Your Message', 'wpestate'); ?>" ></textarea>	
   
    <input type="submit" class="wpb_btn-info wpb_btn-small wpestate_vc_button  vc_button"  id="agent_submit" value="<?php esc_html_e('Send Message', 'wpestate'); ?>">
    
    <input name="prop_id" type="hidden"  id="agent_property_id" value="<?php echo $propid;?>">
    <input name="agent_email" type="hidden"  id="agent_email" value="<?php print $agent_email; ?>">
    <input type="hidden" name="contact_ajax_nonce" id="agent_property_ajax_nonce"  value="<?php echo wp_create_nonce( 'ajax-property-contact' );?>" />

</div>