@extends('frontend.layout')

@section('content')
<div class="form-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-4 col-lg-4 col-xl-4 ml-auto mr-auto">
                <div class="form-container">
                    <div class="form-icon"><i class="fa fa-user"></i></div>
                    <h3 class="title">Login</h3>
						<form method="POST" action="{{ route('login') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn">Masuk</button>
                            <p></p>
                            <li><a href="{{ url('register') }}" style="font-size: 15px;  font-weight: bold;">Register</a></li>

                        </form>
					</form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection