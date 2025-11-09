@extends('layouts.master')

@section('content')
    

    <div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text"></span> Reviews</h3>
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
						<form method="POST" action="/storereview" id="fruitkha-contact" >
                            @csrf()
							<p>
								<input type="text"  class="mr-3" required placeholder="Name" name="name" id="name" 
                                value="{{old('name')}}">
                                <span class="text-danger">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </span>

                                <input type="text"  required  placeholder="Phone" name="phone" 
                                value="{{old('phone')}}" id="phone">
                                <span class="text-danger">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p style="display: flex; ">
                                <input type="email"   required class="mr-3" placeholder="Email" name="email" 
                                value="{{old('email')}}" id="email">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>

								<input type="text"   required placeholder="Subject" name="subject" 
                                value="{{old('subject')}}" id="subject">
                                <span class="text-danger">
                                    @error('subject')
                                        {{ $message }}
                                    @enderror
                                </span>
							</p>

							<p>
                                <textarea name="message"  id="message" required cols="30" rows="10"  placeholder="Message">
                                    {{old('message')}}
                                </textarea>
                            </p>
                            <span class="text-danger">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                            </span>


							<p><input type="submit" value="Add"></p>
						</form>
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

                        @foreach ($reviews as $item)
                            <div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>{{ $item ->name }}<span>{{ $item ->subject }}</span></h3>
								<p class="testimonial-body">
                                    {{ $item ->message }}
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
                        @endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>




@endsection