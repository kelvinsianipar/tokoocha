@extends('frontend.layout')

@section('content')
		
	<div class="shop-page-wrapper shop-page-padding ptb-100">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
                    @if(session()->has('message'))
                        <div class="content-header mb-3 pb-0">
                            <div class="container-fluid">
                                <div class="mb-0 alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                                    <strong>{{ session()->get('message') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> 
                            </div><!-- /.container-fluid -->
                        </div>
                    @endif
					<div class="login">
						<div class="login-form-container">
							<div class="login-form">
                                    <form action="{{ url('profile') }}" method="post">
									@csrf
                                    @method('put')
									<div class="form-group row">
										<div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Nama Awal <span class="required">*</span></label>										
                                                <input type="text" name="first_name" value="{{ old('first_name', auth()->user()->first_name) }}">
                                            </div>
											@error('first_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Nama Akhir <span class="required">*</span></label>										
                                                <input type="text" name="last_name" value="{{ old('last_name', auth()->user()->last_name) }}">
                                            </div>
                                            @error('last_name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Alamat <span class="required">*</span></label>
                                                <input type="text" name="address1" value="{{ old('address1', auth()->user()->address1) }}">
                                            </div>
                                            @error('address1')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
								
										<div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>No. Telepon  <span class="required">*</span></label>										
                                                <input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
                                            </div>
											@error('phone')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12">
											<div class="checkout-form-list">
											<label>Alamat Email  <span class="required">*</span></label>	
                                            <input type="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" placeholder="Email">
										</div>
											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									<div class="button-box">
										<button type="submit" class="default-btn floatright">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- register-area end -->
@endsection