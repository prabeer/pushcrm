<?php $type = "";?>
<div
	class="module-wrapper masonry-item col-lg-6 col-md-6 col-sm-12 col-xs-12">
	<section class="module">
		<div class="module-inner">
			<div class="module-heading">
				<h3 class="module-title"><?php echo $type;?> Campaigns Detail </h3>
				<ul class="actions list-inline">
					<li><a class="collapse-module" data-toggle="collapse"
						href="#content-12" aria-expanded="false"
						aria-controls="content-12"><span aria-hidden="true"
							class="icon arrow_carrot-up"></span></a></li>
					<li><a class="close-module" href="#"><span aria-hidden="true"
							class="icon icon_close"></span></a></li>
				</ul>
			</div>
<?php

$select_data = new database ( 'VIEW' );

$query = "SELECT 
    campaign_id,
    campaign_name,
    campaign_type,
    pending_count,
    fail_count,
    complete_count
FROM
    camp_count;";
/*
WHERE
    campaign_type = :campaign_type;";

$condition = array (
		'campaign_type' => 'AppInstall' 
);
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
									<th>Camp_id</th>
									<th>Campaigns</th>
									<th>Pending</th>
									<th>Failed</th>
									<th>Completed</th>
								</tr>
							</thead>
							<tbody>

								
<?php
						
						foreach ( $tab as $t ) {
							echo '<tr>';
							echo '<td>' . $t ['campaign_id'] . '</td>';
							echo '<td>' . $t ['campaign_name'] . '</td>';
							echo '<td>' . $t ['pending_count'] . '</td>';
							echo '<td>' . $t ['fail_count'] . '</td>';
							echo '<td>' . $t ['complete_count'] . '</td>';
							echo '</tr>';
						}
						?>

								
							</tbody>
						</table>
								<?php }?>
								</div>

				</div>

			</div>
	
	</section>
</div>
