<?php 
	include '../config/database.php';
    include '../header_footer/baseurl.php';
	$limit = 3;
	$page = isset($_GET['page']) ? $_GET['page'] : 1;
	$start = ($page - 1) * $limit;
	$result = $con->query("SELECT * FROM customer LIMIT $start, $limit");
	$customers = $result->fetch_all(MYSQLI_ASSOC);

	$result1 = $con->query("SELECT count(customer_id) AS customer_id FROM customer");
	$custCount = $result1->fetch_all(MYSQLI_ASSOC);
	$total = $custCount[0]['customer_id'];
	$pages = ceil( $total / $limit );

	$Previous = $page - 1;
	$Next = $page + 1;
    if($page == $pages){
        $Next = 1;
     $Next = ($Next);
        }
    if($page == 1){
        $Previous = $pages;
     $Previous = ($Previous);
        }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn Web Coding > Pagination in PHP and MySQL </title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<script type="text/javascript" src="../css/jquery-3.6.0.min.js"></script>
</head>
<body>
	<div class="container well">
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" id='previous' href="<?php echo $base_url; ?>Server/viewtablepage.php?page=<?= $Previous; ?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo; Previous</span>
				      </a>
				    </li>
				    <?php for($i = 1; $i<= $pages; $i++) : ?>
				    	<li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>Server/viewtablepage.php?page=<?= $i; ?>"><?= $i; ?></a></li>
				    <?php endfor; ?>
				    <li class="page-item">
				      <a class="page-link" href="<?php echo $base_url; ?>Server/viewtablepage.php?page=<?= $Next; ?>" aria-label="Next">
				        <span aria-hidden="true">Next &raquo;</span>
				      </a>
				    </li>
				  </ul>
                  
				</nav>
			</div>
			<div class="text-center" style="margin-top: 20px; " class="col-md-2">
				<form method="post" action="#">
						<select name="limit-records" id="limit-records">
							<option disabled="disabled" selected="selected">---Limit Records---</option>
							<?php foreach([3,5,10,15,20,50] as $limit): ?>
								<option <?php if( isset($_POST["limit-records"]) && $_POST["limit-records"] == $limit) echo "selected" ?> value="<?= $limit; ?>"><?= $limit; ?></option>
							<?php endforeach; ?>
						</select>
					</form>
				</div>
		</div>
		<div style="height: 600px; overflow-y: auto;">
			<table id="" class="table table-striped table-bordered">
	        	<thead>
	                <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
	              	</tr>
	          	</thead>
	        	<tbody>
	        		<?php foreach($customers as $customer) :  ?>
		        		<tr>
		        			<td><?= $customer['customer_id']; ?></td>
		        			<td><?= $customer['customer_name']; ?></td>
		        			<td><?= $customer['customer_age']; ?></td>
		        			<td><?= $customer['customer_email']; ?></td>
		        			<td><?= $customer['customer_gender']; ?></td>
                            <td><?= $customer['customer_dob']; ?></td>
                            <td><?= $customer['customer_address']; ?></td>
		        		</tr>
	        		<?php endforeach; ?>
	        	</tbody>
      		</table>
              <div style="text-align: center;  color: black;">
                    <strong>
                    <?php echo "Page=$page"; ?>
                    </strong>
            </div>      		
		</div>

<!-- <div style="position: fixed; bottom: 10px; right: 10px; color: green;">
        <strong>
            Learn Web Coding
        </strong>
</div> -->
<script src="<?php echo $base_url; ?>css/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        
		$("#limit-records").change(function(e){
            e.preventDefault();
			$('form').submit();
		})
	})
</script>
</body>
</html>