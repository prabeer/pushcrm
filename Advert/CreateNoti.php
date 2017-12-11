<div
	class="module-wrapper masonry-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<section class="module">
		<div class="module-inner">
		<?php
if (isset($_GET['r'])) {
    if ($_GET['r'] == 'success') {
        ?>
				    <div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Success!</strong>
				Campaign loaded successfully.
			</div>
				    <?php
    } elseif ($_GET['r'] == 'fail') {
        ?>
           <div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a> <strong>Failed!</strong>
				Campaign Not Loaded.
			</div>
        
        <?php
    }
}
?>
			<div class="module-heading">
				<h3 class="module-title">Create Notification</h3>
				<ul class="actions list-inline">
					<li><a class="collapse-module" data-toggle="collapse"
						href="#content-12" aria-expanded="false"
						aria-controls="content-12"><span aria-hidden="true"
							class="icon arrow_carrot-up"></span></a></li>
					<li><a class="close-module" href="#"><span aria-hidden="true"
							class="icon icon_close"></span></a></li>
				</ul>
			</div>
<?php include_once 'listProjects.php';?>
			<div class="module-content collapse in" id="content-12">
				<div class="module-content-inner">
					<div class="form-horizontal">
						<div id="target">
							<form action="Advert/NotificationSubmit.php" method="post"
								enctype="multipart/form-data" id="inventry_form">
								<div class="form-group">
									<label class="col-sm-3 control-label">Campaign Name </label>
									<div class="col-sm-9">
										<input type="text" name="camp_name" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select Modals:</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="checkbox">
												<label><input type="checkbox" value="modals" name="list[]">Modals</label>
											</div>

										</div>
										<div class="col-sm-6">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_list_modals" id="inventry_type">
												<option value="%">--Select All Modals--</option>
												<?php
            foreach (getModalList() as $modal) {
                echo '<option value="' . $modal['modal_name'] . '">' . $modal['modal_name'] . '</option>';
            }
            ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_flag_modal" id="inventry_type">
												<option value="OR">OR</option>
												<option value="AND">AND</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select Region:</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="checkbox">
												<label><input type="checkbox" value="region" name="list[]">Region</label>
											</div>

										</div>
										<div class="col-sm-6">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_list_region" id="inventry_type">
												<option value="%">--Select All Region--</option>
												<?php
            foreach (getStateList() as $modal) {
                echo '<option value="' . $modal['modal_name'] . '">' . $modal['modal_name'] . '</option>';
            }
            ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_flag_region" id="inventry_type">
												<option value="OR">OR</option>
												<option value="AND">AND</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select Operator:</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="checkbox">
												<label><input type="checkbox" value="oper" name="list[]">Operator</label>
											</div>

										</div>
										<div class="col-sm-6">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_list_oper" id="inventry_type">
												<option value="%">--Select All Operator--</option>
												<?php
            foreach (getOperatorList() as $modal) {
                echo '<option value="' . $modal['modal_name'] . '">' . $modal['modal_name'] . '</option>';
            }
            ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_flag_oper" id="inventry_type">
												<option value="OR">OR</option>
												<option value="AND">AND</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select Filters:</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="checkbox">
												<label><input type="checkbox" value="filter" name="list[]">Filters</label>
											</div>

										</div>
										<div class="col-sm-6">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_list_filter" id="inventry_type">
												<option value="%">--Select All Filters--</option>
													<?php
            foreach (getFilterList() as $modal) {
                echo '<option value="' . $modal['modal_name'] . '">' . $modal['modal_name'] . '</option>';
            }
            ?>
											</select>
										</div>
										<div class="col-sm-3">
											<select class="chosen form-control"
												data-placeholder="Choose a Inventry Type"
												name="select_flag_filter" id="inventry_type">
												<option value="OR">OR</option>
												<option value="AND">AND</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select IMEI:</label>
									<div class="col-sm-9">
										<div class="col-sm-3">
											<div class="checkbox">
												<label><input type="checkbox" value="imei" name="list[]">IMEI</label>
											</div>

										</div>
										<div class="col-sm-6">

											<div class="col-sm-9">
												<textarea rows="6" cols="40"
													style="border: solid lightgrey 1px;" name="IMEI"></textarea>
											</div>
										</div>
										<div class="col-sm-3"></div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Campaign Duration</label>
									<div class="col-sm-9">
										<div
											class="input-daterange input-group input-group-icon-click"
											id="datepicker5">
											<input type="text" class=" form-control" name="start"
												value="<?php echo date("m/d/Y") ?>"> <span
												class="input-group-addon">to</span> <input type="text"
												class="form-control" name="end"
												value="<?php echo date("m/d/Y" , strtotime( date("m/d/Y"). ' +1 month')) ?>">
										</div>
									</div>
								</div>
								<hr>

								<div class="form-group">
									<label class="col-sm-3 control-label">Notification Header </label>
									<div class="col-sm-9">
										<input type="text" name="noti_head" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Notification Banner</label>

									<div class="col-sm-9">
										<input name="banner" type="file" class="file-loading">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Notification Link</label>
									<div class="col-sm-9">
										<input name="noti_link" type="text" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Notification Description</label>
									<div class="col-sm-9">
										<textarea rows="6" cols="40"
											style="border: solid lightgrey 1px;" name="noti_desc"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Select Notification Icon</label>
									<div class="col-sm-9">
										<input name="icon" type="file" class="file-loading">
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