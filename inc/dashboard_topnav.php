<?php include_once "./inc/datacon.php"; 
if ( isset($_SESSION['logged_in_user_id'])) {

$query = "SELECT `row_id`, `par_row_id`, `has_sub_menu`, `name`, `disp_name`, `menu_type`, `template_id`, `url`, `order`, 
`active_flg`, `created`, `created_by`, `last_upd_by`, `last_upd_dt` FROM `pg_office360_nav_menu` WHERE `par_row_id` is null and `active_flg` = 1";
$result = mysql_query($query) or die(mysql_error());

?>
<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        	
          <ul class="nav navbar-nav navbar-left">
         <?php  while ($row = mysql_fetch_array($result)) { ?>
          	<li><a href="<?php echo $row['url']."?pp_id=".$row['row_id']; ?>"><?php echo $row['disp_name']?></a></li>
            
        <?php }?>      
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="logout.php">Logout</a></li>
          </ul>
          <form class="navbar-form navbar-right"> 
            <!--  <input type="text" class="form-control" placeholder="Search..."> -->
          </form>
        </div>
      </div>
    </nav>
    <?php }?>