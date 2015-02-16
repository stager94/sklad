<h2 class="sub-header tabled">
	<? if (isset($active_category)) : ?>
		<?= $active_category->name ?>
	<? elseif (isset($query)) : ?>
		<span class="lighter">Результаты по запросу: </span>
		<?= $query ?>
	<? else : ?>
		Все товары
	<? endif; ?>
	<div class="pull-right small">Результатов: <?= count($products) ?></div>
</h2>

<? if (isset($brands)) : ?>
	<div class="brands-list">
		<a class="<? if ($brand == null) echo 'active'; ?>" href="/products/<?= $active_category->slug ?>">Все производители</a>
		<? foreach($brands as $brand_product) : ?>
			<a href="/products/<?= $active_category->slug ?>?by_brand=<?= $brand_product->brand ?>" class="<? if (isset($brand) && $brand == $brand_product->brand) echo 'active'; ?>">
				<?= $brand_product->brand ?>
			</a>
		<? endforeach; ?>
	</div>
<? endif; ?>

<!-- 
	Проверяем на присутствие товаров в данной категории.
	Если данных не оказалось, то выводим сообщение о том, что категория пустая.
	Иначе, выводим таблицу с данными.
-->
<? if (count($products) == 0) : ?>
	<div class="starter-template">
		<h1>Ничего не найдено ;(</h1>
		<p class="lead">
			К сожалению, по вашему запросу мы ничего не смогли найти.<br />Не хотите подобрать товар из другой категории?
		</p>
		<a href="/products/new<? if (isset($active_category)) echo "?category_id=$active_category->id"; ?>" class="btn btn-bordered btn-grey">Добавить продукт</a>
	</div>
	<hr>
<? else : ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<th>Артикул</th>
				<th>Баркод</th>
				<th class="col-md-12">Наименование</th>
				<th class="nowrap">В наличии</th>
				<th>Цена</th>
				<th>Производитель</th>
				<th></th>
			</thead>
			<tbody>
				<? foreach($products as $product) : ?>
					<tr>
						<td><?= $product->articul() ?></td>
						<td class="nowrap"><?= $product->barcode ?></td>
						<td><?= $product->title ?></td>
						<td class="nowrap"><?= $product->count ?> <?= $product->units ?></td>
						<td class="nowrap"><?= $product->price ?> грн.</td>
						<td class="nowrap"><?= $product->brand ?></td>
						<td class="text-right nowrap">
							<a href="/products/<?= $product->id ?>/edit">Редактировать</a> | 
							<a href="/products/<?= $product->id ?>/delete" class="confirm" data-text="Вы уверены, что хотите удалить товар '<? echo $product->title ?>'?">Удалить</a> | 
							<a href="#">Продать</a>
						</td>
					</tr>
				<? endforeach; ?>
			</tbody>
		</table>
		
	</div>

<? endif; ?>

<? if (isset($active_category)) : ?>
	<p>
		<small>
			А также Вы можете 
			<a href="/categories/<?= $active_category->id ?>/destroy" class="confirm" data-text="Вы уверены, что хотите удалить категорию '<?= $active_category->name ?>'?">удалить</a> 
			или <a href="/categories/<?= $active_category->id ?>/edit">изменить</a> 
			категорию. Помните, что удаление категории повлечет за собой удаление всех находящихся в ней товаров!
		</small>
	</p>
<? endif; ?>