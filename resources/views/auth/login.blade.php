@extends('auth.app')

@section('content')
<!-- Main Content -->
<div class="container-fluid">
		<div class="row main-content bg-success mx-auto">
			<div class="col-md-4 text-center company__info">
				<span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
				<h4 class="company_title">Your Company Logo</h4>
			</div>
			<div class="col-md-8 col-xs-12 col-sm-12 login_form p-4">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
                        <h2>Login to Continue</h2>
                        </div>
					</div>
					<div class="row mt-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
							<div class="row">
								<input type="text" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus id="username" class="form__input @error('email') is-invalid @enderror" placeholder="Username">
                                @error('email')
                                    <span class="invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="row">
								<!-- <span class="fa fa-lock"></span> -->
								<input type="password"  name="password" required autocomplete="current-password" id="password" class="form__input @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
							</div>
							<div class="row">
								<div class="col-md-12">
                                <input type="checkbox" name="remember_me" id="remember_me"> Remember Me
                                </div>
								
							</div>
							<div class="row">
								<input type="submit" class="btn btn-dark w-100 my-4" value="Login" class="btn">
							</div>
						</form>

                        
					</div>
					<div class="row">
						<p>Forgot Password ? <a href="{{ route('password.request') }}">Click Here</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="container-fluid text-center footer">
    <strong>Copyright &copy; {{date('Y')}} <a target="_blank" href="https://guisrilanka.com/">GUI Solutions Lanka</a>.</strong>
    All rights reserved.
	</div>
@endsection
