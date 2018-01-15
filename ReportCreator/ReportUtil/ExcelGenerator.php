<?php
include_once $_SERVER['DOCUMENT_ROOT'] . ('/pushapp/XLSXWriter/xlsxwriter.class.php');

class ExcelGenerator
{

    private $WriteData = null;

    private $reportName = null;

    function setReportName($name)
    {
        $this->reportName = $name;
    }

    function setWriteData($data)
    {
        $this->WriteData = $data;
    }

    function GenerateExcel()
    {
        $data = $this->WriteData;
        $r_name = $this->reportName;
        if ((! is_null($data)) && (! is_null($r_name))) {
            $str = '';
            $i = 0;
            // print_r($data);
            $i = 0;
            foreach ($data[0] as $key => $d) {
                $head[$i] = $key;
                $i ++;
            }
            array_unshift($data, $head);
            $date = date("YmdHis");
            $filename = $r_name . '_' . $date . ".xlsx";
            // header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
            // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            // header('Content-Transfer-Encoding: binary');
            // header('Cache-Control: must-revalidate');
            // header('Pragma: public');
            $writer = new XLSXWriter();
            $writer->setAuthor('Panasonic');
            $writer->writeSheet($data, 'Sheet1');
            // $writer->writeToStdOut();
            $writer->writeToFile($_SERVER['DOCUMENT_ROOT'] . ('/pushapp/reports/' . $filename));
            // echo $writer->writeToString();
            $arr = [
                'file_name' => 'reports/' . $filename
            ];
            return json_encode($arr);
        } else {
            die('Report Details not set');
        }
    }
}