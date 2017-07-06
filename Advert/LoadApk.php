<div
	class="module-wrapper masonry-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<section class="module">
		<div class="module-inner">
			<div class="module-heading">
				<h3 class="module-title">Upload Apk</h3>
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
							<form action="Advert/InstallApkSubmit.php" method="post"
								enctype="multipart/form-data" id="inventry_form">
								<div class="form-group">
									<label class="col-sm-3 control-label">Campaign Name </label>
									<div class="col-sm-9">
										<input type="text" name="camp_name" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select Type:</label>
									<div class="col-sm-9">
										<select class="chosen form-control"
											data-placeholder="Choose a Inventry Type"
											style="width: 240px;" name="method_type" id="inventry_type">
											<option value="">Please select</option>
											<option value="Project">Project</option>
											<option value="Region">Region</option>
											<option value="Oper">Operator</option>
											<option value="IMEI">IMEI</option>

										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Select List:</label>
									<div class="col-sm-9">
										<select class="chosen form-control"
											data-placeholder="Choose a Inventry Type"
											style="width: 240px;" name="select_list" id="inventry_type">
											<option value="">Please Project</option>
											<option value="Project">Project1</option>
											<option value="Region">Project2</option>
											<option value="Oper">Project3</option>
											<option value="IMEI">Project4</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Campaign Duration</label>
									<div class="col-sm-9">
										<div
											class="input-daterange input-group input-group-icon-click"
											id="datepicker5">
											<input type="text" class=" form-control" name="start"
												value="<?php echo date("m/d/Y") ?>"> <span class="input-group-addon">to</span>
											<input type="text" class="form-control" name="end"
												value="<?php echo date("m/d/Y" , strtotime( date("m/d/Y"). ' +1 month')) ?>">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">IMEI list</label>
									<div class="col-sm-9">
										<textarea rows="6" cols="40"
											style="border: solid lightgrey 1px;"
											name="IMEI"></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label"> Select APK</label>
									<div class="col-sm-9">
										<input id="input-709" name="input-709" type="file" class="file-loading">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-3 control-label">Package Name </label>
									<div class="col-sm-9">
										<input type="text" name="pkg_name" class="form-control" />
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
									<label class="col-sm-3 control-label">Notification Description</label>
									<div class="col-sm-9">
										<textarea rows="6" cols="40"
											style="border: solid lightgrey 1px;"
											name="noti_desc"></textarea>
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