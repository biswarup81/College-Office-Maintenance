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
          <p class="navbar-brand" >(Welcome Dr. Mrinalkanti Chattopadhyay) </p>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	
          <ul class="nav navbar-nav navbar-right">
          <?php if ( isset($_SESSION['logged_in_user_id'])) {
          	if( $_SESSION['user_type'] == 'PRINCIPAL' || $_SESSION['user_type'] == 'PROFESSOR') {
          	?>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="student.php">Student Management</a></li>
            <li><a href="master.php">Master Data</a></li>
            <li><a href="yearend.php">Year End</a></li>
            <?php }?>
            <li><a href="logout.php">Logout</a></li>
            <?php } ?>
          </ul>
          <form class="navbar-form navbar-right"> 
            <!--  <input type="text" class="form-control" placeholder="Search..."> -->
          </form>
        </div>
      </div>
    </nav>