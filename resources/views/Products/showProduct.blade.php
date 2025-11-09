@extends('layouts.master')

@section('content')

<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="section-title text-center">
				<h3><span class="orange-text">Product </span>Details</h3>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="single-product-img">
						<img src="{{ asset($product->imagepath) }}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$product ->name}}</h3>
						<h4>Categoty: {{$product->Category-> name}}</h4>
						<p class="single-product-pricing"><span>Quantity: {{$product->quantity }}</span> ${{ $product ->price }}</p>
						<p>{{$product->description}}</p>
						<div class="single-product-form">
		
							<a href="/addproducttocart/{{ $product ->id }}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
						</div>
						



					</div>
				</div>
			</div>
		</div>
	</div>


	 <div class="testimonail-section mt-80 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">

                        @foreach ($product-> ProductPhotos as $item)
                            <div class="single-testimonial-slider">
							<div class="client-avater">
								<img style="width:30%; height:300px; max-width: none !important; border-radius: 20px !important;" src="{{ asset($item -> imagepath ) }}" alt="">
							</div>
							<div class="client-meta">
								
								
							</div>
						</div>
                        @endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="section-title text-center">
			<h3><span class="orange-text">Related </span>Products</h3>
		</div>
		<div class="row">

			@foreach ($relatedProducts as $item)
				<div class="col-lg-4 col-md-6 text-center strawberry" style="position: absolute; left: 0px; top: 0px;">
					<div class="single-product-item">
						<div class="product-image">
							<a href="/single-product/{{$item->id}}">
								<img style="height: 250px;"
									src="{{asset($item -> imagepath)}}" alt="">
							</a>
						</div>
						<h3>{{ $item -> name }}</h3>
						<p class="product-price"><span>{{ $item ->quantity }}</span> {{ $item ->price }}$ </p>
						
						<a href="/addproducttocart/{{$item -> id}}" class="cart-btn" >
							<i class="fas fa-shopping-cart">
						</i> Add to Cart</a>
		
						
					</div>
				</div>
			@endforeach

		</div>
	</div>



@endsection