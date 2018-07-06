<?php
/* Get post details */
$post = isset($_POST) ? $_POST: array();
switch($post['action']) {
    case 'save' :
        
        //saveProfilePic();
        saveProfilePicTmp();
        break;
    default:
        changeProfilePic();
}
/* Function to change profile picture */
function changeProfilePic() {
    $post = isset($_POST) ? $_POST: array();
    $max_width = "500";
    $userId = isset($post['hdn-profile-id']) ? intval($post['hdn-profile-id']) : 0;
    $_SESSION['STUDENT_ID'] = $userId;
    $path = 'media/photos';
    $valid_formats = array("jpg", "png", "gif", "jpeg", "jpg", "JPG");
    $name = $_FILES['profile-pic']['name'];
    $size = $_FILES['profile-pic']['size'];
    echo "image size =>>".$size;
    if(strlen($name)) {
        list($txt, $ext) = explode(".", $name);
        //echo "EXT ==>>".$ext;
        $ext = strtolower($ext);
        if(in_array($ext,$valid_formats)) {
            /*if($size < 1048576 ) { */ $actual_image_name = $txt.'_'.$userId .'.'.$ext;
            $filePath = $path .'/'.$actual_image_name;
            $tmp = $_FILES['profile-pic']['tmp_name'];
            if(move_uploaded_file($tmp, $filePath)) {
                $width = getWidth($filePath); $height = getHeight($filePath); //Scale the image if it is greater than the width set above if ($width > $max_width){
                $scale = $max_width/$width;
                $uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
            } else {
                $width = getWidth($filePath); $height = getHeight($filePath);
                //$scale = 1;
                $scale = $max_width/$width;
                $uploaded = resizeImage($filePath,$width,$height,$scale, $ext);
            }
            $loggedin_user = isset($_SESSION['logged_in_user_id']) ? $_SESSION['logged_in_user_id'] : 0;
            include_once "./inc/datacon.php";
            $sql = "insert into pg_staff_photo(staff_id, filename, created_by) values ('$userId', '$actual_image_name','$loggedin_user')";
            //echo $sql;
            mysql_query($sql) or die(mysql_error());
            $att_rec_id = mysql_insert_id();
            $sql_upd = "Update pg_staff_photo set active_flg = 0, last_upd_dt =now(), last_upd_by = ".$loggedin_user." where staff_id = ".$userId." and active_flg = 1 and row_id !=".$att_rec_id;
            mysql_query($sql_upd) or die(mysql_error());
            
            
            
            echo "<img id='photo' file-name='".$actual_image_name."' class='' src='./media/photos/".$actual_image_name."' class='preview'/>";
            /* }
             else
             echo "failed"; */
        }
        else
            echo "Image file size max 1 MB";
    }
    else {
        echo "Invalid file format..";
    }
}
/* Function to update image */
function saveProfilePicTmp() {
    $post = isset($_POST) ? $_POST: array();
    $userId = isset($post['id']) ? intval($post['id']) : 0;
    $path ='\\media\photos';
    $t_width = 300; // Maximum thumbnail width
    $t_height = 300; // Maximum thumbnail height
    if(isset($_POST['t']) and $_POST['t'] == "ajax") {
        extract($_POST);
        $imagePath = 'media/photos/'.$_POST['image_name'];
        $ratio = ($t_width/$w1);
        $nw = ceil($w1 * $ratio);
        $nh = ceil($h1 * $ratio);
        $nimg = imagecreatetruecolor($nw,$nh);
        $im_src = imagecreatefromjpeg($imagePath);
        imagecopyresampled($nimg,$im_src,0,0,$x1,$y1,$nw,$nh,$w1,$h1);
        imagejpeg($nimg,$imagePath,90);
    }
    echo $imagePath.'?'.time();;
    exit(0);
}
/* Function to resize image */
function resizeImage($image,$width,$height,$scale, $ext) {
    $newImageWidth = ceil($width * $scale);
    $newImageHeight = ceil($height * $scale);
    $newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
    switch ($ext) {
        case 'jpg':
            $source = imagecreatefromjpeg($image);
            break;
        case 'jpeg':
            $source = imagecreatefromjpeg($image);
            break;
        case 'gif':
            $source = imagecreatefromgif($image);
            break;
        case 'png':
            $source = imagecreatefrompng($image);
            break;
        default:
            $source = false;
            break;
    }
    imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
    imagejpeg($newImage,$image,90);
    chmod($image, 0777);
    return $image;
}
/* Function to get image height. */
function getHeight($image) {
    $sizes = getimagesize($image);
    $height = $sizes[1];
    return $height;
}
/* Function to get image width */
function getWidth($image) {
    $sizes = getimagesize($image);
    $width = $sizes[0];
    return $width;
}
/* Function to handle profile pic update*/
function saveProfilePic(){
    include_once "./inc/datacon.php";
    $post = isset($_POST) ? $_POST: array();
    $loggedin_user = isset($_SESSION['logged_in_user_id']) ? $_SESSION['logged_in_user_id'] : 0;
    $staff_id = isset($post['id']) ? intval($post['id']) : 0;
    $name = $post['image_name'];
    list($txt, $ext) = explode(".", $name);
    //echo "EXT ==>>".$ext;
    $ext = strtolower($ext);
    
    $actual_image_name = $txt.'.'.$ext;
    
    $sql = "insert into pg_staff_photo(staff_id, filename, created_by) values ('$staff_id', '$actual_image_name','$loggedin_user')";
    echo $sql;
    mysql_query($sql) or die(mysql_error());
    $att_rec_id = mysql_insert_id();
    $sql_upd = "Update pg_staff_photo set active_flg = 0, last_upd_dt =now(), last_upd_by = ".$loggedin_user." where staff_id = ".$staff_id." and active_flg = 1 and row_id !=".$att_rec_id;
    mysql_query($sql_upd) or die(mysql_error());
    
    
    /* include_once("db_connect.php");
     $post = isset($_POST) ? $_POST: array();
     //Handle profile picture update with MySQL update Query using $options array
     if($post['id']){
     $sql_query = "SELECT * FROM users WHERE uid = '".mysqli_escape_string($conn, $post['id'])."'";
     $resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
     if(mysqli_num_rows($resultset)) {
     $sql_update = "UPDATE users set profile_photo='".mysqli_escape_string($conn,$post['image_name'])."' WHERE uid = '".mysqli_escape_string($conn, $post['id'])."'";
     mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
     }
     } */
    
}
?>