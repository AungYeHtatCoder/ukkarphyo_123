@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

{{-- content --}}
<div style="margin-top:90px;">
    <a href="" class="border-purple rounded-3 d-block text-decoration-none mb-3 py-3">
        <div class="d-flex justify-content-around">
            <div class="mx-3">
                <img class="rounded w-sm-100 m-auto d-block" src="{{ asset('user_app/assets/img/banking/aya_logo.png') }}" width="90px" alt="">
            </div>
            <div class="mx-3">
                <h6 class="text-warning">Lorem ipsum adipisicing elit.</h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
    </a>
    <a href="" class="border-purple rounded-3 d-block text-decoration-none mb-3 py-3">
        <div class="d-flex justify-content-around">
            <div class="mx-3">
                <img class="rounded w-sm-100 m-auto d-block" src="{{ asset('user_app/assets/img/banking/kpay.png') }}" width="90px" alt="">
            </div>
            <div class="mx-3">
                <h6 class="text-warning">Lorem ipsum adipisicing elit.</h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
    </a>
    <a href="" class="border-purple rounded-3 d-block text-decoration-none mb-3 py-3">
        <div class="d-flex justify-content-around">
            <div class="mx-3">
                <img class="rounded w-sm-100 m-auto d-block" src="{{ asset('user_app/assets/img/banking/wpay.png') }}" width="90px" alt="">
            </div>
            <div class="mx-3">
                <h6 class="text-warning">Lorem ipsum adipisicing elit.</h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
    </a>
    <a href="" class="border-purple rounded-3 d-block text-decoration-none mb-3 py-3">
        <div class="d-flex justify-content-around">
            <div class="mx-3">
                <img class="rounded w-sm-100 m-auto d-block" src="{{ asset('user_app/assets/img/banking/cbpay.png') }}" width="90px" alt="">
            </div>
            <div class="mx-3">
                <h6 class="text-warning">Lorem ipsum adipisicing elit.</h6>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>
    </a>
</div>


{{-- content --}}

@include('user_layouts.footer')
@endsection

@section('script')

@endsection

