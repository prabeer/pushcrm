<div
	class="module-wrapper masonry-item col-lg-8 col-md-8 col-sm-12 col-xs-12">
	<section class="module">
		<div class="module-inner">
			<div class="module-heading">
				<h3 class="module-title">Create New Filter</h3>
				<ul class="actions list-inline">
					<li><a class="collapse-module" data-toggle="collapse"
						href="#content-12" aria-expanded="false"
						aria-controls="content-12"><span aria-hidden="true"
							class="icon arrow_carrot-up"></span></a></li>
					<li><a class="close-module" href="#"><span aria-hidden="true"
							class="icon icon_close"></span></a></li>
				</ul>
			</div>

			<div class="module-content collapse in" id="content-12">
				<div class="module-content-inner">
					<div class="form-horizontal">
						<div id="target">
							<form action="Advert/NotificationSubmit.php" method="post"
								enctype="multipart/form-data" id="inventry_form">
								<div class="form-group">
									<label class="col-sm-3 control-label">Filter Name</label>
									<div class="col-sm-9">
										<input type="text" name="filter_name" class="form-control" />
									</div>
								</div>

								<div class="module-content collapse in" id="content-12">
									<div class="module-content-inner">
										<div class="table-responsive">

											<table class="table table-condensed">
												<thead>
													<tr>
														<th>Service Name</th>
														<th>Condition</th>
													</tr>
												</thead>
												<tbody>

												</tbody>
											</table>

										</div>

									</div>

								</div>


								<div class="form-group">
									<label class="col-sm-3 control-label"></label>
									<div class="col-sm-9">
										<button class="btn btn-warning" data-toggle="modal"
											data-target="#modal-new-project" type="reset">Cancel</button>
										&nbsp&nbsp&nbsp&nbsp
										<button class="btn btn-success" data-toggle="modal"
											data-target="#modal-new-project" type="submit">Save</button>
									</div>
								</div>
							</form>
						</div>

					</div>

				</div>

			</div>
	
	</section>
</div>