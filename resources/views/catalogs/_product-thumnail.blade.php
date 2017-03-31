<h3>{{ $product->name }}</h3>
<div class="thumnail">
	<img src="{{ $product->photo_path }}" class="img-rounded img-responsive foto">
	<p>Model: {{ $product->model }}</p>
	<p>Harga: <strong>Rp{{ number_format($product->price,2) }}</strong></p>
	<p>
		Category
		@foreach ($product->categories as $category)
			<span class="label label-primary">
				<i class="fa fa-btn fa-tags"></i> {{ $category->title }}
			</span>
		@endforeach
	</p>
</div>