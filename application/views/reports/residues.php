<p>ОАО "МойСклад"</p>
<h3>ОСТАТКИ ТОВАРОВ НА СКЛАДЕ на <?= date("m.d.Y") ?> (Время: <?= date("G:i:s") ?>)</h3>

<? if ( $category ) : ?>
	<b>Категория:</b> <?= $category->name ?>
<? endif; ?>
<? if ( $brand ) : ?>
	<b>Производитель:</b> <?= $brand ?>
<? endif; ?>

<? if ( count($products) > 0 ) : ?>
	<table>
		<thead>
			<tr>
				<th>Артикул</th>
				<th>Наименование</th>
				<th>Кол-во</th>
				<th>Цена</th>
			</tr>
		</thead>
		<tbody>
			<? foreach ($products as $product) : ?>
				<tr>
					<td class="text-center"><?= $product->barcode ?></td>
					<td><?= $product->title ?></td>
					<td class="text-center"><?= $product->count ?></td>
					<td class="text-center"><?= $product->price ?> грн.</td>
				</tr>
			<? endforeach; ?>
		</tbody>
	</table>
<? endif; ?>

<p>
	Всего на складе <b><?= count($products) ?></b> наименований в количестве <b><?= sum_objects_value($products, 'count') ?></b> шт., на сумму <b><?= sum_objects_value($products, 'price') * sum_objects_value($products, 'count') ?> грн.</b>
</p>