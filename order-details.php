<?php
include "dbc.php";
page_protect(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <?php include 'assets/common/css_file.php';?> <?php include 'assets/common/js_file.php';?> <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> <section class="side-bar">
        <div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
            <div class="container">
              <div class="content-3" id="order-detail">
                <div class="single-order-detail">
                  <!-- table start-->
                  <table class="table">
                    <tr>
                      <th>S.No</th>
                      <th>Product</th>
                      <th>Product Name</th>
                      <th>Select Color Varient</th>
                      <th>Product Count in Liter</th>
                      <th></th>
                      <th>Total</th>
                      <th>Clear</th>
                    </tr>
                    <?php for($i=1;$i<6;$i++) { ?>
                    <tr id="order_<?php echo $i; ?>">
                      <td class="pro-no"><?php echo $i; ?></td>
                      <td class="pro_img">
                        <div class="ord-img">
                          <img src="assets/img/product/pro-01.jpg" class="" alt="...">
                        </div>
                      </td>
                      <td class="pro-name">
                        <p>Butterfly Paints 0981 White[0981]</p>
                      </td>
                      <td class="pro-select">
                        <div class="">
                          <form action="/action_page.php">
                            <select class="form-select" aria-label="Default select example">
                              <option value="White">0981 White[0981]</option>
                              <option value="White">0982 White[0982]</option>
                              <option value="White">0983 White[0983]</option>
                              <option value="White">0984 White[0984]</option>
                              <option value="White">0985 White[0985]</option>
                            </select>
                          </form>
                        </div>
                      </td>
                      
                      <td class="pro-count">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="single-amt">
                              <span>20LT</span>
                              <input type="text" id="20_L_<?php echo $i; ?>" value=" " onchange="total_li(<?php echo $i; ?>)" class="form-control">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="single-amt">
                              <span>10LT</span>
                              <input type="text" id="10_L_<?php echo $i; ?>" value=" " onchange="total_li(<?php echo $i; ?>)" class="form-control">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="single-amt">
                              <span>4LT</span>
                              <input type="text" id="4_L_<?php echo $i; ?>" value=" " onchange="total_li(<?php echo $i; ?>)" class="form-control">
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="single-amt">
                              <span>1LT</span>
                              <input type="text" id="1_L_<?php echo $i; ?>" value=" " onchange="total_li(<?php echo $i; ?>)" class="form-control">
                            </div>
                          </div>
                        </div>
                      </td>
                      <td></td>
                      <td>
                        <div class="single-amt">
                          <span>TOTAL</span>
                          <input type="text" id="total_<?php echo $i; ?>" class="line_total form-control ">
                        </div>
                      </td>
                      <td id="close_<?php echo $i; ?>" class="close">
                        <div class="">
                          <a href="#">
                            <i class="fa fa-close"></i>
                          </a>
                        </div>
                      </td>
                    </tr>
                    <?php } ?>
                  
                  </table>
                  <!-- table end-->
                  <div class="row  text-end">
				  <div class="col-lg-4"></div>
				    <div class="col-lg-6"><h5>Total:&nbsp;&nbsp;<span id="final_total"></span></h5><br></div>
					<div class="col-lg-2"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3"></div>
                    <div class="col-lg-3">
                      <div class="place-order">
                        <a class="clear" href="#">Clear All</a>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="place-order">
                        <button type="button" class="btn">Add To Cart</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
      <!--body content end--> <?php include 'assets/common/footer.php';?>
    </div>
    <!----header----->
  </body>
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
  <script>

	 
  
    $(document).ready(function() {
      $(".clear").click(function() {
        $(".single-order-detail").remove();
      });
    });
	
$(document).ready(function(){
    $(".close").click(function(){
        var id = $(this).attr("id");
		let last_string = id.substr(-1);
		var element="order_"+last_string;
		//alert(res+" "+element);
//element.remove();
      $("#"+element).remove();
    });
});

function total_li(id){
    var li_20 = $("#20_L_"+id).val();
    var m_20 = li_20*20;
    
    var li_10 = $("#10_L_"+id).val();
    var m_10 = li_10*10;
    
    var li_4 = $("#4_L_"+id).val();
    var m_4 = li_4*4;
    
    var li_1 = $("#1_L_"+id).val();
    var m_1 = li_1*1;
    
    var toal = m_20+m_10+m_4+m_1;
    
    $("#total_"+id).val(toal);
	update_total();
}
	function update_total(){
    var sum = 0;
    $('.line_total').each(function() {
        sum += Number($(this).val());
    });
	   $("#final_total").text(sum); 
	//alert("hi");
};

	
  </script>
 
</html>