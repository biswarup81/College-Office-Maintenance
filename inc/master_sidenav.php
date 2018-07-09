<?php include_once "datacon.php"; 
if ( isset($_GET['pp_id']) && isset($_SESSION['logged_in_user_id'])) {
    $page_id = $_GET['pp_id'];
$query = "SELECT `row_id`, `par_row_id`, `has_sub_menu`, `name`, `disp_name`, `menu_type`, `template_id`, `url`, `order`, 
`active_flg`, `created`, `created_by`, `last_upd_by`, `last_upd_dt` FROM `pg_office360_nav_menu` WHERE `par_row_id`=".$page_id." and `active_flg` = 1";
$result = mysql_query($query) or die(mysql_error());
//echo $query;

?>
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <?php  while ($row = mysql_fetch_array($result)) { ?>
          	<li><a href="<?php echo ($row['url']."?pp_id=".$page_id); ?>"><?php echo $row['disp_name']?></a></li>
            
        <?php }?> 
            
          </ul>
         
          
</div>
 <?php }else {echo ("You are not authorized to perform any operation");} ?>