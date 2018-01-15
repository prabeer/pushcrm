<?php

class filterUI
{

    private $filter_list;

    private $report_name;

    function __construct($data)
    {
        $this->filter_list = $data;
    }

    function report_name($report_name)
    {
        $this->report_name = $report_name;
    }

    function filter_display()
    {
        echo "        <section class=\"module module-headings\">\n";
        echo "        <div class=\"module-inner\">\n";
        echo "        <div class=\"module-heading\">\n";
        echo "        <h3 class=\"module-title\">" . $this->report_name . "</h3>\n";
        echo "							\n";
        echo "							<ul class=\"actions list-inline\">\n";
        echo "								<li><a class=\"collapse-module\" data-toggle=\"collapse\"\n";
        echo "									href=\"#content-4\" aria-expanded=\"false\"\n";
        echo "									aria-controls=\"content-4\"><span aria-hidden=\"true\"\n";
        echo "										class=\"icon arrow_carrot-up\"></span></a></li>\n";
        echo "								<li><a class=\"close-module\" href=\"#\"><span aria-hidden=\"true\"\n";
        echo "										class=\"icon icon_close\"></span></a></li>\n";
        echo "							</ul>\n";
        echo "\n";
        echo "						</div>\n";
        echo "\n";
        echo "						<div class=\"module-content collapse in\" id=\"content-4\">\n";
        echo "							<div class=\"module-content-inner no-padding-bottom\">\n";
        echo "								<div class=\"table-responsive\">\n";
        echo "\n";
        echo "									<table class=\"table table-hover\">\n";
        echo "										<thead>\n";
        echo "											<tr>\n";
        echo "												<th>#</th>\n";
        echo "												<th>Filter Name</th>\n";
        echo "												<th>IMEI</th>\n";
        echo "												<th>Download</th>\n";
        echo "											</tr>\n";
        echo "										</thead>\n";
        echo "										<tbody>";
        
        foreach ($this->filter_list as $d) {
            echo '<tr><td></td><td>' . $d['filter_name'] . '</td><td>' . $d['imei_count'] . '</td><td><button class="download" data-ref="' . $d['filter_name'] . '">Generate</button></td>';
        }
        
        echo "										</tbody>\n";
        echo "									</table>\n";
        echo "								</div>\n";
        echo "\n";
        echo "							</div>\n";
        echo "\n";
        echo "						</div>\n";
        echo "\n";
        echo "					</div>\n";
        echo "\n";
        echo "				</section>";
    }
}