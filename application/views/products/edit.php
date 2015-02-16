<h2 class="sub-header">
	Редактирование
</h2>
<div class="main-container">

	<form action method="post" style="max-width: 700px;">
		
		<div class="form-group">
			<label for="product_category_id">Категория:</label>
			<select name="product[category_id]" id="product_category_id" class="form-control">
				<? foreach (Category::all() as $category) : ?>
					<option 
						value="<?= $category->id ?>" 
						<? if ($product->category_id == $category->id) echo 'selected' ?> >
						<?= $category->name ?>
					</option>
				<? endforeach; ?>
			</select>
		</div>

		<div class="form-group">
			<label for="product_title">Наименование:</label>
			<input name="product[title]" value="<?= $product->title ?>" class="form-control" id="product_title">
			<? if (isset($product->errors) && $product->errors->on('title')) : ?>
				<span class="text-danger"><?= $product->errors->on('title') ?></span>
			<? endif; ?>
		</div>

		<div class="form-group">
			<label for="product_barcode">Баркод:</label>
			<input name="product[barcode]" value="<?= $product->barcode ?>" class="form-control" id="product_barcode">
			<? if (isset($product->errors) && $product->errors->on('barcode')) : ?>
				<span class="text-danger"><?= $product->errors->on('barcode') ?></span>
			<? endif; ?>
		</div>

		<div class="form-group">
			<label for="product_brand">Производитель:</label>
			<input name="product[brand]" value="<?= $product->brand ?>" class="form-control" id="product_brand">
		</div>

		<div class="form-group">
			<label for="product_price">Цена:</label>
			<input name="product[price]" value="<?= $product->price ?>" class="form-control" id="product_price">
			<? if (isset($product->errors) && $product->errors->on('price')) : ?>
				<span class="text-danger"><?= $product->errors->on('price') ?></span>
			<? endif; ?>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="product_count">Количество:</label>
					<input name="product[count]" value="<?= $product->count ?>" class="form-control" id="product_count">
					<? if (isset($product->errors) && $product->errors->on('count')) : ?>
						<span class="text-danger"><?= $product->errors->on('count') ?></span>
					<? endif; ?>
				</div>				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="units">Единицы измерения:</label>
					<select name="product[units]" class="form-control">
						<option value="шт." <? if ($product->units == 'шт.') echo 'selected' ?> >шт.</option>
						<option value="литр" <? if ($product->units == 'литр') echo 'selected' ?> >литр</option>
						<option value="упаковка" <? if ($product->units == 'упаковка') echo 'selected' ?> >упаковка</option>
						<option value="пара (2 шт.)" <? if ($product->units == 'пара (2 шт.)') echo 'selected' ?> >пара (2 шт.)</option>
						<option value="метр" <? if ($product->units == 'метр') echo 'selected' ?> >метр</option>
						<option value="грамм" <? if ($product->units == 'грамм') echo 'selected' ?> >грамм</option>
						<option value="килограмм" <? if ($product->units == 'килограмм') echo 'selected' ?>>килограмм</option>
					</select>
				</div>
			</div>
		</div>

		<div class="form-group">
			<input type="submit" value="Сохранить" class="btn btn-solid btn-blue">
		</div>
		
	</form>
</div>