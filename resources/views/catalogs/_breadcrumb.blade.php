<ol class="breadcrumb">
	@if (!is_null($current_category))
		<li>Kategory: <a href="{{ url('/catalogs?cat='.$current_category->id) }}">{{ $current_category->title }}</a>
		</li>
	@else
		<li>Kategori Semua Produk</li>
	@endif
</ol>