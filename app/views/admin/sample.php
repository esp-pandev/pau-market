<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--<link rel="icon" href="<?php echo BASE_URL; ?>assets/libraries/images/favicon-32x32.png">-->
	<!--plugins-->
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/simplebar/css/simplebar.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/metismenu/css/metisMenu.min.css">
   <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/plugins/datatable/css/dataTables.bootstrap5.min.css">

	<!-- loader-->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/pace.min.css">
    <link href="<?php echo BASE_URL; ?>assets/libraries/js/pace.min.js">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/bootstrap-extended.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/app.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/icons.css">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/dark-theme.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/semi-dark.css">
	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/libraries/css/header-colors.css">
	<title>PAU Market - Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Tables</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Data Table</li>
							</ol>
						</nav>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">DataTable Example</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Id</th>
										<th>Category</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                                        <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td class="actions">
                                            <a href="<?php echo BASE_URL; ?>admin/users/edit/<?php echo $user['id']; ?>" class="btn btn-sm btn-edit">Edit</a>
                                            <form action="<?php echo BASE_URL; ?>admin/users/delete" method="POST" class="inline-form">
                                                <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- Bootstrap JS -->
	<script src="assets/libraries/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/libraries/js/jquery.min.js"></script>
	<script src="assets/libraries/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/libraries/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/libraries/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/libraries/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/libraries/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
	<!--app JS-->
	<script src="assets/libraries/js/app.js"></script>
</body>

</html>
