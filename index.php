<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDO | PHP</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/custom.css">
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="jscript.php"></script>
</head>
<body>
	<div class="container">
		<br>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-primary">
					<div class="panel-heading heading">Save Data</div>
					<div class="panel-body">
						<form action="controller.php" method="POST" id="saveForm">
							<div class="row">
								<!-- start idden input -->
								<input type="hidden" name="create" id="create" value="create">
								<input type="hidden" name="user_id" id="input-user_id" value="create">
								<!-- End hidden input -->
								<div class="col-md-12">
									<div class="form-group"><label for="" class="label" id="label-name">Fullname</label><input type="text" name="name" class="form-control" id="input-name"></div>
								</div>
								<div class="col-md-12">
									<div class="form-group"><label for="" class="label" id="label-phone">Phone</label><input type="text" name="phone" class="form-control" id="input-phone"></div>
								</div>
								<div class="col-md-12">
									<div class="form-group"><label for="" class="label" id="label-email">Email</label><input type="text" name="email" class="form-control" id="input-email"></div>
								</div>
								<div class="col-md-12">
									<div class="form-group"><label for="" class="label" id="label-password">Password</label><input type="password" name="password" class="form-control" id="input-password"></div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
									<a href="" class="btn btn-default pull-left" id="cancel">Cancel</a>
										<input type="submit" name="submit" class="btn btn-primary pull-right btn-name" id="saveBtn"></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Data Table</div>
					<div class="panel-body">
							<div id="dataTable"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>