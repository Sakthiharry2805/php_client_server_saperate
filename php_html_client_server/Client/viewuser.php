<?php
// require '../header_footer/baseurl.php';
require '../header_footer/index.php';
require '../Server/view.php';

echo "<div class='container'>";

if ($result->num_rows > 0) {
?>
	<div class="container well">
		<h4>List of all Users</h4>
		<div style="text-align: right;  color: black;">
			<strong>
				<?php echo "Page=$page"; ?>
			</strong>
		</div>
		<table class="tbl-header" cellpadding="0" cellspacing="0">
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Age</th>
				<th>Email</th>
				<th>Gender</th>
				<th>Date of Birth</th>
				<th>Address</th>
				<th width="70px">Delete</th>
				<th width="70px">EDIT</th>
			</tr>
			<?php
			require '../Server/viewtable.php';
			?>

		</table>
		<link rel="stylesheet" type="text/css" href="<?php echo $base_url; ?>css/user.css">
		<div class="row">
			<div class="col-md-10">
				<nav aria-label="Page navigation">
					<ul class="pagination">
						<li class="page-item">
							<a class="page-link" id='previous' href="<?php echo $base_url; ?>Client/viewuser.php?page=<?= $Previous; ?>" aria-label="Previous">
								<span aria-hidden="true">&laquo; Previous</span>
							</a>
						</li>
						<?php for ($i = 1; $i <= $pages; $i++) : ?>
							<li class="page-item"><a class="page-link" href="<?php echo $base_url; ?>Client/viewuser.php?page=<?= $i; ?>"><?= $i; ?></a></li>
						<?php endfor; ?>
						<li class="page-item">
							<a class="page-link" href="<?php echo $base_url; ?>Client/viewuser.php?page=<?= $Next; ?>" aria-label="Next">
								<span aria-hidden="true">Next &raquo;</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

		</div>

		<div style="height: 600px; overflow-y: auto;">
		<?php
	} else {
		echo "<br><br>No Record Found";
	}
		?>
		<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
		</div>

		<?php
		require '../header_footer/indexfooter.php';
		?>