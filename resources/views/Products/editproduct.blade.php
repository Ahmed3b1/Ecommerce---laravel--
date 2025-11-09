@extends('layouts.master')

@section('content')


    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Add</span> Products</h3>
                        <img src="data:image/svg+xml;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
                        <div class="m-5">
                            {!! $barcode !!}
                        </div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" enctype="multipart/form-data" action="/storeproduct" id="fruitkha-contact" >
                            @csrf()
							<p>
								<input type="hidden"  style="width: 100%;" required placeholder="" name="id" id="id" 
                                    value="{{ $product -> id }}">
								<input type="text"  style="width: 100%;" required placeholder="Name" name="name" id="name" 
                                    value="{{ $product -> name }}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p style="display: flex; ">
                                <input type="number"  style="width: 50%;" required class="mr-4" placeholder="Price" name="price" 
                                    value="{{ $product -> price }}" id="price">
                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>

								<input type="number"  style="width: 50%;" required placeholder="Quantity" name="quantity" 
                                    value="{{ $product -> quantity }}" id="quantity">
                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p>
                                <textarea name="description"  id="description" required cols="30" rows="10"  placeholder="Description">
                                    {{ $product -> description }}
                                </textarea>
                            </p>
                            <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                            </span>

                            <p>
                                <select class="form-control" required name="category_id" id="category_id">
                                    @foreach ($allcategories as $item)
                                        @if ($item->id == $product->category_id)
                                            <option value="{{ $item -> id }}" selected>{{ $item -> name }}</option>
                                        @else
                                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </p>
                            <span class="text-danger">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                            </span>

                            <p>
                                <input type="file" class="form-control" name="photo" id="photo">
                            </p>
                            <span class="text-danger">
                                @error('photo')
                                {{ $message }}
                                @enderror
                            </span>
                            
                            <p><img src="{{asset($product -> imagepath)}}" width="250" height="250"></p>

							<p><input type="submit" value="Save"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

                
@endsection