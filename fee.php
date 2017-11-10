<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Fee Setup</h1>

          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Student Fee Setup</h2>
        		
        		<table id="course_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Course Name</th>
								<th>Subject</th>
								<th>Year</th>
								<th>Fee Name</th>
							
								<th>Active</th>
								
								
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("select b.row_id fee_id, d.name course_name, c.name specialisation, a.year, b.name fee_name, b.active_flg from pg_course a
inner join pg_fee_master b on a.row_id = b.course_id
inner join pg_course_level d on a.course_level_id = d.row_id
left outer join pg_specialisation c on a.specialisation_id = c.row_id ;");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['course_name']." - ".$row['specialisation']; ?></td>
								<td><?php echo $row['specialisation']; ?></td>
								<td><?php echo $row['year']; ?></td>
								<td><?php echo $row['fee_name']; ?></td>
								<td><?php if($row['active_flg']) echo "Y"; else echo "N"; ?></td>
								<?php $fee_id =  $row['fee_id']; ?>
							</tr>
    <?php
        $count = $count + 1;
    }
    
    ?>
		              </tbody>
            	</table>
<h2 class="sub-header">Student Fee Items</h2>
        		
        		<table id="Fee_Item_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Fee Item Name</th>
								
								<th>Amount</th>
								<th>Due By</th>
								<th>Due By Unit</th>
								<th>Active Flag</th>
								
							</tr>
						</thead>
						<tbody>
<?php
$sql = "select a.row_id item_id, a.name item_name, a.amount, a.due_by, a.due_by_unit , a.active_flg from pg_fee_item a
where a.par_row_id = " . $fee_id ;

    $result1 = mysql_query($sql);
    $itemcount = 1;
    while ($item = mysql_fetch_array($result1)) {
        
        ?>
                <tr>
								<td><?php echo $item['item_name']; ?></td>
								<td><?php echo $item['amount']; ?></td>
								<td><?php echo $item['due_by']; ?></td>
								<td><?php echo $item['due_by_unit']; ?></td>
								<td><?php if($item['active_flg']) echo "Y"; else echo "N"; ?></td>
								<?php $item_id =  $item['item_id']; ?>
							</tr>
    <?php
    $itemcount = $itemcount + 1;
    }
    
    ?>
		              </tbody>
            	</table>
    <h2 class="sub-header">Student Fee Discounts</h2>
        		
        		<table id="Fee_Item_Disc_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Category</th>
								
								<th>Amount</th>
								<th>Active Flag</th>
								
							</tr>
						</thead>
						<tbody>
<?php
$sql2 = "select a.category, a.amount, a.active_flg from pg_fee_item_discount a
where a.par_row_id = " . $item_id ;

    $result2 = mysql_query($sql2);
    $disccount = 1;
    while ($disc = mysql_fetch_array($result2)) {
        
        ?>
                <tr>
								<td><?php echo $disc['category']; ?></td>
								<td><?php echo $disc['amount']; ?></td>
								<td><?php if($disc['active_flg']) echo "Y"; else echo "N"; ?></td>
				</tr>
    <?php
    $disccount = $disccount + 1;
    }
    
    ?>
		              </tbody>
            	</table>
    
        		</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
  </body>
</html>
