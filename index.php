<?php
include_once "./inc/datacon.php";
include_once './inc/header.php';;
$err = false;
$print = "";
if(isset($_REQUEST['action'])){
    $action=$_REQUEST['action'];
    if($action=='login'){


        $uname=stripslashes(trim($_POST['user_name']));
        $pass=stripslashes($_POST['password']);

        $sql = "select pg_session.row_id as active_session_id, user.* from user inner join pg_session on pg_session.active_flg=1  where user_name = '$uname' and user_password = '".md5($pass)."'";
        $r = mysql_query($sql) or die(mysql_error());
        $d = mysql_fetch_object($r) ;

        
        if(mysql_num_rows($r) > 0){
            $user_role = $d->role;
            $user_name = $d->user_name;
            $user_id = $d->user_id;
            $user_full_name = $d->user_full_name;            $active_session_id = $d->active_session_id;
            
           $_SESSION['user_type'] = $user_role;
           $_SESSION['logged_in_user_id'] = $user_id;
           $_SESSION['user_full_name'] = $user_full_name;
           $_SESSION['sid'] = $active_session_id;
           
            
            if($user_role== ''){
            	echo "You are not authorize to perform any operation !!";
            } else if ($user_role== 'ACCOUNTS') {
            	echo "<script>location.href='accounts.php'</script>";
            } else if ($user_role== 'STUDENT'){
            	//get Student ID from old_student_id
            	
            	$sql="select row_id from pg_student where old_student_id='".$user_name."'";
            	$r = mysql_query($sql) or die(mysql_error());
            	$d = mysql_fetch_object($r) ;
            	$student_id = $d->row_id;
            	
            	$_SESSION['STUDENT_ID'] = $student_id;
            	$url = "student_details.php?student_id=".$student_id;
            	echo "<script>location.href='".$url."'</script>";
            } else if($user_role== 'PRINCIPAL' || $user_role== 'PROFESSOR'){
            	echo "<script>location.href='dashboard.php'</script>";
            }
        } else{
        	$err = true;
        //echo "<font color='red'>Invalid User Name or Password</font>";

        }
    } 
} 
?>

  <body>

    <div class="container">
	  <h2 class="form-signin-heading">Sign in for Kandra Kadha Kanta Kundu Mahavidhyalay Admin Panel</h2>
	  <div class="row">
	  <?php if($err){?>
	  <div class="alert alert-danger" role="alert"> 
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> 
		<span class="sr-only">Error:</span> Enter a valid user id and/or password 
	 </div>
	  <?php }?>
	  </div>
      <form class="form-signin" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=login" method="post">
        
        <label for="user_name" class="sr-only">Login ID</label>
        
        <input type="text" name="user_name" class="form-control" placeholder="Enter User ID" required autofocus />
        <label for="inputPassword" class="sr-only">Password</label>
       
        <input type="password" name="password" class="form-control" placeholder="Password" required />
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
		<p>
		<button type="submit" name="login" value="Login" class="btn btn-lg btn-success">Sign in</button>
        <a class="btn btn-lg btn-primary" href="register.php" >Register</a>
        
        </p>
		<a  href="forgot_password.php" >Forget Password</a>
      </form>
		
    </div> <!-- /container -->
    <?php include_once './inc/footer.php';?>
  </body>
</html>
