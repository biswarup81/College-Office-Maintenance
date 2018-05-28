<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_POST['student_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/student_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Photo Upload</h1>

			
<?php
//$target_dir = "D:\\wamp\\apache2\\htdocs\\College-Office-Maintenance\\media\\photos\\";
$target_dir = ".\\media\\photos\\";
$input_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$student_id = $_POST['student_id'];
$filename = $student_id."_".$_FILES["fileToUpload"]["name"];

$uploadOk = 1;
$imageFileType = pathinfo($input_file,PATHINFO_EXTENSION);

$target_file = $target_dir . $filename;// . "." . $imageFileType;
echo "<div>".$target_file."</div>";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
$nok = true;
$cnt = 0;
while ($nok)
{
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $cnt = $cnt +1;
    $filename = $student_id."_".$cnt."_".$_FILES["fileToUpload"]["name"];
    $target_file = $target_dir . $filename;
    //$uploadOk = 0;
}
else 
    $nok = false;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "insert into pg_student_photo(student_id, filename) values ('$student_id', '$filename')";
            echo $sql;
            mysql_query($sql) or die(mysql_error());
            $att_rec_id = mysql_insert_id();
            $sql_upd = "Update pg_student_photo set active_flg = 0, last_upd_dt =now() where student_id = ".$student_id." and active_flg = 1 and row_id !=".$att_rec_id;
            mysql_query($sql_upd) or die(mysql_error());
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>

		</div>
	</div>
</div>

<?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>

</body>
</html>
