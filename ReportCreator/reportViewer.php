<?php
include_once 'reportRouter.php';

class reportViewer
{

    private $report;

    private $report_parameters;

    function __construct($report, $report_parameters)
    {
        $this->report = $report;
        $this->report_parameters = $report_parameters;
    }

    function ViewReport()
    {
        $report_parameter = "";
        if (! $this->report_parameters) {
            $report_parameter = json_decode($this->report_parameters);
        }
        $report = $this->report;
        switch ($report) {
            case "FILTERS":
                include_once 'ReportUI/filterUI.php';
                $rpt_route = new reportRouter();
                $rprt = $rpt_route->filterCount();
                $fui = new filterUI($rprt);
                $fui->report_name($report);
                $fui->filter_display();
                break;
            default:
                echo 'No report selected';
        }
    }
}