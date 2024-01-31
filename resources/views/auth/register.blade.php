@extends('layouts')

@section('content')
<section class="vh-100 ">
    <div class="mask d-flex align-items-center h-100 custom-margin-top">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="{{ route('store') }}" method="post">
                                @csrf
                                <div class="form-outline mb-3">
                                    <label for="name" class="form-floating">Your Name</label>
                                    <input type="text" id="name" name="name" class="form-control form-control-lg border @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-3">
                                    <label for="email" class="form-floating">Email</label>
                                    <input type="text" id="email" name="email" class="form-control form-control-lg border @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-3">
                                    <label for="password" class="form-floating">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg border @error('password') is-invalid @enderror" value="{{ old('password') }}"/>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-outline mb-3">
                                    <label for="password_confirmation" class="form-floating">Confirm Password</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg border"/>
                                </div>

                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" />
                                    <label class="form-check-label">
                                        I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <input type="submit" class="btn btn-success btn-block btn-lg text-body" value="Register"></input>
                                </div>

                                <p class="text-center text-muted mt-4 mb-0">Have already an account? <a href="{{ route('login') }}"
                                        class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection