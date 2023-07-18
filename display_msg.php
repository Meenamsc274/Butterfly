<div class="container-fluid">
							<?php foreach($msg as $new_msg){ ?>
                            <div class="alert alert-dismissable alert-success">
								<i class="fa fa-check"></i>&nbsp; <?php echo $new_msg; ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
							<?php } ?>
							<?php foreach($err as $new_err){ ?>
							<div class="alert alert-dismissable alert-danger">
								<i class="fa fa-close"></i>&nbsp; <?php echo $new_err; ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
							<?php } ?>
							<?php
							$msg = mysqli_real_escape_string($link,$_GET['msg']);
							$err = mysqli_real_escape_string($link,$_GET['err']);
							?>
							</div>
							<div class="container-fluid">
							<?php if($msg != ""){ ?>
                            <div class="alert alert-dismissable alert-success">
								<i class="fa fa-check"></i>&nbsp; <?php echo $msg; ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
							<?php } ?>
							<?php if($err != ""){ ?>
							<div class="alert alert-dismissable alert-danger">
								<i class="fa fa-close"></i>&nbsp; <?php echo $err; ?>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							</div>
							<?php } ?>
							</div>