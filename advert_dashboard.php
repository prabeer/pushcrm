
<?php 

include_once 'head.php';?>
<?php include_once 'header.main.php';?>
	<?php
	
	include_once 'sidebar.main.php';
	
	
	?>
<?php include_once 'configure.php'; ?>
<div id="content-wrapper" class="content-wrapper view projects-view">
    <div class="container-fluid">
        <h2 class="view-title"><?php
            if (is_empty($_SESSION ['username']) || is_empty($_SESSION ['userid'])) {
                redirect('login.php');
                echo ('Invalid Login! Enable Javascript');
                exit();
            } else {
                echo xssafe($_SESSION ['username']);
            }
            ?> Dashboard</h2>
        <div class="row">
            <div class="col-wrapper col-lg-8 col-md-7 col-sm-12 col-xs-12">
                
                    <div class="module-wrapper">
                        <section class="module module-has-footer module-projects-overview">
                            <div class="module-inner">
                                <div class="module-heading">
                                    <h3 class="module-title">Overview</h3>
                                    


                                </div>

                                <div class="module-content collapse in" id="content-overview">
                                    <div class="module-content-inner">
                                        <ul class="data-list row text-center">
                                            
                                                <li class="item item-1 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a
                                                        href="#"> <span aria-hidden="true"
                                                                                  class="icon icon_toolbox_alt"></span> <span class="data">20</span>
                                                        <span class="desc">Running <br>Campaigns
                                                        </span>
                                                    </a></li>
                                            
                                            <li class="item item-2 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a
                                                    href="#"> <span aria-hidden="true"
                                                                              class="icon icon_box-checked"></span> <span class="data">67523</span>
                                                    <span class="desc">Successful <br>Sent
                                                    </span>
                                                </a></li>
                                            <li class="item item-3 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a
                                                    href="#"> <span aria-hidden="true"
                                                                           class="icon icon_chat_alt"></span> <span class="data">469</span>
                                                    <span class="desc">Total <br>Installs
                                                    </span>
                                                </a></li>
                                            <li class="item item-4 col-lg-3 col-md-6 col-sm-6 col-xs-6"><a
                                                    href="#"> <span aria-hidden="true"
                                                                               class="icon icon_documents_alt"></span> <span class="data">579</span>
                                                    <span class="desc">Total <br>Notifications
                                                    </span>
                                                </a></li>
                                        </ul>
                                        <div class="row">
                                            <div class="time-overview col-md-6 col-sm-12 col-xs-12">
                                                <div class="inner">
                                                    <h4 class="title">
                                                        <span aria-hidden="true" class="icon icon_clock_alt"></span>Requests
                                                        Clicked Per Day

                                                    </h4>
                                                    <div class="chart-container">
                                                        <div id="time-chart" class="flot-chart"
                                                             style="height: 160px;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="type-overview col-md-6 col-sm-12 col-xs-12">
                                                <div class="inner">
                                                    <h4 class="title">
                                                        <span aria-hidden="true" class="icon icon_datareport"></span>Time
                                                        spent on each campaign
                                                    </h4>
                                                    <div class="chart-container">
                                                        <div id="type-chart" class="flot-chart"
                                                             style="height: 140px;"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>


                        </section>

                    </div>
               

                



            </div>
<div class="col-wrapper col-lg-4 col-md-5 col-sm-12 col-xs-12">

                    <div class="module-wrapper">
                        <section class="module module-projects-sales">
                            <div class="module-inner">
                                <div class="module-heading">
                                    <h3 class="module-title">Campaign Type wise Count</h3>
                  
                                    <ul class="actions list-inline">

                                        <li><a class="collapse-module" data-toggle="collapse"
                                               href="#content-sales" aria-expanded="false"
                                               aria-controls="content-sales"><span aria-hidden="true"
                                                                                class="icon arrow_carrot-up"></span></a></li>
                                        <li><a class="close-module" href="#"><span aria-hidden="true"
                                                                                   class="icon icon_close"></span></a></li>
                                    </ul>

                                </div>

                                <div class="module-content collapse in" id="content-sales">
                                    <div class="module-content-inner">
                                        <div class="table-responsive">
                                            <table class="table table-simple">
                                                <thead>
                                                    <tr>
                                                        <th class="number">Campaign Type</th>
                                                        <th class="truncate">Success Count</th>
                                                        <th class="truncate">Pending Count</th>
                                                        <th class="truncate">Fail Count</th>

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

</div>


<?php include_once 'footer.php';?>
