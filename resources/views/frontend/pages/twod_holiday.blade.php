@extends('user_layouts.master')

@section('style')
<style>

</style>
@endsection

@section('content')
@include('user_layouts.navbar')

<div id="2dHoliday" style="padding-top:100px;"></div>

@include('user_layouts.footer')
@endsection

@section('script')
<script>
    async function fetchData() {
      const url = 'https://shwe-2d-live-api.p.rapidapi.com/holiday';
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

        console.log(result);
      } catch (error) {
        console.error(error);
      }
    }
    fetchData();
</script>
<script>
    function getWeekendsInMonth() {
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth();
        const weekends = [];

        // Loop through each day in the month
        for (let day = 1; day <= 31; day++) {
            const date = new Date(year, month, day);

            // Check if the current day is in the same month
            if (date.getMonth() !== month) {
            break;
            }

            // Check if the current day is a Saturday or Sunday
            if (date.getDay() === 0 || date.getDay() === 6) {
                const formattedDate = date.toLocaleString('en-US', { weekday: 'long', day: 'numeric', month: 'short', year: 'numeric' });
                weekends.push(formattedDate);
            }
        }

        return weekends.reverse();
    }

    // Get this month's weekends
    const thisMonthsWeekends = getWeekendsInMonth();
    console.log(thisMonthsWeekends);

    let newHTML = '';
    thisMonthsWeekends.forEach(r => {
        newHTML += `
        <div class="px-5 py-3">
            <div class="d-flex">
                <div class="me-5">
                    <i class="fas fa-calendar-xmark text-danger" style="font-size: 40px;"></i>
                </div>
                <div>
                    <h6 class="fw-bold pb-0 mb-0">${r}</h6>
                    <small>2D ပိတ်ရက်</small>
                </div>
            </div>
            <hr class="divider">
        </div>
        `;
        });
    $('#2dHoliday').html(newHTML);

</script>
@endsection

