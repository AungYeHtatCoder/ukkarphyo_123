@extends('user_layouts.master')

@section('style')

@endsection

@section('content')
@include('user_layouts.navbar')

<div class="mt-5 pt-4" style="padding-bottom: 100px;">
    <p class="text-center fs-4 fw-bold mt-3 text-white">2D Calendar</p>
    <div id="2dCalender"></div>
</div>


@include('user_layouts.footer')
@endsection

@section('script')
<script>
    async function fetchData() {
      const url = 'https://shwe-2d-live-api.p.rapidapi.com/calender';
      const options = {
        method: 'GET',
        headers: {
          'X-RapidAPI-Key': '4c6bcd02e8msh0665010fc0fab0fp1a2d33jsn173e389166b3',
          'X-RapidAPI-Host': 'shwe-2d-live-api.p.rapidapi.com'
        }
      };

      try {
        const response = await fetch(url, options);
        const result = await response.json(); // Parse the response as JSON
        const calendar = result.message;
        // console.log(calendar);

                let newHTML = '';
                    calendar.forEach(r => {
                        let originalString = r.update;
                        let dateString = originalString.split(':')[1].trim().split(' ')[0];
                        let dateObj = new Date(dateString.replace(/(\d{2})\/(\w{3})\/(\d{4})/, '$2 $1, $3'));
                        let formattedDate = dateObj.toISOString().split('T')[0];
                        let days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                        let dayOfWeek = days[dateObj.getDay()];
                        let updatedTime = `${dateString} (${dayOfWeek})`;
                        // console.log(dateString);

                        newHTML += `
                        <div class="card p-3 bg-transparent border-purple mb-4 text-center">
                            <p class="text-center fw-bold text-warning">${updatedTime}</p>
                            <table class='table bg-purple text-white text-center mb-3 pb-'>
                                <tr class='text-center'>
                                    <th>Time</th>
                                    <th>Internet</th>
                                    <th>Modern</th>
                                </tr>
                                <tr>
                                    <td>9:30AM</td>
                                    <td>${r.a9_internet}</td>
                                    <td>${r.a9_modern}</td>
                                </tr>
                                <tr>
                                    <td>2:00PM</td>
                                    <td>${r.a2_internet}</td>
                                    <td>${r.a2_modern}</td>
                                </tr>
                            </table>
                            <table class="table bg-purple text-white mt-0 pt-0">
                                <tr class='text-center'>
                                    <th>Time</th>
                                    <th>BTC</th>
                                    <th>ETH</th>
                                    <th>2D</th>
                                </tr>
                                <tr>
                                    <td>12:00PM</td>
                                    <td>${r.a12_set}</td>
                                    <td>${r.a12_value}</td>
                                    <td>${r.a12_result}</td>
                                </tr>
                                <tr>
                                    <td>4:30PM</td>
                                    <td>${r.a43_set}</td>
                                    <td>${r.a43_value}</td>
                                    <td>${r.a43_result}</td>
                                </tr>
                            </table>
                        </div>

                        `;
                    });
                $('#2dCalender').html(newHTML);

        console.log(calendar);
      } catch (error) {
        console.log(error);
      }
    }
    fetchData();
</script>
@endsection

