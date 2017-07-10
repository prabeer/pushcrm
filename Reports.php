<?php include_once 'head.php';?>
<?php include_once 'header.main.php';?>
<?php include_once 'XLSXWriter/xlsxwriter.class.php';?>
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
				<?php
				
if ($report_type == 'IMEI') {
					$report_type = 'IMEI Wise Package List';
					$query = 'SELECT distinct(IMEI) IMEI, count(*) package_count FROM weattach_crm.imei_wise_package_list group by IMEI limit 100;';
					$data = $report_db->query_result ( $query );
					?>
				 	
				<section class="module module-headings">
					<div class="module-inner">
						<div class="module-heading">
							<h3 class="module-title"><?php echo $report_type;?></h3>
							<ul class="actions list-inline" >
							<li><a herf="#"><button type="button" class="btn btn-primary">Download</button></a></li>
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
												<th>IMEI</th>
												<th>Package Count</th>
											</tr>
										</thead>
										<tbody>
<?php
					
foreach ( $data as $d ) {
						echo '<tr><td></td><td>' . $d ['IMEI'] . '</td><td>' . $d ['package_count'] . '</td>';
					}
					?>

										</tbody>
									</table>
								</div>

							</div>

						</div>

					</div>

				</section>
				<?php
				} else {
					echo 'No report selected';
				}
				?>

			</div>

		</div>
	</div>
</div>
<?php include_once 'footer.php';?>

