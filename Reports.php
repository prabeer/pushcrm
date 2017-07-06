<?php include_once 'head.php';?>
<?php include_once 'header.main.php';?>
	<?php
	
	include_once 'sidebar.main.php';
	$report_db = new database ( 'VIEW' );
	if (isset ( $_GET ['report_type'] )) {
		$report_type = xssafe ( $_GET ['report_type'] );
	} else {
		$report_type = "";
	}
	if (! is_empty ( $report_type )) {
		
		$query = 'select S_NO, Report_Name, Report_page_query,  Reports_type, Reports_method, Reports_format from Reports_list where Reports_type = :Reports_type;';
		$condition = [ 
				'Reports_type' => $report_type 
		];
		$all_reports = $report_db->query_result ( $query, $condition );
		if (count ( $results ) > 0) {
		} else {
			$query = 'select S_NO,Report_Name, Report_page_query,  Reports_type, Reports_method, Reports_format from Reports_list;';
			$all_reports = $report_db->query_result ( $query );
		}
	} else {
		$query = 'select S_NO, Report_Name, Report_page_query,  Reports_type, Reports_method, Reports_format from Reports_list;';
		$all_reports = $report_db->query_result ( $query );
		$report_type = "All Reports";
	}
	?>
<div id="content-wrapper" class="content-wrapper view">
	<div class="container-fluid">
		<h2 class="view-title">Reports</h2>
		<div id="masonry" class="row">
			<div
				class="module-wrapper masonry-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
										<?php
										if (count ( $all_reports ) > 0) {
											$i = 1;
											foreach ( $all_reports as $reports ) {
												// echo $reports ['Reports_method'];
												if (($reports ['Reports_method']) == 'query') {
													?>
											<tr>
												<th scope="row"><?php echo $i;?></th>
												<td><a
													href="report_xlsx.php?id=<?php echo encryptor('encrypt', xssafe($reports['S_NO']))?>"
													target="_blank" class="rep"><?php echo $reports['Report_Name'];?></a></td>
												<td><?php echo $reports['Reports_type'];?></td>
												<td><a
													href="report_xlsx.php?id=<?php echo encryptor('encrypt', xssafe($reports['S_NO']))?>" target="_blank" class="rep" id="<?php echo xssafe($reports['S_NO'])?>">Generate File</a></td>
											</tr>
											<?php
													$i ++;
												}
											}
										} else {
											?>
											<td colspan="3">No data Found</td>
										<?php }?>
										
										</tbody>
									</table>
								</div>

							</div>

						</div>

					</div>

				</section>

			</div>
			<div
				class="module-wrapper masonry-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<section class="module module-headings">
					<div class="module-inner">
						<div class="module-heading">
							<h3 class="module-title"><?php echo 'Custom Reports';?></h3>
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
												<th>Select Module</th>
											</tr>
										</thead>
										<tbody>
										<?php
										foreach ( $all_reports as $reports ) {
											if (($reports ['Reports_method']) == 'page') {
												?>
											<tr>
												<th scope="row"><?php echo $i;?></th>
												<td><a
													href="reports/<?php echo $reports['Report_page_query'];?>"><?php echo $reports['Report_Name'];?></a></td>
												<td><?php echo $reports['Reports_type'];?></td>
											</tr>
											<?php
												$i ++;
											}
										}
										?>

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

