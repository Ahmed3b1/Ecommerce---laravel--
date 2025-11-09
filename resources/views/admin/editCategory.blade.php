@extends('layouts.adminmaster')

@section('content')



    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Edit</span> Category</h3>
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
						<form method="POST" enctype="multipart/form-data" action="/adminstorecategory" id="fruitkha-contact" >
                            @csrf()

                            <input type="hidden" name="id" id="id" value="{{ $category->id }}">

							<p>
                                <input class="form-control form-control-lg" type="text" required placeholder="Name" name="name" 
                                    id="name" value="{{ $category->name }}" aria-label=".form-control-lg example">

                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p style="display: flex; ">

                               
							</p>

							<p>
                                <textarea class="form-control" id="description" name="description" required
                                      rows="3" placeholder="Description">{{ $category->description }}</textarea>
                            </p>
                            <span class="text-danger">
                                    @error('description')
                                        {{ $message }}
                                    @enderror
                            </span>

                            <p>
        

                                
                            </p>
                           

                            <div class="input-group mb-3">
                                <input class="form-control" id="photo" name="photo" type="file">
                                <label class="input-group-text" for="inputGroupFile02">Upload New Image</label>
                            </div>

                            <span class="text-danger">
                                    @error('photo')
                                        {{ $message }}
                                    @enderror
                            </span>

                            @if($category->imagepath)
								<div class="text-center mb-4">
									<img src="{{asset($category -> imagepath)}}" class="img-thumbnail rounded shadow-sm" width="250" height="250">
								</div>
							@endif

							<p>
                                <button class="btn btn-primary mb-3" type="submit">Save</button>
                            </p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



    
@endsection