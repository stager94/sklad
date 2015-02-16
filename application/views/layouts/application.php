<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Склад [beta]</title>
		<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		<link href="<?php echo asset_url();?>css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo asset_url();?>fonts/flaticon.css" rel="stylesheet">
		<link href="<?php echo asset_url();?>css/dashboard.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<? require_once('_categories.php') ?>

				<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
					<p class="header-line">
						<a href="/categories/new" class="btn btn-bordered btn-grey gutter-right-10">Новая категория</a>
						<a href="/products/new" class="btn btn-bordered btn-grey gutter-right-10">Новый продукт</a>
						<a href="/reports/residues?
							<? if ( isset($active_category) ) echo "by_category=$active_category->id" ?>
							<? if ( isset($brand) ) echo "&brand=$brand" ?>" 
							class="btn btn-solid btn-blue pull-right">
							<i class="flaticon-supermarket20"></i>
							Отчет по остаткам
						</a>
						<a href="/products/new" class="btn btn-solid btn-blue pull-right gutter-right-10">
							<i class="flaticon-wallet33"></i>
							Общий отчет по доходам
						</a>
					</p>
					
					<? if ( $notice != "" ) : ?>
						<p class="bg-success"><?= $notice ?></p>
					<? endif; ?>
					
					<?php echo $content_for_layout ?>
				</div
			</div>
			
		</div>
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="<?php echo asset_url();?>js/bootstrap.min.js"></script>
		<script src="<?php echo asset_url();?>js/jquery.confirm.js"></script>
		<script src="<?php echo asset_url();?>js/sklad.js"></script>
	</body>
</html