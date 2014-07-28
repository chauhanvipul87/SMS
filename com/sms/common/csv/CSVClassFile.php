<?php 
	
	class CSVClass{
           
           private $fileName;
           private $headerNames;
           private $rows;
           
           public function setHeader($fileName){
             // output headers so that the file is downloaded rather than displayed
             header('Content-Type: text/csv; charset=utf-8');
             header('Content-Disposition: attachment; filename='.$fileName.'.csv');
           }
           public function __construct($fileName="export",$headerNames,$rows) {
                    $this -> fileName     = $fileName;
                    $this -> headerNames = $headerNames;
                    $this -> rows        = $rows;
                    $this-> createCSVFile($this -> fileName,$this -> headerNames ,$this -> rows);
                }
           
           public function createCSVFile($fileName,$headerNames,$rows){
               
                 $this-> setHeader($fileName);
                 // create a file pointer connected to the output stream
                 $output = fopen('php://output', 'w');
                 // output the column headings
                 fputcsv($output, $headerNames);
                // loop over the rows, outputting them
                for ($i=0;$i<count($rows);$i++){
                    fputcsv($output, $rows[$i]);
                }
           }
	}
        

?>