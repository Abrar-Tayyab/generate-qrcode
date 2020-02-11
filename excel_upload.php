<?php

require('library/php-excel-reader/excel_reader2.php');
require('library/SpreadsheetReader.php');
require('dbconnection/config.php');
require ('tc-lib-barcode-develop/vendor/autoload.php');
ini_set ( 'max_execution_time', 7200);



if(isset($_POST['Submit'])) {
    $mimes = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    // print_r($mimes);
    $mime_type = $_FILES["file"]["type"];
     $uploadFilePath = 'uploads/' . basename($_FILES['file']['name']);


     move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath);
     $Reader = new SpreadsheetReader($uploadFilePath);

       $totalSheet = count($Reader->sheets());
       echo "You have total " . $totalSheet . " sheets";


        for ($i = 0; $i < $totalSheet - 1; $i++){

                $Reader->ChangeSheet($i);
                foreach ($Reader as $Row) {
                  
                     $company_code = isset($Row[0]) ? $Row[0] : '';

                    if ($company_code == "Company Code") {
                        continue;
                    }
                    $company_code1 = isset($Row[0]) ? $Row[0] : '';

                      
                      

					   $barcode = new \Com\Tecnick\Barcode\Barcode();
					    $targetPath = "qr-code/";
					    
					    if (! is_dir($targetPath)) {
					        mkdir($targetPath, 0777, true);
					    }
					    $bobj = $barcode->getBarcodeObj('QRCODE,H', $_POST["email_field"], - 16, - 16, 'black', array(
					        - 2,
					        - 2,
					        - 2,
					        - 2
					    ))->setBackgroundColor('#f0f0f0');
					    
					    $imageData = $bobj->getPngData();
					    $timestamp = time();
					    $com_path=$targetPath . $timestamp . '.png';
					    file_put_contents($targetPath . $timestamp . '.png', $imageData);





                      $query="INSERT INTO user(role_id,first_name,middle_initial,last_name,prc_number,dental_chapter,phone_number,email,qr_code_image)VALUES(2,'".$first_name."','".$middle_initial."','".$last_name."','".$prc_number."','".$dental_chapter."','". $phone_number."','".$email."','".$com_path."')";
					       if (mysqli_query($conn, $query) === TRUE) {
					          echo "inserted";
					       }

                }
        }    	


 }   




?>