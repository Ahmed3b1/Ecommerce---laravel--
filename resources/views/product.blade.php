@extends('layouts.master')


@section('content')
    <div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-12">
                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".strawberry">Strawberry</li>
                            <li data-filter=".berry">Berry</li>
                            <li data-filter=".lemon">Lemon</li>
                        </ul>
                    </div>
                </div>
            </div>

			<div class="row product-lists" style="position: relative; height: 4162.13px;">

                @foreach ($products as $item)
                    <div class="col-lg-4 col-md-6 text-center strawberry" style="position: absolute; left: 0px; top: 0px;">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/single-product/{{$item->id}}">
                                    <img style="height: 250px;"
                                        src="{{url($item -> imagepath)}}" alt="">
                                </a>
                            </div>
                            <h3>{{ session('locale') == 'en' ? $item -> name : $item -> nameEN }}</h3>
                            <p class="product-price"><span>{{ $item -> quantity }}</span> {{ $item -> price }}$ </p>
                            
                            <a href="/addproducttocart/{{$item -> id}}" class="cart-btn" >
                                <i class="fas fa-shopping-cart">
                            </i> Add to Cart</a>


                            @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'salesman'))
                                <p class="mt-3">
                                    <a href="/removeproduct/{{ $item-> id  }}" class="btn btn-danger">
                                    <i class="fas fa-trash">
                                    </i> Delete </a>

                                    <a href="/editproduct/{{ $item-> id  }}" class="btn btn-primary">
                                    <i class="fas fa-edit">
                                    </i> Edit </a>
                                </p>
                            @endif
                            
                        </div>
				    </div>
                @endforeach

                <div style="width: 100%; display: flex; justify-content: center; align-items: center; margin-top: 30px;">
                    {{ $products->links() }}
                </div>

			</div>

		</div>
	</div>
@endsection

<style>
    svg{
        height: 50px !important;
    }
</style>