<?php include_once 'head.php';?>
<?php include_once 'header.main.php';?>
	<?php
	
	include_once 'sidebar.main.php';
	$report_db = new database ( 'VIEW' );
	if (isset ( $_GET ['re'] )) {
		$report_type = xssafe ( $_GET ['re'] );
	} else {
		$report_type = "";
	}

	?>
<div id="content-wrapper" class="content-wrapper view">
	<div class="container-fluid">
		<h2 class="view-title">Reports</h2>
		<div id="masonry" class="row">
			<div
				class="module-wrapper masonry-item col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<section class="module module-headings">
					<div class="module-inner">
						<div class="module-heading">
							<h3 class="module-title"><?php echo $report_type;?></h3>
							<ul class="actions list-inline">
								<li><a class="collapse-module" data-toggle="collapse"
									href="#content-4" aria-expanded="false"
									aria-controls="content-4"><span aria-hidden="true"
										class="icon arrow_carrot-up"></span></a></li>
								<li><a class="close-module" href="#"><span aria-hidden="true"
										class="icon icon_close"></span></a></li>
							</ul>

						</div>

						<div class="module-content collapse in" id="content-4">
							<div class="module-content-inner no-padding-bottom">
								<div class="table-responsive">

									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Report Name</th>
												<th>Report Module</th>
												<th>Generate</th>
											</tr>
										</thead>
										<tbody>
										
										
										</tbody>
									</table>
								</div>

							</div>

						</div>

					</div>

				</section>

			</div>
			
		</div>
	</div>
</div>
<?php include_once 'footer.php';?>

