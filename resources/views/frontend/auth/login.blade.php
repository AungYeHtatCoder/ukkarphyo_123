@extends('user_layouts.master')

@section('style')
<style>
    .input-group{
        border-radius: 30px !important;
        background: #fff;
        padding: 5px;
    }
    .fa-user-circle{
        font-size: 25px;
    }
    input:focus {
        box-shadow: none !important;
        border: none !important;
    }
    #register{
        max-height: 100vh;
        padding-top: 150px;
    }

</style>
@endsection

@section('content')
<div class="container" id="register">
    {{-- <h1 class="text-center">Login Here</h1> --}}
    <div class="row">
        <div class="col-lg-8 col-md-10 offset-lg-2 offset-md-1">
            <a href="{{ url('/') }}" class="text-center text-decoration-none text-white">
                <img src="{{ asset('assets/img/logo.png') }}" width="100px" alt="" class="rounded-circle">
                <h3 class="mb-4">Aladdin 2D | 3D</h3>
            </a>
            <h4 class="text-center mb-4">Sign In</h4>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border border-0"><i class="fas fa-lock text-purple"></i></span>
                        <input type="text" name="login" class="form-control border border-0" placeholder="ဖုန်းနံပါတ် (သို့) အီးမေးလ်">
                        {{-- <span class="input-group-text bg-white border border-0">.00</span> --}}
                    </div>
                    @error('login')
                    <span class="text-danger d-block ps-3 pt-2">{{ "The email or phone field is required." }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border border-0"><i class="fas fa-key text-purple"></i></span>
                        <input type="password" name="password" id="password" class="form-control border border-0" placeholder="လျှို့ဝှက်နံပါတ်ထည့်ပါ">
                        <span class="input-group-text bg-white border border-0"><i class="fas fa-eye text-purple" id="eye" onclick="PwdView()" style="cursor: pointer;"></i></span>
                    </div>
                    @error('password')
                    <span class="text-danger d-block ps-3 pt-2">{{ $message }}</span>
                    @enderror
                </div>

                <div class="">
                    <div class="d-flex justify-content-end mb-4">
                        <a href="" class="text-decoration-none text-white">Forget Password?</a>
                    </div>
                    <button class="btn btn-purple text-white w-100" style="border-radius: 30px;" type="submit">Login</button>
                    <div class="d-flex justify-content-center mt-4">
                        <span>Are you a new user?</span>
                        <a href="{{ route('register') }}" class="text-white ms-2">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@section('script')
<script>
    function PwdView() {
        var x = document.getElementById("password");
        var y = document.getElementById("eye");

        if (x.type === "password") {
            x.type = "text";
            y.classList.remove('fa-eye');
            y.classList.add('fa-eye-slash');
        } else {
            x.type = "password";
            y.classList.remove('fa-eye-slash');
            y.classList.add('fa-eye');
        }
    }
</script>
@endsection
