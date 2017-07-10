<?php
ob_start ();
include_once 'includes/functions.php';
include_once 'includes/database2.php';
include_once 'includes/sessionV2.php';
include_once 'XLSXWriter/xlsxwriter.class.php';
$session = new session ();
// Set to true if using https
$session->start_session ( '_s', false );
if (isset ( $_GET ['id'] )) {
	if (! is_empty ( $_GET ['id'] )) {
		$s_no = encryptor ( 'decrypt', $_GET ['id'] );
		if (! is_empty ( $s_no )) {
			$report_db = new database ( 'VIEW' );
			$query = 'select Report_Name, Report_page_query from Reports_list where S_NO = :S_NO';
			$conditions = [ 
					'S_NO' => $s_no 
			];
			$query_result = $report_db->query_result ( $query, $conditions );
			if (count ( $query_result ) == 1) {
				$q = xssafe ( $query_result [0] ['Report_page_query'] );
				$r_name = xssafe ( $query_result [0] ['Report_Name'] );
			}
			if (! is_empty ( $q )) {
				$query = $q;
				$query_val = $report_db->query_result ( $query );
				$i=0;
				foreach ( $query_val [0] as $key => $val ) {
					$head [$i] = $key;
					$i ++;
				}
				array_unshift($query_val, $head);
				
				$date = date ( "YmdHis" );
				$filename = $r_name . '_' . $date . ".xlsx";
				header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
				header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
				header('Content-Transfer-Encoding: binary');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				
				$writer = new XLSXWriter ();
				$writer->setAuthor ( 'WeAttach' );
				$writer->writeSheet ( $query_val, 'Sheet1' );
				// $writer->writeToStdOut();
				$writer->writeToFile ( 'reports/' . $filename );
				// echo $writer->writeToString();
				$arr = [ 
						'file_name' => 'reports/' . $filename,
						'id' => $s_no 
				];
				//echo '<iframe width="1" height="1" frameborder="0" src="[reports/' . $filename.']"></iframe>';
				echo json_encode ( $arr );
				exit ( 0 );
			}
		}
	}
}