<?php

include('app/includes/functions.php');

$root_dir = dirname(__FILE__);
$dir_name = 'storage';
$storage_dir = $root_dir . "/" . $dir_name;
$storage_url = getDomainUrl() . "/" . $dir_name;


$extensions = ['css', 'js'];

$links = [];

listFolderFiles($storage_dir);

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Devtools</title>
		<link rel="stylesheet" type="text/css" href="/app/resources/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/app/resources/datatables/css/jquery.dataTables.min.css">
		<!-- <link rel="stylesheet" type="text/css" href="/app/resources/datatables/css/dataTables.bootstrap.min.css"> -->
		<link rel="stylesheet" type="text/css" href="/app/resources/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/app/resources/css/main.css">
	</head>
	<body>
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Devtools</a>
				</div>
				<ul class="nav navbar-nav">
					<li class="active"><a href="/">Main</a></li>
					<li>
						<a href="/<?php echo $dir_name ?>" target="_blank" class="text-capitalize">
						<?php echo $dir_name ?>
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">

		<table id="links" class="table table-striped">
		<thead>
			<tr>
				<th>name</th>
				<th>info</th>
				<th>action</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($links as $link): ?>
				<tr>
					<td>
						<?php echo $link['filename'] ?>
					</td>
					<td>
						<?php if($link['is_min']): ?>
							<span class="label label-info">.min</span>
						<?php endif; ?>
					</td>
					<td>
						<!-- css -->
						<?php if($link['ext'] == 'css'): ?>
							<button class="btn btn-xs button-success" data-clipboard-text="<link rel='stylesheet' type='text/css' href='<?php echo $link['url'] ?>'>">
								copy
							</button>
						<?php endif; ?>
						<!-- js -->
						<?php if($link['ext'] == 'js'): ?>
							<button class="btn btn-xs button-success" data-clipboard-text="<script type='text/javascript' src='<?php echo $link['url'] ?>'></script>">
								copy
							</button>
						<?php endif; ?>
						<a href="<?php echo $link['url'] ?>" class="btn btn-xs btn-primary" target="_blank">preview</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		</table>

		</div>



		<footer class="footer">
			<div class="container">
				<p class="text-muted pull-right">
					by
					<a href="https://github.com/abdulkhamidov">
						abdulkhamidov
						<i class="fa fa-github"></i>
					</a>
				</p>
			</div>
		</footer>

		<script src="/app/resources/jquery/jquery-1.12.3.min.js"></script>
		<script src="/app/resources/bootstrap/js/bootstrap.min.js"></script>
		<script src="/app/resources/datatables/js/jquery.dataTables.min.js"></script>
		<script src="/app/resources/datatables/js/dataTables.bootstrap.min.js"></script>
		<script src="https://clipboardjs.com/dist/clipboard.min.js"></script>
		<script src="/app/resources/js/main.js"></script>


	</body>
</html>