@extends('frontend.layout')

<style>
	@import url("{{ asset('themes/ezone/assets/css/register.css') }}");
  </style>
  
@section('content')
		<div class="container-fluid">
			<div class="breadcrumb-content text-center">
				<h2>Register</h2>
				<ul>
					<li><a href="#">home</a></li>
					<li>register</li>
				</ul>
			</div>
	</div>
	
	<div class="form-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-12 col-lg-12 col-xl-6 ml-auto mr-auto">
					<div class="form-container">
						<h3 class="title">Register</h3>
						<form method="POST" action="{{ route('register') }}" class="form-horizontal">
							@csrf
							<div class="form-group">
								<label>Nama Depan</label>
								<div class="col-md-12">
								<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Nama Depan">
								@error('first_name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Nama Belakang</label>
								<div class="col-md-12">
									<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Nama Belakang">
									@error('last_name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Alamat Email</label>
								<div class="col-md-12">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat E-mail">
									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Password</label>
								<div class="col-md-12">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Kata Sandi">
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>
							<div class="form-group">
								<label>Confirm Password</label>
								<div class="col-md-12">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Kata Sandi">										
								</div>
							</div>
							<span class="signin-link">Sudah mempunyai akun? klik disini<a href="/login">Login</a></span>
							<button type="submit" class="btn signup" href="/login">Daftar Sekarang</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection