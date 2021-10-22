@extends('layouts.app')

@section('content')

	@if(!str_contains(url()->current(), 'categories'))
		<div class="categories-header">
			<h4 class="mb-3">Categorieën:</h4>
			<div class="category-link-container d-flex border-bottom pb-3">
				@foreach($categories as $category)
					<a href="{{ route('products.category', $category) }}" class="mr-3 mb-3"><button class="btn btn-secondary">{{ $category->name }}</button></a>
				@endforeach
			</div>
		</div>
	@endif

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
						@endunless
						@if($product->discount > 0)
							<p class="text-danger">Nu <strong>{{ round($product->discount, 1) }}%</strong> korting! Orginiele prijs: <strong>&euro;{{ $product->getOriginal('price') }}</strong></p>
						@endif
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection