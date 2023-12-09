@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

<!-- content -->
<div class="container-fluid py-5 mt-5" id="content">
    <!-- subnav -->
    <div class="d-flex justify-content-around text-white bg-purple shadow rounded-4 py-4 mb-4">
        <a href="./2d_result.html" class="text-center text-decoration-none text-white">
            <i class="fas fa-list d-block fa-2x mb-2"></i>
            <p class="mb-0">မှတ်တမ်း</p>
        </a>
        <a href="./2d_winner_page.html" class="text-center text-decoration-none text-white">
            <i class="fas fa-star d-block fa-2x mb-2"></i>
            <p class="mb-0">ကံထူးရှင်များ</p>
        </a>
        <a href="" class="text-center text-decoration-none text-white">
            <i class="fas fa-calendar d-block fa-2x mb-2"></i>
            <p class="mb-0">ပိတ်ရက်</p>
        </a>
    </div>
    <!-- subnav -->
    <!-- winner result -->
    <div class="row my-4">
        <div class="text-center text-white">
            <h1 class="" style="font-size:90px;" id="live_2d">07</h1>
            <p>Updated: <span id="live_updated_time">10-0-2023 4:30:00PM</span></p>
            </div>
        <div class="text-center">
            <button class="btn btn-purple text-white" data-bs-toggle="modal" data-bs-target="#playtwod">ထိုးမည်</button>
            {{-- <a href="2d-numbers.html" class="btn btn-purple text-white">ထိုးမည်</a> --}}
        </div>
    </div>
    <!-- winner result -->
    <!-- 2d lists -->
    <div class="container-fluid" style="margin-bottom:80px;" id="result"></div>
    <!-- 2d lists -->
</div>
<!-- content -->

<!-- Modal -->
<div class="modal fade" id="playtwod">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-purple"  id="exampleModalLongTitle">ထိုးမည့်အချိန် (section) ကိုရွေးပါ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="playTime">
                <a href="{{ route('user.twoDPlayAM') }}" class="btn btn-purple text-purple w-100">09:30 AM</a>
            </div>
            <div class="playTime">
                <a href="{{ route('user.twoDPlay12PM') }}" class="btn btn-purple text-purple w-100">12:00 PM</a>
            </div>
            <div class="playTime">
                <a href="{{ route('user.twoDPlay2PM') }}" class="btn btn-purple text-purple w-100">02:00 PM</a>
            </div>
            <div class="playTime">
                <a href="{{ route('user.twoDPlay4PM') }}" class="btn btn-purple text-purple w-100">04:30 PM</a>
            </div>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-purple bg-purple text-white w-100">ထိုးမည်</button>
        </div> --}}
      </div>
    </div>
</div>
{{-- modals --}}

@include('user_layouts.footer')
@endsection

@section('script')
<script>
    (function() {
        const fetchData = () => {
            const url = 'https://api.thaistock2d.com/live';

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const updatedTime = new Date(data.live.time);
                    const day = updatedTime.getDate().toString().padStart(2, '0');
                    const month = (updatedTime.getMonth() + 1).toString().padStart(2, '0');
                    const year = updatedTime.getFullYear();
                    let hours = updatedTime.getHours();
                    const minutes = updatedTime.getMinutes();
                    const ampm = hours >= 12 ? 'PM' : 'AM';
                    hours = hours % 12;
                    hours = hours ? hours : 12;
                    const updatedTimeFormat = `${day}-${month}-${year} ${hours}:${minutes.toString().padStart(2, '0')}:${updatedTime.getSeconds().toString().padStart(2, '0')}${ampm}`;

                    $("#live_2d").text(data.live.twod);
                    $("#live_updated_time").text(updatedTimeFormat);

                    let newHTML = '';
                    data.result.forEach(r => {
                        newHTML += `
                            <div class="digit-card mb-1 rounded-4 mb-2">
                              <h5 class="text-center">${r.open_time}</h5>
                              <div class="multi-text">
                                <div class="">
                                  <p>Set</p>
                                  <p>${r.set}</p>
                                </div>
                                <div class="">
                                  <p>Value</p>
                                  <p>${r.value}</p>
                                </div>
                                <div class="">
                                  <p>2D</p>
                                  <p>${r.twod}</p>
                                </div>
                              </div>
                          </div>
                        `;
                    });
                    $('#result').html(newHTML);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        setInterval(fetchData, 1000);
    })();


</script>
@endsection

