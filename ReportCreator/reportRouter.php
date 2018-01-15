<?php

// include_once '/includes/database/ConnectDBView.php';
// include_once '/includes/database/ConnectDBEdit.php';
class reportRouter
{

    public function InstallUnistallReport()
    {
        include_once 'InstallUnistallReport.php';
        return new InstallUnistallReport();
    }

    public function filtersDownload($filter_name)
    {
        include_once 'ReportLogic/filtersDownload.php';
        $fl = new filtersDownload($filter_name);
        return $fl->getfilterDownloads($filter_name);
    }

    public function filterCount()
    {
        include_once 'ReportLogic/filterCount.php';
        $x = new filterCount();
        return $x->getFilterCount();
    }
}
