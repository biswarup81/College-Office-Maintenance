<link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./media/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="./media/css/jquery.dataTables.css">
	<link rel="stylesheet" type="text/css" href="./media/css/buttons.dataTables.min.css">
  <body>

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Kandra Radha Kanta Kundu Mahavidhyalaya</a>
          <p class="navbar-brand" > | </p>
          <p class="navbar-brand" >(Welcome <?php if ( isset($_SESSION['user_full_name'])) {echo $_SESSION['user_full_name'] ; }?>) </p>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	
          <ul class="nav navbar-nav navbar-right">
          <?php if ( isset($_SESSION['logged_in_user_id'])) {
          	if( $_SESSION['user_type'] == 'PRINCIPAL' || $_SESSION['user_type'] == 'PROFESSOR') {
          	?>
          	<li><a href="myprofile.php">My Profile</a></li>
          	<li><a href="dashboard.php">My Dashboard</a></li>
            <?php } else if( $_SESSION['user_type'] == 'STUDENT' ){ 
            	if ( isset($_SESSION['STUDENT_ID'])) {
            		$student_id = $_SESSION['STUDENT_ID'];
            		$url = "student_details.php?student_id=".$student_id;
            		?> <li><a href="<?php echo $url;?>">My Profile</a></li>
            	<?php }?>
            <?php } 
            	 }?>
           <li><a href="logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right"> 
            <!--  <input type="text" class="form-control" placeholder="Search..."> -->
          </form>
        </div>
      </div>
    </nav>