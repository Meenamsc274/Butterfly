<?php
include "dbc.php";
page_protect(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Butterfly Paint - Store Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> <?php include 'assets/common/css_file.php';?> <?php include 'assets/common/js_file.php';?>
  </head>
  <body>
    <div class="page-wrapper"> <?php include 'assets/common/header.php';?> <section class="side-bar">
        <div class="row"> <?php include 'assets/common/left-sidebar.php';?> <div class="col-lg-10">
            <div class="container">
              <div class="content-1">
                <div class="col-lg-12">
                  <div style="height:400px;"></div>
                </div>
              </div>
              <div class="content-2">
                <div class="content-2-detail">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="sale ">
                        <div class="sale-amt blue">
                          <div class="sale-amt-dtl">
                            <div class="rs">
                              <h3>Rs. 0</h3>
                            </div>
                            <div class="today">
                              <p>Today's Sales!</p>
                            </div>
                          </div>
                        </div>
                        <div class="view-dtl blue-bar">
                          <span>View Details</span>
                          <p>0</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="sale-amt risk text-center">
                        <img src="assets/img/risk.jpg">
                        <p class="text-center">RISKOMETER</p>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="sale ">
                        <div class="sale-amt yellow">
                          <div class="sale-amt-dtl">
                            <div class="rs">
                              <h3>Rs. 0</h3>
                            </div>
                            <div class="today">
                              <p>Today's Expanses!</p>
                            </div>
                          </div>
                        </div>
                        <div class="view-dtl yellow-bar">
                          <span>View Details</span>
                          <p>0</p>
                        </div>
                      </div>
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
</html>