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
                        <h2>Reset Password</h2>
                        </div>
					</div>
                    <div class="row">
                        <div class="col-md-12">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        </div>
                    </div>
					<div class="row mt-3">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
							<div class="row">
								<div class="col-md-12">
                                <input type="text" name="email" value="{{ $email ?? old('email') }}" required readonly id="email" class="form__input @error('email') is-invalid @enderror" placeholder="Registered Email">
                                @error('email')
                                    <span class="invalid-feedback text-start" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
							</div>

                            <div class="row">

                            <div class="col-md-12">
                                <input id="password" type="password" placeholder="Password" class="form__input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form__input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
						
                            

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark w-100 my-4">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>


						</form>

                        
					</div>
					<div class="row">
						<p>Proceed to login ? <a href="{{ route('login') }}">Click Here</a></p>
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
