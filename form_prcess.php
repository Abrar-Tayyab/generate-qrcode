<?php
require_once "dbconnection/config.php";
if (!empty($_POST["email_field"])) {
      
      $email=$_POST["email_field"];
      $first_name=$_POST["first_name"]; 
      $middle_initial=$_POST["middle_initial"]; 
      $last_name=$_POST["last_name"]; 
      $phone_number=$_POST["phone_number"]; 
      $prc_number=$_POST["prc_number"]; 
      $dental_chapter=$_POST["dental_chapter"];       

    require ('tc-lib-barcode-develop/vendor/autoload.php');
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

    ?>
<div class="result-heading">Output:</div>
<img src="<?php echo $targetPath . $timestamp ; ?>.png" width="150px"
    height="150px">
<?php
}
?>