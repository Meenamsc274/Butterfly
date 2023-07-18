<script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
	
<script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>

<script src="assets/plugins/dataTables/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/dataTables/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/dataTables/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/dataTables/js/responsive.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $(".cart-expand").hide();
    });
    $(".appicon").click(function(e) {
      $(".cart-expand").toggle();
      e.stopPropagation();
    });
    $(".cart-expand").click(function(e) {
      e.stopPropagation();
    });
    $(document).click(function() {
      $(".cart-expand").hide();
    });
  </script>


