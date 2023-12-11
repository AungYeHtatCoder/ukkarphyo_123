@extends('user_layouts.master')

@section('content')
@include('user_layouts.navbar')
<!-- content -->
<div class="container-fluid position-relative py-5 my-5">
 <!-- bet action section  -->
 <div class="d-flex flex-column justify-content-center align-items-center w-100 mt-5 balance_action_box bg-purple">
  <div class="py-5">
   <h1 class="fw-bold ls-wide" style="font-size:5rem; font-family: 'Gabarito', sans-serif; letter-spacing: 7px;">821
   </h1>
  </div>
 </div>
 <div class="my-1">
  <a href="{{ url('/user/three-d-choice-play-index') }}" class="btn bg-purple p-3 text-white text-center w-100 rounded-4">
   3D ထိုးမယ်
  </a>
 </div>
 <!-- bet action section  -->
 <div class="mt-4">
  <ul class="list-group">
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">01.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">951</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">351</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">402</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">604</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">120</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">754</span>
     </div>
    </div>
   </li>
   <li class="rounded-3 list-group-item my-2 threed_list bg-transparent">
    <div class="d-flex justify-content-between align-items-center">
     <div>
      <h5>Date</h5>
      <span class="text-info">07.11.2023</span>
     </div>
     <div>
      <h5>3D</h5>
      <span class="text-warning">352</span>
     </div>
    </div>
   </li>
  </ul>
 </div>
</div>
<!-- content -->

@include('user_layouts.footer')
@endsection