<?php
include_once 'ReportUtil/ExcelGenerator.php';
include_once 'reportRouter.php';

$report = $_POST['report'];
$report_parameter = json_decode($_POST['report_parameter']);
switch ($report) {
    case "FILTERS":
        $rpt_route = new reportRouter();
        $rprt = $rpt_route->filtersDownload($report_parameter->filter);
        $excelgen = new ExcelGenerator();
        $excelgen->setReportName($report_parameter->filter);
        $excelgen->setWriteData($rprt);
        echo $excelgen->GenerateExcel();
        break;
    default:
        echo 'No report selected';
}