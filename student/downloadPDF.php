<?php
        include_once '../com/sms/common/request/commonRequestHandler.php';
        $sub_id       = trim($_POST["sub_id_param"]);
        $sub_name     = trim($_POST["sub_name_param"]);
        if(isset($sub_id) && isset($sub_name)){
            
          // place this code inside a php file and call it f.e. "download.php"
        $path = $_SESSION['rootPath']."/extracted/"; // change the path to fit your websites document structure
        $pdfName = 'SUB_'.$sub_id.".pdf";
        $fullPath = $path.$pdfName;
        
        if ($fd = fopen ($fullPath, "r")) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                header("Content-type: application/pdf"); // add here more headers for diff. extensions
                header("Content-Disposition: attachment; filename=\"".$sub_name.".pdf\""); // use 'attachment' to force a download
                break;
                default;
                header("Content-type: application/octet-stream");
                header("Content-Disposition: filename=\"".$path_parts["basename"].".pdf\"");
            }
            header("Content-length: $fsize");
            header("Cache-control: private"); //use this to open files directly
            while(!feof($fd)) {
                $buffer = fread($fd, 2048);
                echo $buffer;
            }
        }
        fclose ($fd);
        exit;
        // example: place this kind of link into the document where the file download is offered:
        }else {
        // Error Msessage.
        header("Location:login.php");  
        exit();
        } 
  ?>