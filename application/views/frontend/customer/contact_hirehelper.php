 <div class="modal-header">
        <button type="button" class="close contact_mover_customer_close" >&times;</button>
        <h3>ORDER #<?php echo $order_id;?></h3>
      </div>
      <div class="modal-body">
        
                <h5 class="contact_heading_style">CONTACT HIREAMOVER ABOUT THIS ORDER</h5>
                <input type="hidden" name="order_id" class="order_id_valurs" value="<?php echo $order_id; ?>">
                <input type="hidden" name="user_email" class="user_email" value="<?php echo $b_email; ?>">
                <input type="hidden" name="user_name" class="user_name" value="<?php echo $b_First_name; ?>">
                <input type="hidden" name="booked_mover_id" class="booked_mover_id" value="<?php echo $booked_mover_id;?>">
                <select class="form-control reason_for_contact" name="reason_for_contact">
                  <option value="">Please select a reason......</option>
                  <option value="Cancel for customer">Cancel for customer</option>
                  <option value="Cancel for myself">Cancel for myself</option>
                  <option value="Change date/arrival times">Change date/arrival times</option>
                  <option value="Can't reach mover">Can't reach mover</option>
                  <option value="get paid">get paid</option>
                  <option value="other">other</option>
                </select>
                
                <textarea cols="5" rows="7" name="description_for_contact" class="form-control description_for_contact"></textarea>
                
                  
                  
                
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn  contact_mover_customer_close">Close</button>
          <button type="button" class="btn mail_to_hiremover ">Send Message</button>
        </div>
     