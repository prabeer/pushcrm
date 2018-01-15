<?php include_once 'head.php';?>
<?php include_once 'header.main.php';?>
<?php include_once 'XLSXWriter/xlsxwriter.class.php';?>
	<?php

include_once 'sidebar.main.php';
$report_db = new database('VIEW');
if (isset($_GET['re'])) {
    $report_type = xssafe($_GET['re']);
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
				<!-- Modal -->
				<?php include_once 'ReportCreator/reportViewer.php';
				$rep = new reportViewer($report_type, null);
				$rep->ViewReport();
				?>
			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog modal-sm">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Download Report</h4>
							</div>
							<div class="modal-body">
								<p>
									<a href="#" id="link" download>Download</a>
								</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default"
									data-dismiss="modal">Close</button>
							</div>
						</div>

					</div>
				</div>
<?php include_once 'footer.php';?>

