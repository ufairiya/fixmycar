
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    
 <script src="<?php echo $base_url?>assets/js/jquery.twbsPagination.js" type="text/javascript"></script>
<div class="wrapper">
  <div class="container">
    <?php $order_details = $this->db->query("SELECT * FROM order_details where id=390 and star_count!='' ")->result_array();

echo count($order_details);

    ?>
    <div class="row">
      <div class="col-sm-12">
        <h1>jQuery Pagination</h1>
        <p>Simple pagination using the TWBS pagination JS library. Click the buttons below to navigate to the appropriate content</p>
        <ul id="pagination-demo" class="pagination-sm"></ul>
      </div>
    </div>

    <div id="page-content" class="page-content">Page 1</div>
  </div>
</div>
<script type="text/javascript">
  $('#pagination-demo').twbsPagination({
        totalPages: 16,
        visiblePages: 6,
        next: 'Next',
        prev: 'Prev',
        onPageClick: function (event, page) {
            //fetch content and render here
            $('#page-content').text('Page ' + page) + ' content here';
        }
    });
</script>