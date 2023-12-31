@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')
    <div class="container mt-2 py-5 mb-5">
        <div class="two-history-results mt-3 mx-auto d-flex justify-content-center mt-5">
            <p class="text-center fw-bold" style="font-size: 4rem;" id="two_d_live">37</p>
        </div>
       <p class="text-center fw-bold py-3 mx-0 px-0 text-white" id="updated_time"></p>

       <div class="">
        <div class="card text-center p-0 cards bg-transparent text-white border-purple mb-3">
         <div class="card-body">
          <div class="text-center">
           <div class="d-flex justify-content-between text-center">
             <div>
                 <p>AM</p>
                 <p id="">Live</p>
             </div>
             <div>
                 <p>BTC</p>
                 <p id="live_set"></p>
             </div>
             <div>
                 <p>ETH</p>
                 <p id="live_value"></p>
             </div>
             <div>
                 <p>2D</p>
                 <p id="live_result"></p>
             </div>
           </div>
          </div>
         </div>
        </div>
        <div class="card text-center p-0 cards bg-transparent text-white border-purple mb-3">
         <div class="card-body">
          <div class="text-center">
           <div class="d-flex justify-content-between">
             <div>
                 <p>AM</p>
                 <p id="">9:30</p>
             </div>
             <div>
                 <p>Internet</p>
                 <p id="a9_internet"></p>
             </div>
             <div>
                 <p>Modern</p>
                 <p id="a9_modern"></p>
             </div>
           </div>
          </div>
         </div>
        </div>
        <div class="card text-center p-0 cards bg-transparent text-white border-purple mb-3">
         <div class="card-body">
          <div class="text-center">
           <div class="d-flex justify-content-between text-center">
             <div>
                 <p>AM</p>
                 <p>12:00</p>
             </div>
             <div>
                 <p>BTC</p>
                 <p id="a12_set"></p>
             </div>
             <div>
                 <p>ETH</p>
                 <p id="a12_value"></p>
             </div>
             <div>
                 <p>2D</p>
                 <p id="a12_result"></p>
             </div>
           </div>
          </div>
         </div>
        </div>
        <div class="card text-center p-0 cards bg-transparent text-white border-purple mb-3">
         <div class="card-body">
          <div class="text-center">
           <div class="d-flex justify-content-between">
             <div>
                 <p>PM</p>
                 <p>02:00</p>
             </div>
             <div>
                 <p>Internet</p>
                 <p id="a2_internet"></p>
             </div>
             <div>
                 <p>Modern</p>
                 <p id="a2_modern"></p>
             </div>
           </div>
          </div>
         </div>
        </div>
        <div class="card text-center p-0 cards bg-transparent text-white border-purple mb-3">
         <div class="card-body">
          <div class="text-center">
           <div class="d-flex justify-content-between">
             <div>
                 <p>PM</p>
                 <p>04:30</p>
             </div>
             <div>
                 <p>BTC</p>
                 <p id="a43_set"></p>
             </div>
             <div>
                 <p>ETH</p>
                 <p id="a43_value"></p>
             </div>
             <div>
                 <p>2D</p>
                 <p id="a43_result"></p>
             </div>
           </div>
          </div>
         </div>
        </div>
       </div>
    </div>
</div>



@include('user_layouts.footer')
@endsection

@section('script')<script>
    async function fetchData() {
      const url = 'https://shwe-2d-live-api.p.rapidapi.com/live';
      const options = {
        method: 'GET',
        headers: {
          'X-RapidAPI-Key': '53aaa0f305msh5cdcf7afaacaedcp11a2d2jsn2453bc4f2507',
          'X-RapidAPI-Host': 'shwe-2d-live-api.p.rapidapi.com'
        }
      };

      try {
        const response = await fetch(url, options);
        const result = await response.json(); // Parse the response as JSON


        // document.getElementById("two_d_live").innerText = result.live_result
        $("#updated_time").text(result.update);

        $("#two_d_live").text(result.live_result);
        $("#live_result").text(result.live_result);
        $("#live_set").text(result.live_set);
        $("#live_value").text(result.live_value);

        // $("#a9_result").text(result.a9_internet);
        $("#a9_internet").text(result.a9_internet);
        $("#a9_modern").text(result.a9_modern);

        $("#a12_result").text(result.a12_result);
        $("#a12_set").text(result.a12_set);
        $("#a12_value").text(result.a12_value);

        // $("#a2_result").text(result.a2_internet);
        $("#a2_internet").text(result.a2_internet);
        $("#a2_modern").text(result.a2_modern);

        $("#a43_result").text(result.a43_result);
        $("#a43_set").text(result.a43_set);
        $("#a43_value").text(result.a43_value);
        // console.log(result);
      } catch (error) {
        console.error(error);
      }
    }
    fetchData();
</script>
@endsection

