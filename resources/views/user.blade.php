@extends('layouts.master')

@section('content')




    <div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Have you any question?</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, ratione! Laboriosam est, assumenda. Perferendis, quo alias quaerat aliquid. Corporis ipsum minus voluptate? Dolore, esse natus!</p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" id="fruitkha-contact" onsubmit="return valid_datas( this );" enctype="multipart/form-data" action="{{ route('storeuserdata') }}">
                            @csrf
							<p>
								<input type="text" placeholder="Name" name="name" id="name" value="{{ $user->name }}">
								<input type="email" placeholder="Email" name="email" id="email" value="{{ $user->email }}">
							</p>
							<p>
								<input type="tel" placeholder="Phone" name="phone" id="phone" value="{{ $user->phone }}">
								<input type="text" placeholder="Country" name="country" id="country" value="{{ $user->country }}">
							</p>
                            
							<p><textarea name="address" id="address" cols="30" rows="10" placeholder="Address">{{ $user->address }}</textarea></p>

                            <div class="mb-3">
                                <label for="imagepath" class="form-label fw-semibold">Update Profile Image</label>
                                <input class="form-control" type="file" name="imagepath" id="imagepath" accept="image/*"
                                >
                            </div>


							<input type="hidden" name="token" value="FsWga4&amp;@f6aw">
							<p><input type="submit" value="Save"></p>
						</form>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						

                        <div class="d-flex justify-content-center align-items-center">
                            <img 
                                src="{{ $user->imagepath ? asset('uploads/'.$user->imagepath) : asset('images/default-user.jpg') }}"    
                                alt="Profile" 
                                class="rounded-circle border border-3" 
                                style="width: 250px; height: 250px; object-fit: cover;"
                            >
                        </div>



					</div>
				</div>
			</div>
		</div>
	</div>


					



    
@endsection

