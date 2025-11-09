@extends('layouts.adminmaster')

@section('content')

<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3><span class="orange-text">Add</span> Products</h3>
					<img src="data:image/svg+xml;base64,{{ base64_encode($qrCode) }}" alt="QR Code" class="my-3">
					<div class="m-5">
						{!! $barcode !!}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-8 offset-lg-2">
				<div class="card shadow-lg border-0 rounded-3">
					<div class="card-body p-5">
						<form method="POST" enctype="multipart/form-data" action="/adminstoreitem" id="fruitkha-contact">
							@csrf()

							<input type="hidden" name="id" id="id" value="{{ $product -> id }}">

							<div class="mb-3">
								<label for="name" class="form-label fw-bold">Product Name</label>
								<input type="text" class="form-control" required placeholder="Name" name="name" id="name" 
									value="{{ $product -> name }}">
								<span class="text-danger small">
									@error('name')
										{{ $message }}
									@enderror
								</span>
							</div>

							<div class="row">
								<div class="col-md-6 mb-3">
									<label for="price" class="form-label fw-bold">Price</label>
									<input type="number" class="form-control" required placeholder="Price" name="price" 
										value="{{ $product -> price }}" id="price">
									<span class="text-danger small">
										@error('price')
											{{ $message }}
										@enderror
									</span>
								</div>
								<div class="col-md-6 mb-3">
									<label for="quantity" class="form-label fw-bold">Quantity</label>
									<input type="number" class="form-control" required placeholder="Quantity" name="quantity" 
										value="{{ $product -> quantity }}" id="quantity">
									<span class="text-danger small">
										@error('quantity')
											{{ $message }}
										@enderror
									</span>
								</div>
							</div>

							<div class="mb-3">
								<label for="description" class="form-label fw-bold">Description</label>
								<textarea name="description" id="description" required class="form-control" rows="5" placeholder="Description">{{ $product -> description }}</textarea>
								<span class="text-danger small">
									@error('description')
										{{ $message }}
									@enderror
								</span>
							</div>

							<div class="mb-3">
								<label for="category_id" class="form-label fw-bold">Category</label>
								<select class="form-select" required name="category_id" id="category_id">
									@foreach ($allcategories as $item)
										@if ($item->id == $product->category_id)
											<option value="{{ $item -> id }}" selected>{{ $item -> name }}</option>
										@else
											<option value="{{ $item -> id }}">{{ $item -> name }}</option>
										@endif
									@endforeach
								</select>
								<span class="text-danger small">
									@error('category_id')
										{{ $message }}
									@enderror
								</span>
							</div>

							<div class="mb-3">
								<label for="photo" class="form-label fw-bold">Upload New Image</label>
								<input type="file" class="form-control" name="photo" id="photo">
								<span class="text-danger small">
									@error('photo')
										{{ $message }}
									@enderror
								</span>
							</div>

							@if($product->imagepath)
								<div class="text-center mb-4">
									<img src="{{asset($product -> imagepath)}}" class="img-thumbnail rounded shadow-sm" width="250" height="250">
								</div>
							@endif

							<div class="text-center">
								<button type="submit" class="btn btn-primary px-5 py-2 fw-bold">💾 Save Product</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
