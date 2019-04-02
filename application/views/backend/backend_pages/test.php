 for( $i=1 ; $i<= 5; $i++ )
         { 
			 
			 if($i <=  $star_count)
			 {
          ?>
			
         
            <li class='star selected' data-value='<?php echo $i ?>'>
              <i class='fa fa-star fa-fw'></i>
            </li>

           <?php  }
           else
           { ?>
			   <li class='star' data-value='<?php echo $i ?>' >
              <i class='fa fa-star fa-fw'></i>
            </li>
		    <?php } 
		    }?>
