@extends('user_layouts.master')
@section('content')
@include('user_layouts.navbar')
<div class="container-fluid py-5 mt-5">
 <div class="nine-thirty pb-5 pt-2">
  <h5 class="text-center">တစ်လအတွင်း 2D ကံထူးရှင်များ</h5>
  <div class="card mt-2 bg-transparent shadow border border-1">
   <div class="card-header">
    <p class="text-center text-white">
     <script>
      var d = new Date();
      document.write(d.toLocaleDateString());
     </script>
     <br />
     <script>
      var d = new Date();
      document.write(d.toLocaleTimeString());
     </script>
    </p>
   </div>
  </div>

  <div>

   <span class="font-weight-bold" style="font-size: 30px;color: #fff">{{ $winners->count() }}
    @if($winners->count() > 1)
    ကံထူးရှင်များ
    @else
    ကံထူးရှင်များ
    @endif
   </span>
  </div>

  <div class="p-1 mt-3" style="border-bottom: 200px;">
   @if($winners->isEmpty())
   <p style="color: #f5bd02">No winners found for the past month.</p>
   @else
   <table class="winner-table table table-striped">
    @foreach($winners as $index => $winner)
    <tr>
     {{-- <td class="mt-2">1.</td> --}}
     <td>
      {{ $index + 1 }}
     </td>
     <td>
      @if($winner->profile)
      <img src="{{ $winner->profile }}" width="50px" height="50px" style="border-radius: 50%" alt="" />
      @else
      <i class="fa-regular fa-circle-user" style="font-size: 50px;"></i>
      @endif
     </td>
     <td><span style="font-size: 10px">{{ $winner->name }}</span>
      <p style="font-size: 10px">{{ $winner->phone }}</p>
     </td>
     {{-- <td><span>Session</span>
            <p>{{ ucfirst($winner->session) }}</p>
     </td> --}}
     <td><span>ပေါက်ဂဏန်း</span>
      <p>{{ $winner->prize_no }}</p>
     </td>
     <td><span>ထိုးငွေ</span>
      <p>{{ $winner->sub_amount }}</p>
     </td>
     <td><span>ထီပေါက်ငွေ</span>
      <p>{{ $winner->prize_amount }}</p>
     </td>
    </tr>
    @endforeach

   </table>
   @endif

  </div>
 </div>

</div>

@include('user_layouts.footer')
@endsection
@section('script')
@endsection