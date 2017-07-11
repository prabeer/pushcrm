<div id="content-wrapper" class="content-wrapper view">
	<div class="container-fluid">
		<h2 class="view-title">Add Projects</h2>
		<div id="masonry" class="row">
			<div class="col-wrapper col-lg-8 col-md-7 col-sm-12 col-xs-12">
				<section class="module module-headings">
					<div class="module-inner">
						<div class="module-heading">
							<h3 class="module-title">Add New Project</h3>
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
								<div class="form-horizontal">
									<div id="target">
										<form action="projects/project_submit.php" method="post"
											enctype="multipart/form-data" id="project_form">
											<div class="form-group">
												<label class="col-sm-3 control-label">Project Name </label>
												<div class="col-sm-9">
													<input type="text" name="proj_name" class="form-control" />
												</div>
											</div>

											<div class="form-group">
												<label class="col-sm-3 control-label">Project Description</label>
												<div class="col-sm-9">
													<textarea rows="6" cols="40"
														style="border: solid lightgrey 1px;" name="desc"></textarea>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Tac Codes (Coma
													Seperated)</label>
												<div class="col-sm-9">
													<textarea rows="6" cols="40"
														style="border: solid lightgrey 1px;" name="tac_code"></textarea>
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

					</div>

				</section>

			</div>
			<div class="col-wrapper col-lg-4 col-md-5 col-sm-12 col-xs-12">
				<section class="module module-headings">
					<div class="module-inner">
						<div class="module-heading">
							<h3 class="module-title">Project List</h3>
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
							<?php
							$select_data = new database ( 'VIEW' );
							
							$query = "SELECT 
    s_no,
    project_name,
    project_status
FROM
    project_details where project_status = 'enable';";
							/*
							 * WHERE
							 * campaign_type = :campaign_type;";
							 *
							 * $condition = array (
							 * 'campaign_type' => 'AppInstall'
							 * );
							 */
							$tab = $select_data->query_result ( $query );
							
							?>
<div class="module-content collapse in" id="content-12">
									<div class="module-content-inner">
										<div class="table-responsive">
					<?php if(count($tab)>0){?>
									<table class="table table-condensed">
												<thead>
													<tr>
														<th>Project Id</th>
														<th>Project</th>
														<th>Edit</th>
													</tr>
												</thead>
												<tbody>

								
<?php
						
						foreach ( $tab as $t ) {
							echo '<tr>';
							echo '<td>' . $t ['s_no'] . '</td>';
							echo '<td>' . $t ['project_name'] . '</td>';
							echo '<td> <a href="update_project.php?id=' . $t ['s_no'] . '">Edit</a></td>';
							echo '<td>' . $t ['fail_count'] . '</td>';
							echo '<td>' . $t ['complete_count'] . '</td>';
							echo '</tr>';
						}
						?>

								
							</tbody>
											</table>
								<?php
					
} else {
						echo 'No Projects Found';
					}
					?>
								</div>

									</div>

								</div>
							</div>

						</div>

					</div>

				</section>

			</div>
		</div>
	</div>
</div>