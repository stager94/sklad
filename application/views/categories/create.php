<h2 class="sub-header">
	Новая категория
</h2>

<div class="main-container">

	<form action="/categories/create" method="post" style="max-width: 700px;">

		<div class="form-group">
			<label for="category_name">Наименование:</label>
			<input name="category[name]" value="<?= $category->name ?>" class="form-control" id="category_name">
			<? if (isset($category->errors) && $category->errors->on('name')) : ?>
				<span class="text-danger"><?= $category->errors->on('name') ?></span>
			<? endif; ?>
		</div>

		<div class="form-group">
			<label for="category_slug">Алиас:</label>
			<input name="category[slug]" value="<?= $category->slug ?>" class="form-control" id="category_slug">
			<? if (isset($category->errors) && $category->errors->on('slug')) : ?>
				<span class="text-danger"><?= $category->errors->on('slug') ?></span>
			<? endif; ?>
		</div>

		<div class="form-group">
			<input type="submit" value="Добавить" class="btn btn-solid btn-blue">
		</div>
		
	</form>
</div>