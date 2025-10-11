<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/panchang_style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<div class="panchang_main_wrap" style="padding-top: 20px; padding-bottom: 20px;">
    <div class="data panchang_wrapper">
        <div class="panchang-container">
            <div class="panchang-header">
                <div class="icon-container">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="header-text">
                    <h1>Today's Panchang</h1>
                    <div class="date">
                        <i class="fas fa-calendar-day"></i>
                        <span id="panchang-day"></span>, <span id="panchang-date"></span>
                    </div>
                </div>
            </div>
            <div class="panchang-content">
                <div class="grid-container">
                    <div class="panchang-card">
                        <div class="card-title">
                            <i class="fas fa-moon"></i>
                            <h2>Tithi & Nakshatra</h2>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-star-and-crescent"></i> Tithi:</div>
                            <div class="detail-value time-highlight" id="tithi"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-clock"></i> Start:</div>
                            <div class="detail-value time-highlight" id="tithi-start"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-clock"></i> End:</div>
                            <div class="detail-value time-highlight" id="tithi-end"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-star"></i> Nakshatra:</div>
                            <div class="detail-value time-highlight" id="nakshatra"></div>
                        </div>
                    </div>
                    <div class="panchang-card">
                        <div class="card-title">
                            <i class="fas fa-sun"></i>
                            <h2>Sun Timings</h2>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-sun"></i> Sunrise:</div>
                            <div class="detail-value time-highlight" id="sunrise"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-sun"></i> Sunset:</div>
                            <div class="detail-value time-highlight" id="sunset"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-yin-yang"></i> Yoga:</div>
                            <div class="detail-value time-highlight" id="yoga"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-hourglass-half"></i> Karana:</div>
                            <div class="detail-value time-highlight" id="karana"></div>
                        </div>
                    </div>
                    <div class="panchang-card">
                        <div class="card-title">
                            <i class="fas fa-clock"></i>
                            <h2>Important Periods</h2>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-fire"></i> Rahukaal:</div>
                            <div class="detail-value time-highlight" id="rahukaal"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-skull"></i> Gulika:</div>
                            <div class="detail-value time-highlight" id="gulika"></div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-label"><i class="fas fa-balance-scale"></i> Yamakanta:</div>
                            <div class="detail-value time-highlight" id="yamakanta"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <script class="Panchang">

        function checkAndDeductPanchangCredits(credits)
        {
            return axios.post("{{ url('check-credits') }}", {
                credits: credits,
                shop_id: "{{ session('shop_id') }}",
                _token: "{{ csrf_token() }}"
            }).then(response => {
              
                if(response.data.is_available)
                {
                    return 1;
                }
                else
                {
                    console.log("Note: You don`t have enough credits to generate panchang.");
                    return 0;
                }
            });
        }

        var now = new Date();
        var hours = now.getHours().toString().padStart(2, '0');
        var minutes = now.getMinutes().toString().padStart(2, '0');
        var formattedTime = `${hours}:${minutes}`;
        var day = String(now.getDate()).padStart(2, '0');
        var month = String(now.getMonth() + 1).padStart(2, '0');
        var year = now.getFullYear();
        var currentDate = `${day}/${month}/${year}`;
      
      
		
      	checkAndDeductPanchangCredits('{{ config("constants.panchang_data_api_charge") }}').then(result => {
        
          if(result === 1)
          {
            /* document.addEventListener('DOMContentLoaded', function() { */
                var url = `https://api.jyotishamastroapi.com/api/panchang/panchang?date=${currentDate}&time=${formattedTime}&latitude=24&longitude=76&tz=5.5&lang=en`;
                axios.get(url, {
                    headers: { key: "{{ $jyotisham_astro_api }}" }
                })
                .then(response => {
                    var data = response.data.response;
                    var rawDate = data.date;
                    var formattedDate = new Date(rawDate).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
                    document.getElementById('panchang-day').textContent = data.day.name;
                    document.getElementById('panchang-date').textContent = formattedDate;
                    document.getElementById('tithi').textContent = `${data.tithi.name} (${data.tithi.type})`;
                    document.getElementById('tithi-start').textContent = data.tithi.start;
                    document.getElementById('tithi-end').textContent = data.tithi.end;
                    document.getElementById('nakshatra').textContent = `${data.nakshatra.name} (Lord: ${data.nakshatra.lord})`;
                    document.getElementById('sunrise').textContent = data.advanced_details.sun_rise;
                    document.getElementById('sunset').textContent = data.advanced_details.sun_set;
                    document.getElementById('yoga').textContent = data.yoga.name;
                    document.getElementById('karana').textContent = data.karana.name;
                    document.getElementById('rahukaal').textContent = data.rahukaal;
                    document.getElementById('gulika').textContent = data.gulika;
                    document.getElementById('yamakanta').textContent = data.yamakanta;
                })
                .catch(error => {
                  console.log(error);
                });
            /* }); */
        }
        });
    </script>
</div>
