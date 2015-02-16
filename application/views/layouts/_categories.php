<div class="col-sm-3 col-md-2 sidebar">

	<img src="<?php echo asset_url();?>images/logo.png" />

	<ul class="nav nav-sidebar" role="tablist">

		<li class="search">
			<form action="/products/search" method="get">
				<input type="text" value="<? if (isset($query)) echo $query; ?>" placeholder="Поиск продуктов.." name="q" />
				<small>Введите название или баркод продукта</small>
			</form>
			
		</li>

		<!-- 
			Ссылка на страницу со всеми продуктами
		 -->
		<li class="<? if (isset($all)) echo 'active' ?>">
			<a href="/">
				Все товары
				<span class="badge"><?= Product::count() ?></span>
			</a>
		</li>

		<!-- 
			Вывод списка со всеми категориями
		 -->
		<? foreach(Category::all() as $category) : ?>
			<li role="presentation" class="<? if (isset($active_category) && $active_category->slug == $category->slug) echo 'active' ?>">
				<a href="/products/<?= $category->slug ?>">
					<?= $category->name ?>
					<span class="badge"><?= Product::count(array('conditions' => 'category_id = ' . $category->id)) ?></span>
				</a>
			</li>
		<? endforeach; ?>

	</ul>
</div>