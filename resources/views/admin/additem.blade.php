@extends('layouts.adminmaster')

@section('content')

    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Add</span> Products</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" enctype="multipart/form-data" action="/adminstoreitem" id="fruitkha-contact" >
                            @csrf()
							<p>
                                <input class="form-control form-control-lg" type="text" required placeholder="Name" name="name" 
                                    id="name" value="{{old('name')}}" aria-label=".form-control-lg example">

                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p style="display: flex; ">

                               <input class="form-control form-control-lg" style="width: 50%;" type="number" required placeholder="Price" name="price" 
                                    id="price" value="{{old('price')}}" aria-label=".form-control-lg example"> 


                                <span class="text-danger">
                                    @error('price')
                                        {{ $message }}
                                    @enderror
                                </span>



                                <input class="form-control form-control-lg" type="number" style="width: 50%;" required placeholder="Quantity" name="quantity" 
                                    id="quantity" value="{{old('quantity')}}" aria-label=".form-control-lg example">

                                <span class="text-danger">
                                    @error('quantity')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p>
                                <textarea class="form-control" id="description" name="description" required
                                      rows="3" placeholder="Description">{{old('description')}}</textarea>
                            </p>
                            <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                            </span>

                            <p>
        

                                <select class="form-select" required name="category_id" id="category_id" aria-label="Disabled select example" >
                                    {{-- <option selected>Category...</option> --}}
                                    @foreach ($allcategories as $item)
                                        <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <span class="text-danger">
                                    @error('category_id')
                                        {{ $message }}
                                    @enderror
                            </span>

                            <div class="input-group mb-3">
                                <input class="form-control" id="photo" name="photo" type="file">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>

                            <span class="text-danger">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                            </span>

							<p>
                                <button class="btn btn-primary mb-3" type="submit">Add Item</button>
                            </p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

                
@endsection