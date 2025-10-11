<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/kundali_match_style.css') }}">

<style>
    .ashwini-svg {
        background-image: url("{{asset('/img/nakshtra_ashwani.png')}}");
    }

    .bharani-svg {
        background-image: url("{{asset('/img/nakshtra_bharani.png')}}");
    }

    .krittika-svg {
        background-image: url("{{asset('/img/nakshtra_kritika.png')}}");
    }

    .rohini-svg {
        background-image: url("{{asset('/img/nakshtra_rohini.png')}}");
    }

    .mrigashira-svg {
        background-image: url("{{asset('/img/nakshtra_mrigha.png')}}");
    }

    .ardra-svg {
        background-image: url("{{asset('/img/nakshtra_aridha.png')}}");
    }

    .punarvasu-svg {
        background-image: url("{{asset('/img/nakshtra_punarvasu.png')}}");
    }

    .pushya-svg {
        background-image: url("{{asset('/img/nakshtra_pushya.png')}}");
    }

    .ashlesha-svg {
        background-image: url("{{asset('/img/nakshtra_ashlesha.png')}}");
    }

    .magha-svg {
        background-image: url("{{asset('/img/nakshtra_magha.png')}}");
    }

    .purvaphalguni-svg {
        background-image: url("{{asset('/img/nakshtra_purvaphalguni.png')}}");
    }

    .uttaraphalguni-svg {
        background-image: url("{{asset('/img/nakshtra_uttaraphalguni.png')}}");
    }

    .hasta-svg {
        background-image: url("{{asset('/img/nakshtra_hasta.png')}}");
    }

    .chitra-svg {
        background-image: url("{{asset('/img/nakshtra_chitra.png')}}");
    }

    .swati-svg {
        background-image: url("{{asset('/img/nakshtra_swati.png')}}");
    }

    .vishakha-svg {
        background-image: url("{{asset('/img/nakshtra_vishakha.png')}}");
    }

    .anuradha-svg {
        background-image: url("{{asset('/img/nakshtra_anuradha.png')}}");
    }

    .jyeshtha-svg {
        background-image: url("{{asset('/img/nakshtra_jyeshtha.png')}}");
    }

    .mula-svg {
        background-image: url("{{asset('/img/nakshtra_mula.png')}}");
    }

    .purvashadha-svg {
        background-image: url("{{asset('/img/nakshtra_purvashadha.png')}}");
    }

    .uttarashadha-svg {
        background-image: url("{{asset('/img/nakshtra_uttarashadha.png')}}");
    }

    .sravana-svg {
        background-image: url("{{asset('/img/nakshtra_sravana.png')}}");
    }

    .dhanista-svg {
        background-image: url("{{asset('/img/nakshtra_dhanista.png')}}");
    }

    .shatabhisha-svg {
        background-image: url("{{asset('/img/nakshtra_shatabhisha.png')}}");
    }

    .purvabhadra-svg {
        background-image: url("{{asset('/img/nakshtra_purvabhadra.png')}}");
    }

    .uttarabhadra-svg {
        background-image: url("{{asset('/img/nakshtra_uttarabhadra.png')}}");
    }

    .revati-svg {
        background-image: url("{{asset('/img/nakshtra_revati.png')}}");
    }
    
</style>

<div class="kundali_match" style="padding-top: 20px; padding-bottom: 20px;">

    <div class="kundali-container" id="kundali_matching_wrapper">
        <div class="kundali-form-wrapper">
            <div class="kundali-header">
                <div class="kundali-stars"></div>
                <h1>Kundali Matching</h1>
                <p class="kundali-subtitle">Compare cosmic compatibility</p>
            </div>
            <form id="kundaliMatchingForm" class="form">
                    
                <div class="kundali-two-columns">
                    {{-- Male Details --}}
                    <div class="kundali-column">
                        <h2 class="kundali-section-title">Male Details</h2>

                        <div class="kundali-form-group">
                            <label for="boy_name">Full Name</label>
                            <input type="text" id="boy_name" name="boy_name" placeholder="Enter name" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="boy_dob">Date of Birth</label>
                            <input type="date" id="boy_dob" name="boy_dob" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="boy_tob">Time of Birth</label>
                            <input type="time" id="boy_tob" name="boy_tob" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="boyPob">Place of Birth</label>

                            <input type="text" id="boyPob" name="boyPob" placeholder="Enter birthplace" autocomplete="off" class="autocomplete" required>
                            <input type="hidden" name="boy_lat" id="boy_lat" value="">
                            <input type="hidden" name="boy_lon" id="boy_lon" value="">
                            <input type="hidden" name="boy_city" id="boy_city" value="">
                            <input type="hidden" name="boy_state" id="boy_state" value="">
                            <input type="hidden" name="boy_country" id="boy_country" value="">
                            <input type="hidden" name="boy_tz" id="boy_tz" value="">
                        </div>
                    </div>
                    
                    {{-- Female Details --}}
                    <div class="kundali-column">
                        <h2 class="kundali-section-title">Female Details</h2>

                        <div class="kundali-form-group">
                            <label for="girl_name">Full Name</label>
                            <input type="text" id="girl_name" name="girl_name" placeholder="Enter name" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="girl_dob">Date of Birth</label>
                            <input type="date" id="girl_dob" name="girl_dob" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="girl_tob">Time of Birth</label>
                            <input type="time" id="girl_tob" name="girl_tob" required>
                        </div>
                        <div class="kundali-form-group">
                            <label for="femalePob">Place of Birth</label>
                        
                            <input type="text" id="girlPob" name="girlPob" placeholder="Enter birthplace" autocomplete="off" class="autocomplete" required>
                            <input type="hidden" name="girl_lat" id="girl_lat" value="">
                            <input type="hidden" name="girl_lon" id="girl_lon" value="">
                            <input type="hidden" name="girl_city" id="girl_city" value="">
                            <input type="hidden" name="girl_state" id="girl_state" value="">
                            <input type="hidden" name="girl_country" id="girl_country" value="">
                            <input type="hidden" name="girl_tz" id="girl_tz" value="">
                        </div>
                    </div>
                </div>

                <button type="submit" class="kundali-submit-btn">
                    <span>Match Kundali</span>
                    <svg class="kundali-btn-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M16 12l-4 4-4-4M12 8v7" />
                    </svg>
                </button>
            </form>

            <button onclick="openKundaliMatchingPricingModal();" class="kundali-submit-btn generate">Download PDF</button>

        </div>
    </div>

    <div id="kundali_matching-result" style="display: none;">
        <div class="tabs padding-right" id="tabButtons">
            <button class="match-tab-button active" data-tab="ashtakoot-data">Ashtakoot</button>
            <button class="match-tab-button" data-tab="dashakoot-data">Dashakoot</button>
            <button class="match-tab-button" data-tab="aggregate-data">Aggregate</button>
            <button class="match-tab-button" data-tab="nakshatra-data">Nakshatra</button>
        
            <div class="right-exit-btn">
                <button type="button" id="kundali_match_go_back_btn" class="exit-btn response_content"> <i class="fas fa-times"></i></button> 
            </div>
        </div>

        <div id="tabContents">

            <!-- ashtakoot tab content -->
            <div class="match-tab-content active" id="ashtakoot-data"></div>
            <!-- dashakoot tab content -->
            <div class="match-tab-content" id="dashakoot-data"></div>
            <!-- aggregate tab content -->
            <div class="match-tab-content" id="aggregate-data"></div>
            <!-- nakshatra tab content -->
            <div class="match-tab-content" id="nakshatra-data">
                <div class="containerForALL">
                    <div class="wrapper-nakshatra">
                        <div id="gender-selection" style="margin-bottom: 50px;">
                            <div class="gender-icons">
                                <div class="gender-icon" data-gender="male" onclick="selectGender('male')">
                                    <div class="icon-circle">
                                        <img src="{{ url('/img/user-male-circle.png')}}" alt="">
                                    </div>
                                    <p>Male</p>
                                </div>
                                <div class="gender-icon" data-gender="female" onclick="selectGender('female')">
                                    <div class="icon-circle">
                                        <img src="{{ url('/img/user-female-circle.png')}}" alt="">
                                    </div>
                                    <p>Female</p>
                                </div>
                            </div>
                        </div>

                        <div id="selected-nakshatras" class="hidden" style="margin-bottom: 50px;">
                            <div class="selected-icons"></div>
                            <button id="show-now-btn" class="show-now-btn" onclick="fetchNakshatraDetails(this)">Show Now</button>
                        </div>

                        <div id="nakshatras_result" class="hidden"></div>
                    </div>
                </div>
            </div>

            @include('partials.preloader-match-kundali')

            <button onclick="openKundaliMatchingPricingModal();" class="kundali-submit-btn generate">Download PDF</button>
        </div>

        <!-- Modal for Nakshatra Selection -->
        <div id="nakshatra-modal" class="modal-nakshatra hidden nakshatra_modal-main">
            <div class="modal-content-nakshatra nakshatra-wrap">
                <span class="close-button-nakshatra" onclick="closeModal()">&times;</span>
                <div class="selection-message"></div>
                <div id="modal-nakshatra-grid" class="nakshatra-grid">
                    <div class="nakshatra-icon" data-nakshatra="ashwini" onclick="selectNakshatra('ashwini', 1)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg ashwini-svg"></div>
                        </div>
                        <p>Ashwini</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="bharani" onclick="selectNakshatra('bharani', 2)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg bharani-svg"></div>
                        </div>
                        <p>Bharani</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="krittika" onclick="selectNakshatra('krittika', 3)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg krittika-svg"></div>
                        </div>
                        <p>Krittika</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="rohini" onclick="selectNakshatra('rohini', 4)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg rohini-svg"></div>
                        </div>
                        <p>Rohini</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="mrigashira" onclick="selectNakshatra('mrigashira', 5)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg mrigashira-svg"></div>
                        </div>
                        <p>Mrigashira</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="ardra" onclick="selectNakshatra('ardra', 6)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg ardra-svg"></div>
                        </div>
                        <p>Ardra</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="punarvasu" onclick="selectNakshatra('punarvasu', 7)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg punarvasu-svg"></div>
                        </div>
                        <p>Punarvasu</p>
                    </div>
                    <div class="nakshatra-icon" data-nakshatra="pushya" onclick="selectNakshatra('pushya', 8)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg pushya-svg"></div>
                        </div>
                        <p>Pushya</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="ashlesha" onclick="selectNakshatra('ashlesha', 9)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg ashlesha-svg"></div>
                        </div>
                        <p>Ashlesha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="magha" onclick="selectNakshatra('magha', 10)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg magha-svg"></div>
                        </div>
                        <p>Magha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="purvaphalguni" onclick="selectNakshatra('purvaphalguni', 11)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg purvaphalguni-svg"></div>
                        </div>
                        <p>Purva Phalguni</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="uttaraphalguni" onclick="selectNakshatra('uttaraphalguni', 12)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg uttaraphalguni-svg"></div>
                        </div>
                        <p>Uttara Phalguni</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="hasta" onclick="selectNakshatra('hasta', 13)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg hasta-svg"></div>
                        </div>
                        <p>Hasta</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="chitra" onclick="selectNakshatra('chitra', 14)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg chitra-svg"></div>
                        </div>
                        <p>Chitra</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="swati" onclick="selectNakshatra('swati', 15)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg swati-svg"></div>
                        </div>
                        <p>Swati</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="vishakha" onclick="selectNakshatra('vishakha', 16)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg vishakha-svg"></div>
                        </div>
                        <p>Vishakha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="anuradha" onclick="selectNakshatra('anuradha', 17)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg anuradha-svg"></div>
                        </div>
                        <p>Anuradha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="jyeshtha" onclick="selectNakshatra('jyeshtha', 18)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg jyeshtha-svg"></div>
                        </div>
                        <p>Jyeshtha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="mula" onclick="selectNakshatra('mula', 19)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg mula-svg"></div>
                        </div>
                        <p>Mula</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="purvashadha" onclick="selectNakshatra('purvashadha', 20)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg purvashadha-svg"></div>
                        </div>
                        <p>Purva Ashadha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="uttarashadha" onclick="selectNakshatra('uttarashadha', 21)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg uttarashadha-svg"></div>
                        </div>
                        <p>Uttara Ashadha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="sravana" onclick="selectNakshatra('sravana', 22)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg sravana-svg"></div>
                        </div>
                        <p>Sravana</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="dhanista" onclick="selectNakshatra('dhanista', 23)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg dhanista-svg"></div>
                        </div>
                        <p>Dhanishta</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="shatabhisha" onclick="selectNakshatra('shatabhisha', 24)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg shatabhisha-svg"></div>
                        </div>
                        <p>Shatabhisha</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="purvabhadra" onclick="selectNakshatra('purvabhadra', 25)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg purvabhadra-svg"></div>
                        </div>
                        <p>Purva Bhadra</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="uttarabhadra" onclick="selectNakshatra('uttarabhadra', 26)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg uttarabhadra-svg"></div>
                        </div>
                        <p>Uttara Bhadra</p>
                    </div>

                    <div class="nakshatra-icon" data-nakshatra="revati" onclick="selectNakshatra('revati', 27)">
                        <div class="icon-circle">
                            <div class="nakshatra-svg revati-svg"></div>
                        </div>
                        <p>Revati</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pricing Modal -->
  
    <div id="kundali_match_price" class="price_modal_match modal-kundli modal hidden">
        <div class="modal-content-kundli">
            <span class="close-button-kundli" onclick="closeKundaliMatchPricingModal()">&times;</span>
            <div class="kundali-modal">

                <div class="kundali-card"></div>
                
                <div class="kundali-card">
                    <h3>Premium Plan</h3>
                    <div class="kundali-price">@php echo html_entity_decode($kundali_match_price); @endphp</div>
                    <div class="kundali-description">Kundali Matching PDF</div>
                    <a href="{{ url('generate/checkout-url/4') }}" class="kundali_match_purchase_btn kundali-btn-popup">Purchase Now <i class="fa fa-refresh match_spin_btn hidden" aria-hidden="true"></i></a>
                </div>
                
                <div class="kundali-card"></div>
            </div>
        </div>
    </div>
  
    {{-- Login Modal --}}
    <div id="login_modal" class="login_modal modal">
        <div class="login-modal-content-kundli-match">
            <span class="login-modal-close-btn" onclick="">&times;</span>
            <div class="login-modal">

                <div class="kundali-description-div">Authentication Needed!</div>
                <div class="kundali-description-div">Redirecting to login... Please wait...</div>
            
            </div>
        </div>
    </div>

    {{-- Kundali Matching Pricing --}}

    <script>

        function checkAndDeductkundaliMatchingCredits(credits)
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
                    console.log("Note: You don`t have enough credits to generate kundali matching.");
                    return 0;
                }
            });
        }

        function checkRemainingCredits()
        {
            axios.post("{{ url("check-remaining-credits") }}", {
                shop_id: "{{ session('shop_id') }}",
                _token: "{{ csrf_token() }}"
            })
            .then(response => {

                if (response.data.is_enable_match_kundali == 0) {
                    var matchKundaliGen = document.getElementById('kundali_matching-result');
                    if (matchKundaliGen) {
                        matchKundaliGen.style.display = 'none';
                    }
                    
                    document.querySelectorAll('.kundali-submit-btn').forEach(function(btn) {
                        btn.classList.add('disabled');
                        btn.setAttribute('disabled', 'disabled');
                        btn.style.pointerEvents = 'none';
                    });
                }
            });
        }

        checkRemainingCredits();


        /* Set saved data in Kundali Form */
        if(__st.cid != undefined && __st.cid != null && __st.cid != 0)
        {
            axios.get("{{ url('get-user-matching-details') }}", {
                params: {
                    shop_id: "{{ session('shop_id') }}",
                    customer_id: __st.cid
                }
            })
            .then(response => {

                document.getElementById('boy_name').value = response.data.boy_name || '';
                document.getElementById('boy_dob').value = response.data.boy_dob || '';
                document.getElementById('boy_tob').value = response.data.boy_tob || '';
                document.getElementById('boyPob').value = response.data.boyPob || '';
                document.getElementById('boy_lat').value = response.data.boy_lat || '';
                document.getElementById('boy_lon').value = response.data.boy_lon || '';
                document.getElementById('boy_city').value = response.data.boy_city || '';
                document.getElementById('boy_state').value = response.data.boy_state || '';
                document.getElementById('boy_country').value = response.data.boy_country || '';
                document.getElementById('boy_tz').value = response.data.boy_tz || '';

                document.getElementById('girl_name').value = response.data.girl_name || '';
                document.getElementById('girl_dob').value = response.data.girl_dob || '';
                document.getElementById('girl_tob').value = response.data.girl_tob || '';
                document.getElementById('girlPob').value = response.data.girlPob || '';
                document.getElementById('girl_lat').value = response.data.girl_lat || '';
                document.getElementById('girl_lon').value = response.data.girl_lon || '';
                document.getElementById('girl_city').value = response.data.girl_city || '';
                document.getElementById('girl_state').value = response.data.girl_state || '';
                document.getElementById('girl_country').value = response.data.girl_country || '';
                document.getElementById('girl_tz').value = response.data.girl_tz || '';
            })
            .catch(error => {
                /* console.error("Error saving user details:", error); */
            });
        }

        /* Open Checkout Page */
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.kundali_match_purchase_btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();

                    var clicked_match_spinner = this.querySelector('.match_spin_btn');
                    clicked_match_spinner.classList.remove('hidden');

                    fetch(this.getAttribute('href'))
                    .then(response => response.json())
                    .then(data => {
                        if (data.url) {
                            clicked_match_spinner.classList.add('hidden');
                            window.open(data.url, '_blank');
                        } else {
                            setTimeout(() => {
                                if (data.url) {
                                    clicked_match_spinner.classList.add('hidden');
                                    window.open(data.url, '_blank');
                                }
                                else {
                                    clicked_match_spinner.classList.add('hidden');
                                    alert("Please wait for a moment and try again.");
                                }
                            }, 1000);
                        }
                    }).catch(err => {
                        /* console.error("Error:", err);
                        alert("Something went wrong."); */
                    });
                });
            });
        });

        function openKundaliMatchingPricingModal()
        {
            /* Check Customer is Logged in or not */
            if(__st.cid == undefined || __st.cid == null || __st.cid == 0) {

                document.body.classList.add('login_modal_show');
                document.getElementById('login_modal').classList.remove('hidden');
                document.getElementById('login_modal').classList.add('show');

                /* Ensure modal is visible in viewport */
                setTimeout(() => {
                    const modal = document.getElementById('login_modal');
                    if (modal.classList.contains('show')) {
                        modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }, 100);

                setTimeout(function(){
                    window.location.href = "https://{{ session('shop_name') }}.myshopify.com/account/login";
                }, 2500);

                return;
            }
            
            /* Save User Details in the Table */

            var userMatchingDetails = {
                shop_id: "{{ session('shop_id') }}",
                customer_id: __st.cid,
                boy_name: document.getElementById('boy_name').value,
                boy_dob: document.getElementById('boy_dob').value,
                boy_tob: document.getElementById('boy_tob').value,
                boyPob: document.getElementById('boyPob').value,
                boy_lat: document.getElementById('boy_lat').value,
                boy_lon: document.getElementById('boy_lon').value,
                boy_city: document.getElementById('boy_city').value,
                boy_state: document.getElementById('boy_state').value,
                boy_country: document.getElementById('boy_country').value,
                boy_tz: document.getElementById('boy_tz').value,
                
                girl_name: document.getElementById('girl_name').value,
                girl_dob: document.getElementById('girl_dob').value,
                girl_tob: document.getElementById('girl_tob').value,
                girlPob: document.getElementById('girlPob').value,
                girl_lat: document.getElementById('girl_lat').value,
                girl_lon: document.getElementById('girl_lon').value,
                girl_city: document.getElementById('girl_city').value,
                girl_state: document.getElementById('girl_state').value,
                girl_country: document.getElementById('girl_country').value,
                girl_tz: document.getElementById('girl_tz').value,
            };

            if(userMatchingDetails.boy_name == "" || userMatchingDetails.boy_dob == "" || userMatchingDetails.boy_tob == "" || userMatchingDetails.boyPob == "" || userMatchingDetails.girl_name == "" || userMatchingDetails.girl_dob == "" || userMatchingDetails.girl_tob == "" || userMatchingDetails.girlPob == "")
            {
                alert("Please fill all fields...");
                return;
            }

            setTimeout(() => {
                var kundali_id = 0;
                axios.post("{{ url('kundali-matching/save-user-details') }}", userMatchingDetails).then(response => {

                    /* Add customer ID & Kundali ID in URL */

                    var anchors_match = document.querySelectorAll('.kundali_match_purchase_btn');

                    if (anchors_match)
                    {
                        anchors_match.forEach(anchor => {
                            var url = new URL(anchor.href);
                            url.searchParams.set('customerId', __st.cid);
                            url.searchParams.set('kundali_id', response.data.kundali_id || 0);
                            url.searchParams.set('kundali_type', "kundali_matching");
                            url.searchParams.set('shop_id', "{{ session('shop_id') }}");
                            anchor.href = url.toString();
                        });
                    }
                })
                .catch(error => {
                    /* console.error("Error saving user details:", error); */
                });
            }, 300);

            /* Open Modal */

            document.getElementById('kundali_match_price').classList.remove('hidden');
            var kundali_match_modal = document.getElementById('kundali_match_price');
            kundali_match_modal.classList.add('show');

            document.body.classList.add('login_modal_show');
            
            /* Ensure modal is visible and centered */
            setTimeout(() => {
                if (kundali_match_modal.classList.contains('show')) {
                    kundali_match_modal.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            }, 100);
            /* document.getElementById("kundali_matching_wrapper").style.opacity = "0"; */
        }

        function closeKundaliMatchPricingModal()
        {
            document.body.classList.remove('login_modal_show');
            /* document.getElementById("kundali_matching_wrapper").style.opacity = "1"; */
            var kundali_match_modal = document.getElementById('kundali_match_price');
            kundali_match_modal.classList.remove('show');
        }

        /* Close kundali_match_modal when Escape key is pressed */
        window.addEventListener('keydown', function(event) {
            var kundali_match_modal = document.getElementById('kundali_match_price');
            if (event.key === 'Escape' && kundali_match_modal.classList.contains('show')) {
                closeKundaliMatchPricingModal();
            }
        });

        window.addEventListener('click', function(e) {
            var kundali_match_modal = document.getElementById('kundali_match_price');
            if (e.target === kundali_match_modal) {
                closeKundaliMatchPricingModal();
            }
        });

    </script>

    
    <!-- getTimezone -->
    <script>
        async function getTimezonematching(lat, log, type)
        {
            var timestamp = Math.floor(Date.now() / 1000);
            var googleKey = '{{ env("Google_Map_API_Key") }}';

            if (!googleKey) {
                console.error("Google Maps API Key is required.  Please set it in the googleKey constant.");
                return null;
            }
            var url = `https://maps.googleapis.com/maps/api/timezone/json?location=${lat},${log}&timestamp=${timestamp}&key=${googleKey}`;

            try {
                var response = await axios.get(url);
                var data = response.data;

                if (data.status !== 'OK') {
                    console.error(`Google Time Zone API error: ${data.status}`);
                    return null;
                } else {
                    
                    let tz = (response.data.dstOffset + response.data.dstOffset) / 3600;
                    if (type === 'boyPob') {
                        document.getElementById('boy_tz').value = tz;
                    } else {
                        document.getElementById('girl_tz').value = tz;
                    }
                }
            } catch (error) {
                /* console.error("Error fetching timezone:", error); */
                return null;
            }
        }
    </script>

    <script>
        function initialize()
        {
            var autocomplete = [];
            var input = document.getElementsByClassName('autocomplete');
            if (input.length > 0) {
                for (var i = 0; i < input.length; i++) {
                    autocomplete[input[i].id] = new google.maps.places.Autocomplete(input[i]);
                }
                document.addEventListener('focus', function(event)
                {
                    if (event.target.classList.contains('autocomplete'))
                    {
                        var id = event.target.id;

                        var autocompleteInput = autocomplete[id];
                        
                        if (autocompleteInput)
                        {
                            var matching_latitude = 'boy_lat';
                            var matching_longitude = 'boy_lon';

                            if (id == 'girlPob')
                            {
                                matching_latitude = 'girl_lat';
                                matching_longitude = 'girl_lon';
                            }

                            autocompleteInput.addListener('place_changed', function() {

                                var place = this.getPlace();
                                
                                var placeval = place.geometry.location.lat() + ',' + place.geometry.location.lng();

                                /* Kundali */
                                if (event.target.closest('form').id === 'kundaliForm')
                                {
                                    var latKundli = document.getElementById('free_kundli_latitude');
                                    var lngKundli = document.getElementById('free_kundli_longitude');

                                    if (latKundli && lngKundli) {
                                        latKundli.value = place.geometry.location.lat();
                                        lngKundli.value = place.geometry.location.lng();
                                    }
                                    getTimezone(place.geometry.location.lat(), place.geometry.location.lng());
                                }

                                /* Kundali Matching */
                                if (event.target.closest('form').id === 'kundaliMatchingForm')
                                {
                                    var latInput = document.getElementById(matching_latitude);

                                    if (latInput) {
                                        latInput.value = place.geometry.location.lat();
                                    }

                                    var lngInput = document.getElementById(matching_longitude);

                                    if (lngInput) {
                                        lngInput.value = place.geometry.location.lng();
                                    }
                                    
                                    getTimezonematching(place.geometry.location.lat(), place.geometry.location.lng(), id);
                                }
                            });
                        }
                    }
                }, true);
            }
        }
    </script>

    <!-- start create kundali -->
    <script>
        
        document.addEventListener('DOMContentLoaded', function() {

            /* Go Back */

            var kundali_match_go_back_btn = document.querySelector('#kundali_match_go_back_btn');

            if(kundali_match_go_back_btn)
            {
                kundali_match_go_back_btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    document.getElementById('kundali_matching_wrapper').style.display = 'block';
                    document.getElementById('kundali_matching-result').style.display = 'none';
                });
            }

        
            document.getElementById('kundaliMatchingForm').addEventListener('submit', function(e) {

                e.preventDefault();
                var boy_dob = document.getElementById('boy_dob').value;
                var boy_tob = document.getElementById('boy_tob').value;
                var boy_name = document.getElementById('boy_name').value;
                var boy_lat = document.getElementById('boy_lat').value;
                var boy_lon = document.getElementById('boy_lon').value;
                var boy_tz = document.getElementById('boy_tz').value;
                var boy_city = document.getElementById('boy_city').value;
                var boy_state = document.getElementById('boy_state').value;
                var boy_country = document.getElementById('boy_country').value;
                var girl_name = document.getElementById('girl_name').value;
                var girl_dob = document.getElementById('girl_dob').value;
                var girl_tob = document.getElementById('girl_tob').value;
                var girl_lat = document.getElementById('girl_lat').value;
                var girl_lon = document.getElementById('girl_lon').value;
                var girl_tz = document.getElementById('girl_tz').value;
                var girl_city = document.getElementById('girl_city').value;
                var girl_state = document.getElementById('girl_state').value;
                var girl_country = document.getElementById('girl_country').value;
                /* var lang = document.getElementById('lang').value; */
                var lang = 'en';

                document.querySelector(".preloader-match-kundali").style.display = "block";

                /* Asthakoot Details */
                if(checkAndDeductkundaliMatchingCredits('{{ config("constants.ashtakoot_match_api_charge") }}'))
                {
                    var url = `https://api.jyotishamastroapi.com/api/matching/ashtakoot-astro?boy_dob=${boy_dob}&boy_tob=${boy_tob}&boy_lat=${boy_lat}&boy_lon=${boy_lon}&boy_tz=${boy_tz}&girl_dob=${girl_dob}&girl_tob=${girl_tob}&girl_lat=${girl_lat}&girl_lon=${girl_lon}&girl_tz=${girl_tz}&lang=${lang}`;
                    
                    axios.get(url, {
                        headers: {
                            key: "{{ $jyotisham_astro_api }}"
                        }
                    })
                    .then(response => {
                        var res = response.data.response;

                        document.querySelector(".preloader-match-kundali").style.display = "none";

                        document.querySelector('#ashtakoot-data').innerHTML = ``;
                        document.querySelector('#ashtakoot-data').innerHTML = `
                        <div class="containerForALL">
                            <h1 class="main-title">Ashtakoot Points</h1>
                            <div class="verdict-box" data-score="${res.score}" data-total="36">
                                <div class="circular-progress">
                                    <svg class="progress-ring" width="120" height="120">
                                        <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                        <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                                    </svg>
                                    <div class="progress-text">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                                <p>
                                    ${res.bot_response}
                                </p>
                            </div>
                            
                            <div class="profile-grid">
                                <!-- Girl's Profile -->
                                <div class="profile-card girl">
                                    <div class="card-header">
                                        <h2>Girl's Details</h2>
                                    </div>
                                    <div class="card-content">
                                        <dl class="details-list">
                                            <div class="detail-item">
                                                <dt>Date of Birth</dt>
                                                <dd>${girl_dob}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Gana</dt>
                                                <dd class="highlight">${res.girl_astro_details.gana}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Yoni</dt>
                                                <dd class="highlight">${res.girl_astro_details.yoni}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Vasya</dt>
                                                <dd>${res.girl_astro_details.vasya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nadi</dt>
                                                <dd class="highlight">${res.girl_astro_details.nadi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Varna</dt>
                                                <dd>${res.girl_astro_details.varna}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Paya</dt>
                                                <dd>${res.girl_astro_details.paya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Tatva</dt>
                                                <dd>${res.girl_astro_details.tatva}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa</dt>
                                                <dd>${res.girl_astro_details.birth_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa</dt>
                                                <dd>${res.girl_astro_details.current_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa Time</dt>
                                                <dd>${res.girl_astro_details.birth_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa Time</dt>
                                                <dd>${res.girl_astro_details.current_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Gem</dt>
                                                <dd>${res.girl_astro_details.lucky_gem.map(f => `${f}`).join('')} </dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Number</dt>
                                                <dd class="highlight">${res.girl_astro_details.lucky_num.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Colors</dt>
                                                <dd>${res.girl_astro_details.lucky_colors.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Letters</dt>
                                                <dd class="highlight">${res.girl_astro_details.lucky_letters.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Name Start</dt>
                                                <dd>${res.girl_astro_details.lucky_name_start.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Rasi Name</dt>
                                                <dd>${res.girl_astro_details.rasi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra</dt>
                                                <dd>${res.girl_astro_details.nakshatra}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra Pada</dt>
                                                <dd>${res.girl_astro_details.nakshatra_pada}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Ascendant Sign</dt>
                                                <dd>${res.girl_astro_details.ascendant_sign}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>

                                <!-- Boy's Profile -->
                                <div class="profile-card boy">
                                    <div class="card-header">
                                        <h2>Boy's Details</h2>
                                    </div>
                                    <div class="card-content">
                                        <dl class="details-list">
                                            <div class="detail-item">
                                                <dt>Date of Birth</dt>
                                                <dd>${boy_dob}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Gana</dt>
                                                <dd class="highlight">${res.boy_astro_details.gana}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Yoni</dt>
                                                <dd class="highlight">${res.boy_astro_details.yoni}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Vasya</dt>
                                                <dd>${res.boy_astro_details.vasya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nadi</dt>
                                                <dd class="highlight">${res.boy_astro_details.nadi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Varna</dt>
                                                <dd>${res.boy_astro_details.varna}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Paya</dt>
                                                <dd>${res.boy_astro_details.paya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Tatva</dt>
                                                <dd>${res.boy_astro_details.tatva}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa</dt>
                                                <dd>${res.boy_astro_details.birth_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa</dt>
                                                <dd>${res.boy_astro_details.current_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa Time</dt>
                                                <dd>${res.boy_astro_details.birth_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa Time</dt>
                                                <dd>${res.boy_astro_details.current_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Gem</dt>
                                                <dd>${res.boy_astro_details.lucky_gem.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Number</dt>
                                                <dd class="highlight">${res.boy_astro_details.lucky_num.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Colors</dt>
                                                <dd>${res.boy_astro_details.lucky_colors.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Letters</dt>
                                                <dd class="highlight">${res.boy_astro_details.lucky_letters.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Name Start</dt>
                                                <dd>${res.boy_astro_details.lucky_name_start.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Rasi Name</dt>
                                                <dd>${res.boy_astro_details.rasi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra</dt>
                                                <dd>${res.boy_astro_details.nakshatra}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra Pada</dt>
                                                <dd>${res.boy_astro_details.nakshatra_pada}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Ascendant Sign</dt>
                                                <dd>${res.boy_astro_details.ascendant_sign}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <!-- Guna Milan Section -->
                            <div class="guna-milan-section">
                                <div class="card-header guna">
                                    <h2>Guna Milan Details</h2>
                                </div>
                                <div class="card-content">
                                    <table class="guna-table">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Guna</th>
                                        <th>Girl</th>
                                        <th>Boy</th>
                                        <th>Max Points</th>
                                        <th>Obtained</th>
                                        <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>${res.tara.name}</td>
                                            <td>${res.tara.girl_tara}</td>
                                            <td>${res.tara.boy_tara}</td>
                                            <td>${res.tara.full_score}</td>
                                            <td><span class="obtained-points">${res.tara.tara}</span></td>
                                            <td>${res.tara.description}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>${res.gana.name}</td>
                                            <td>${res.gana.girl_gana}</td>
                                            <td>${res.gana.boy_gana}</td>
                                            <td>${res.gana.full_score}</td>
                                            <td><span class="obtained-points">${res.gana.gana}</span></td>
                                            <td>${res.gana.description}</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>${res.yoni.name}</td>
                                            <td>${res.yoni.girl_yoni}</td>
                                            <td>${res.yoni.boy_yoni}</td>
                                            <td>${res.yoni.full_score}</td>
                                            <td><span class="obtained-points">${res.yoni.yoni}</span></td>
                                            <td>${res.yoni.description}</td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>${res.bhakoot.name}</td>
                                            <td>${res.bhakoot.girl_rasi_name}</td>
                                            <td>${res.bhakoot.boy_rasi_name}</td>
                                            <td>${res.bhakoot.full_score}</td>
                                            <td><span class="obtained-points">${res.bhakoot.bhakoot}</span></td>
                                            <td>${res.bhakoot.description}</td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>${res.grahamaitri.name}</td>
                                            <td>${res.grahamaitri.girl_lord}</td>
                                            <td>${res.grahamaitri.boy_lord}</td>
                                            <td>${res.grahamaitri.full_score}</td>
                                            <td><span class="obtained-points">${res.grahamaitri.grahamaitri}</span></td>
                                            <td>${res.grahamaitri.description}</td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>${res.vasya.name}</td>
                                            <td>${res.vasya.girl_vasya}</td>
                                            <td>${res.vasya.boy_vasya}</td>
                                            <td>${res.vasya.full_score}</td>
                                            <td><span class="obtained-points">${res.vasya.vasya}</span></td>
                                            <td>${res.vasya.description}</td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>${res.nadi.name}</td>
                                            <td>${res.nadi.girl_nadi}</td>
                                            <td>${res.nadi.boy_nadi}</td>
                                            <td>${res.nadi.full_score}</td>
                                            <td><span class="obtained-points">${res.nadi.nadi}</span></td>
                                            <td>${res.nadi.description}</td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>${res.varna.name}</td>
                                            <td>${res.varna.girl_varna}</td>
                                            <td>${res.varna.boy_varna}</td>
                                            <td>${res.varna.full_score}</td>
                                            <td><span class="obtained-points">${res.varna.varna}</span></td>
                                            <td>${res.varna.description}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td>36</td>
                                        <td><span class="total-points">${res.score}</span></td>
                                        <td></td>
                                        </tr>
                                    </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>`;

                        initializeBox();
                    })
                    .catch(error => {
                        /* if (error.response) {
                            console.error("Server responded with error:", error.response.data);
                        } else if (error.request) {
                            console.error("No response received:", error.request);
                        } else {
                            console.error("Error setting up request:", error.message);
                        } */
                    });
                }
                
                /* Dashakoot Details */
                
                if(checkAndDeductkundaliMatchingCredits('{{ config("constants.dashakoot_match_api_charge") }}'))
                {
                    var url = `https://api.jyotishamastroapi.com/api/matching/dashakoot-astro?boy_dob=${boy_dob}&boy_tob=${boy_tob}&boy_lat=${boy_lat}&boy_lon=${boy_lon}&boy_tz=${boy_tz}&girl_dob=${girl_dob}&girl_tob=${girl_tob}&girl_lat=${girl_lat}&girl_lon=${girl_lon}&girl_tz=${girl_tz}&lang=${lang}`;
                    
                    axios.get(url, {
                        headers: {
                            key: "{{ $jyotisham_astro_api }}"
                        }
                    })
                    .then(response => {
                        var res = response.data.response;

                        document.querySelector('#dashakoot-data').innerHTML = ``;
                        document.querySelector('#dashakoot-data').innerHTML = `
                        <div class="containerForALL">
                            <h1 class="main-title">Dashakoot Points</h1>
                            <!-- <div class="section-title-basic">Match Verdict</div> -->
                            <div class="verdict-box" data-score="${res.score}" data-total="10">
                                <div class="circular-progress">
                                    <svg class="progress-ring" width="120" height="120">
                                        <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                        <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                                    </svg>
                                    <div class="progress-text">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                                <p>
                                    ${res.bot_response}
                                </p>
                            </div>
                            <div class="profile-grid">
                                <!-- Girl's Profile -->
                                <div class="profile-card girl">
                                    <div class="card-header">
                                        <h2>Girl's Details</h2>
                                    </div>
                                    <div class="card-content">
                                        <dl class="details-list">
                                        <div class="detail-item">
                                            <dt>Date of Birth</dt>
                                            <dd>${girl_dob}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Gana</dt>
                                            <dd class="highlight">${res.girl_astro_details.gana}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Yoni</dt>
                                            <dd class="highlight">${res.girl_astro_details.yoni}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Vasya</dt>
                                            <dd>${res.girl_astro_details.vasya}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Nadi</dt>
                                            <dd class="highlight">${res.girl_astro_details.nadi}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Varna</dt>
                                            <dd>${res.girl_astro_details.varna}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Paya</dt>
                                            <dd>${res.girl_astro_details.paya}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Tatva</dt>
                                            <dd>${res.girl_astro_details.tatva}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Birth Dasa</dt>
                                            <dd>${res.girl_astro_details.birth_dasa}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Current Dasa</dt>
                                            <dd>${res.girl_astro_details.current_dasa}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Birth Dasa Time</dt>
                                            <dd>${res.girl_astro_details.birth_dasa_time}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Current Dasa Time</dt>
                                            <dd>${res.girl_astro_details.current_dasa_time}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Lucky Gem</dt>
                                            <dd>${res.girl_astro_details.lucky_gem.map(f => `${f}`).join('')}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Lucky Number</dt>
                                            <dd class="highlight">${res.girl_astro_details.lucky_num.map(f => `${f}`).join('')}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Lucky Colors</dt>
                                            <dd>${res.girl_astro_details.lucky_colors.map(f => `${f}`).join('')}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Lucky Letters</dt>
                                            <dd class="highlight">${res.girl_astro_details.lucky_letters.map(f => `${f}`).join('')}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Lucky Name Start</dt>
                                            <dd>${res.girl_astro_details.lucky_name_start.map(f => `${f}`).join('')}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Rasi Name</dt>
                                            <dd>${res.girl_astro_details.rasi}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Nakshatra</dt>
                                            <dd>${res.girl_astro_details.nakshatra}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Nakshatra Pada</dt>
                                            <dd>${res.girl_astro_details.nakshatra_pada}</dd>
                                        </div>
                                        <div class="detail-item">
                                            <dt>Ascendant Sign</dt>
                                            <dd>${res.girl_astro_details.ascendant_sign}</dd>
                                        </div>
                                        </dl>
                                    </div>
                                </div>

                                <!-- Boy's Profile -->
                                <div class="profile-card boy">
                                    <div class="card-header">
                                        <h2>Boy's Details</h2>
                                    </div>
                                    <div class="card-content">
                                        <dl class="details-list">
                                            <div class="detail-item">
                                                <dt>Date of Birth</dt>
                                                <dd>${boy_dob}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Gana</dt>
                                                <dd class="highlight">${res.boy_astro_details.gana}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Yoni</dt>
                                                <dd class="highlight">${res.boy_astro_details.yoni}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Vasya</dt>
                                                <dd>${res.boy_astro_details.vasya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nadi</dt>
                                                <dd class="highlight">${res.boy_astro_details.nadi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Varna</dt>
                                                <dd>${res.boy_astro_details.varna}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Paya</dt>
                                                <dd>${res.boy_astro_details.paya}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Tatva</dt>
                                                <dd>${res.boy_astro_details.tatva}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa</dt>
                                                <dd>${res.boy_astro_details.birth_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa</dt>
                                                <dd>${res.boy_astro_details.current_dasa}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Birth Dasa Time</dt>
                                                <dd>${res.boy_astro_details.birth_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Current Dasa Time</dt>
                                                <dd>${res.boy_astro_details.current_dasa_time}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Gem</dt>
                                                <dd>${res.boy_astro_details.lucky_gem.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Number</dt>
                                                <dd class="highlight">${res.boy_astro_details.lucky_num.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Colors</dt>
                                                <dd>${res.boy_astro_details.lucky_colors.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Letters</dt>
                                                <dd class="highlight">${res.boy_astro_details.lucky_letters.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Lucky Name Start</dt>
                                                <dd>${res.boy_astro_details.lucky_name_start.map(f => `${f}`).join('')}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Rasi Name</dt>
                                                <dd>${res.boy_astro_details.rasi}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra</dt>
                                                <dd>${res.boy_astro_details.nakshatra}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Nakshatra Pada</dt>
                                                <dd>${res.boy_astro_details.nakshatra_pada}</dd>
                                            </div>
                                            <div class="detail-item">
                                                <dt>Ascendant Sign</dt>
                                                <dd>${res.boy_astro_details.ascendant_sign}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <!-- Guna Milan Section -->
                            <div class="guna-milan-section">
                                <div class="card-header guna">
                                    <h2>Guna Milan Details</h2>
                                </div>
                                <div class="card-content">
                                    <table class="guna-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Guna</th>
                                                <th>Girl</th>
                                                <th>Boy</th>
                                                <th>Max Points</th>
                                                <th>Obtained</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <tr>
                                                <td>1</td>
                                                <td>${res.dina.name}</td>
                                                <td>${res.dina.girl_star}</td>
                                                <td>${res.dina.boy_star}</td>
                                                <td>${res.dina.full_score}</td>
                                                <td><span class="obtained-points">${res.dina.dina}</span></td>
                                                <td>${res.dina.description}</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>${res.gana.name}</td>
                                                <td>${res.gana.girl_gana}</td>
                                                <td>${res.gana.boy_gana}</td>
                                                <td>${res.gana.full_score}</td>
                                                <td><span class="obtained-points">${res.gana.gana}</span></td>
                                                <td>${res.gana.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.yoni.name}</td>
                                                <td>${res.yoni.girl_yoni}</td>
                                                <td>${res.yoni.boy_yoni}</td>
                                                <td>${res.yoni.full_score}</td>
                                                <td><span class="obtained-points">${res.yoni.yoni}</span></td>
                                                <td>${res.yoni.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.mahendra.name}</td>
                                                <td>${res.mahendra.girl_star}</td>
                                                <td>${res.mahendra.boy_star}</td>
                                                <td>${res.mahendra.full_score}</td>
                                                <td><span class="obtained-points">${res.mahendra.mahendra}</span></td>
                                                <td>${res.mahendra.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.rajju.name}</td>
                                                <td>${res.rajju.girl_rajju}</td>
                                                <td>${res.rajju.boy_rajju}</td>
                                                <td>${res.rajju.full_score}</td>
                                                <td><span class="obtained-points">${res.rajju.rajju}</span></td>
                                                <td>${res.rajju.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.rasi.name}</td>
                                                <td>${res.rasi.girl_rasi}</td>
                                                <td>${res.rasi.boy_rasi}</td>
                                                <td>${res.rasi.full_score}</td>
                                                <td><span class="obtained-points">${res.rasi.rasi}</span></td>
                                                <td>${res.rasi.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.rasiathi.name}</td>
                                                <td>${res.rasiathi.girl_lord}</td>
                                                <td>${res.rasiathi.boy_lord}</td>
                                                <td>${res.rasiathi.full_score}</td>
                                                <td><span class="obtained-points">${res.rasiathi.rasiathi}</span></td>
                                                <td>${res.rasiathi.description}</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>${res.sthree.name}</td>
                                                <td>${res.sthree.girl_star}</td>
                                                <td>${res.sthree.boy_star}</td>
                                                <td>${res.sthree.full_score}</td>
                                                <td><span class="obtained-points">${res.sthree.sthree}</span></td>
                                                <td>${res.sthree.description}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>${res.vasya.name}</td>
                                                <td>${res.vasya.girl_vasya}</td>
                                                <td>${res.vasya.boy_vasya}</td>
                                                <td>${res.vasya.full_score}</td>
                                                <td><span class="obtained-points">${res.vasya.vasya}</span></td>
                                                <td>${res.vasya.description}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>${res.vedha.name}</td>
                                                <td>${res.vedha.girl_star}</td>
                                                <td>${res.vedha.boy_star}</td>
                                                <td>${res.vedha.full_score}</td>
                                                <td><span class="obtained-points">${res.vedha.vedha}</span></td>
                                                <td>${res.vedha.description}</td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>${res.yoni.name}</td>
                                                <td>${res.yoni.girl_yoni}</td>
                                                <td>${res.yoni.boy_yoni}</td>
                                                <td>${res.yoni.full_score}</td>
                                                <td><span class="obtained-points">${res.yoni.yoni}</span></td>
                                                <td>${res.yoni.description}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td>Total</td>
                                                <td></td>
                                                <td></td>
                                                <td>11</td>
                                                <td><span class="total-points">${res.score}</span></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>`;

                        initializeBox();
                    })
                    .catch(error => {
                        /* if (error.response) {
                            console.error("Server responded with error:", error.response.data);
                        } else if (error.request) {
                            console.error("No response received:", error.request);
                        } else {
                            console.error("Error setting up request:", error.message);
                        } */
                    });
                }

                /* Aggregate Details */

                if(checkAndDeductkundaliMatchingCredits('{{ config("constants.aggregate_match_api_charge") }}'))
                {
                    var url = `https://api.jyotishamastroapi.com/api/matching/aggregate-match?boy_dob=${boy_dob}&boy_tob=${boy_tob}&boy_lat=${boy_lat}&boy_lon=${boy_lon}&boy_tz=${boy_tz}&girl_dob=${girl_dob}&girl_tob=${girl_tob}&girl_lat=${girl_lat}&girl_lon=${girl_lon}&girl_tz=${girl_tz}&lang=${lang}`;
                    
                    axios.get(url, {
                        headers: {
                            key: "{{ $jyotisham_astro_api }}"
                        }
                    })
                    .then(response => {
                        var res = response.data.response;

                        document.querySelector('#aggregate-data').innerHTML = ``;
                        document.querySelector('#aggregate-data').innerHTML = `
                        <div class="containerForALL">
                            <h1 class="main-title">Aggregate Matching Points</h1>
                            <div class="verdict-box" data-score="${res.score}" data-total="100"> 
                                <div class="circular-progress">
                                    <svg class="progress-ring" width="120" height="120">
                                        <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                        <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                                    </svg>
                                    <div class="progress-text">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                                <div class="verdict-textContent">
                                    <p>${res.extended_response}</p>
                                </div>
                                <p>
                                    ${res.bot_response}
                                </p>
                            </div>

                            <div class="aggregate-flex">

                                <div class="aggregate-inner">
                                    <div class="verdict-box" data-score="${res.ashtakoot}" data-total="36">
                                        <h3>Ashtakoot Points</h3>
                                
                                        <div class="circular-progress">
                                            <svg class="progress-ring" width="120" height="120">
                                                <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                                <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                                            </svg>
                                            <div class="progress-text">
                                                <span class="progress-value">${res.ashtakoot_score}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="aggregate-inner">
                                    <div class="verdict-box" data-score="${res.dashkoot}" data-total="10">
                                        <h3>Dashakoot Points</h3>
                                        <div class="circular-progress">
                                            <svg class="progress-ring" width="120" height="120">
                                                <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                                <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                                            </svg>
                                            <div class="progress-text">
                                                <span class="progress-value">${res.dashkoot_score}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <section class="dosha-section-matching">
                                <div class="section-title-basic">Dosha Analysis</div>
                                <div class="dosha-grid-matching">
                                    <div class="dosha-card-matching">
                                        <div class="dosha-title-matching">
                                            <span>Mangal Dosha</span>
                                        </div>
                                        <p class="dosha-description-matching">${res.mangaldosh}</p>
                                        <div class="dosha-points-matching">
                                            <div>
                                                <span class="point-label-matching">Boy:</span>
                                                <span class="point-value-matching">${res.mangaldosh_points.boy}%</span>
                                            </div>
                                            <div>
                                                <span class="point-label-matching">Girl:</span>
                                                <span class="point-value-matching">${res.mangaldosh_points.girl}%</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dosha-card-matching">
                                        <div class="dosha-title-matching">
                                            <span>Pitra Dosha</span>
                                        </div>
                                        <p class="dosha-description-matching">${res.pitradosh}</p>
                                        <div class="dosha-points-matching">
                                            <div>
                                                <span class="point-label-matching">Boy:</span>
                                                <span class="point-value-matching">${res.pitradosh_points.boy}</span>
                                            </div>
                                            <div>
                                                <span class="point-label-matching">Girl:</span>
                                                <span class="point-value-matching">${res.pitradosh_points.girl}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dosha-card-matching">
                                        <div class="dosha-title-matching">
                                            <span>Kaal Sarp Dosha</span>
                                        </div>
                                        <p class="dosha-description-matching">${res.kaalsarpdosh}</p>
                                        <div class="dosha-points-matching">
                                            <div>
                                                <span class="point-label-matching">Boy:</span>
                                                <span class="point-value-matching">${res.kaalsarp_points.boy}</span>
                                            </div>
                                            <div>
                                                <span class="point-label-matching">Girl:</span>
                                                <span class="point-value-matching">${res.kaalsarp_points.girl}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dosha-card-matching">
                                        <div class="dosha-title-matching">
                                            <span>Manglik Dosha (Saturn)</span>
                                        </div>
                                        <p class="dosha-description-matching">${res.manglikdosh_saturn}</p>
                                        <div class="dosha-points-matching">
                                            <div>
                                                <span class="point-label-matching">Boy:</span>
                                                <span class="point-value-matching">${res.manglikdosh_saturn_points.boy}</span>
                                            </div>
                                            <div>
                                                <span class="point-label-matching">Girl:</span>
                                                <span class="point-value-matching">${res.manglikdosh_saturn_points.girl}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dosha-card-matching">
                                        <div class="dosha-title-matching">
                                            <span>Manglik Dosha(Rahu/Ketu)</span>
                                        </div>
                                        <p class="dosha-description-matching">${res.manglikdosh_rahuketu}</p>
                                        <div class="dosha-points-matching">
                                            <div>
                                                <span class="point-label-matching">Boy:</span>
                                                <span class="point-value-matching">${res.manglikdosh_rahuketu_points.boy}</span>
                                            </div>
                                            <div>
                                                <span class="point-label-matching">Girl:</span>
                                                <span class="point-value-matching">${res.manglikdosh_rahuketu_points.girl}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>`;

                        initializeBox();
                    })
                    .catch(error => {
                        /* if (error.response) {
                            console.error("Server responded with error:", error.response.data);
                        } else if (error.request) {
                            console.error("No response received:", error.request);
                        } else {
                            console.error("Error setting up request:", error.message);
                        } */
                    });
                }

                document.getElementById('kundali_matching_wrapper').style.display = 'none';
                document.getElementById('kundali_matching-result').style.display = 'block';
            });
        });


        /* Nakshatra Details */
        async function fetchNakshatraDetails(elem)
        {
            if(checkAndDeductkundaliMatchingCredits('{{ config("constants.nakshatra_match_api_charge") }}'))
            {
                var url = `https://api.jyotishamastroapi.com/api/matching/nakshatra-match?boy_nakshatra=${elem.dataset.boy_nakshatra}&girl_nakshatra=${elem.dataset.girl_nakshatra}&lang=en`;

                document.querySelector(".preloader-match-kundali").style.display = "block";
                    
                axios.get(url, {
                    headers: {
                        key: "{{ $jyotisham_astro_api }}"
                    }
                })
                .then(response => {

                    var res = response.data.response;

                    document.querySelector(".preloader-match-kundali").style.display = "none";

                    document.querySelector('#nakshatras_result').innerHTML = `
                    <h1 class="main-title">Dashakoot Matching Points</h1>
                    <div class="verdict-box" data-score="${res.score}" data-total="10"> 
                        <div class="circular-progress">
                            <svg class="progress-ring" width="120" height="120">
                                <circle class="progress-ring-bg" cx="60" cy="60" r="54" />
                                <circle class="progress-ring-circle" cx="60" cy="60" r="54" />
                            </svg>
                            <div class="progress-text">
                                <span class="progress-value"></span>
                            </div>
                        </div>
                        <p> ${res.bot_response} </p>
                    </div>

                    <!-- Guna Milan Section -->
                    <div class="guna-milan-section">
                        <div class="card-header guna">
                            <h2>Guna Milan Details</h2>
                        </div>
                        <div class="card-content">
                            <table class="guna-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Guna</th>
                                        <th>Girl</th>
                                        <th>Boy</th>
                                        <th>Max Points</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>${res.gana.name}</td>
                                        <td>${res.gana.girl_gana}</td>
                                        <td>${res.gana.boy_gana}</td>
                                        <td>${res.gana.gana}</td>
                                        <td>${res.gana.description}</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>${res.dina.name}</td>
                                        <td>${res.dina.girl_star}</td>
                                        <td>${res.dina.boy_star}</td>
                                        <td>${res.dina.dina}</td>
                                        <td>${res.dina.description}</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>${res.mahendra.name}</td>
                                        <td>${res.mahendra.girl_star}</td>
                                        <td>${res.mahendra.boy_star}</td>
                                        <td>${res.mahendra.mahendra}</td>
                                        <td>${res.mahendra.description}</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>${res.rajju.name}</td>
                                        <td>${res.rajju.girl_rajju}</td>
                                        <td>${res.rajju.boy_rajju}</td>
                                        <td>${res.rajju.rajju}</td>
                                        <td>${res.rajju.description}</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>${res.rasi.name}</td>
                                        <td>${res.rasi.girl_rasi}</td>
                                        <td>${res.rasi.boy_rasi}</td>
                                        <td>${res.rasi.rasi}</td>
                                        <td>${res.rasi.description}</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>${res.rasiathi.name}</td>
                                        <td>${res.rasiathi.girl_lord}</td>
                                        <td>${res.rasiathi.boy_lord}</td>
                                        <td>${res.rasiathi.rasiathi}</td>
                                        <td>${res.rasiathi.description}</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>${res.sthree.name}</td>
                                        <td>${res.sthree.girl_star}</td>
                                        <td>${res.sthree.boy_star}</td>
                                        <td>${res.sthree.sthree}</td>
                                        <td>${res.sthree.description}</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>${res.vasya.name}</td>
                                        <td>${res.vasya.girl_rasi}</td>
                                        <td>${res.vasya.boy_rasi}</td>
                                        <td>${res.vasya.vasya}</td>
                                        <td>${res.vasya.description}</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>${res.vedha.name}</td>
                                        <td>${res.vedha.girl_star}</td>
                                        <td>${res.vedha.boy_star}</td>
                                        <td>${res.vedha.vedha}</td>
                                        <td>${res.vedha.description}</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>${res.yoni.name}</td>
                                        <td>${res.yoni.girl_yoni}</td>
                                        <td>${res.yoni.boy_yoni}</td>
                                        <td>${res.yoni.yoni}</td>
                                        <td>${res.yoni.description}</td>
                                    </tr>
                                </tbody>
                            </table>                                        
                        </div>
                    </div>`;

                    initializeBox();

                    document.getElementById('show-now-btn').classList.add('hidden');
                    document.getElementById('nakshatras_result').classList.remove('hidden');
                    document.getElementById('nakshatras_result').scrollIntoView({ behavior: 'smooth' });   
                })
                .catch(error => {
                    /* if (error.response) {
                        console.error("Server responded with error:", error.response.data);
                    } else if (error.request) {
                        console.error("No response received:", error.request);
                    } else {
                        console.error("Error setting up request:", error.message);
                    } */
                });
            }
        }

        function loadGoogleMaps(apiKey, callback)
        {
            const scriptId = 'google-maps-script';
            const scriptUrl = `https://maps.google.com/maps/api/js?key=${apiKey}&libraries=places`;
            
            /* If already loaded */
            if (window.google && window.google.maps) {
                callback();
                return;
            }

            /* If already loading, attach to existing onload */
            const existingScript = document.getElementById(scriptId);
            if (existingScript) {
                existingScript.addEventListener('load', callback);
                return;
            }

            /* Create new script */
            const script = document.createElement('script');
            script.id = scriptId;
            script.src = scriptUrl;
            script.async = true;
            script.defer = true;

            script.onload = callback;
            script.onerror = () => console.error('Failed to load Google Maps script');

            document.head.appendChild(script);
        }

        loadGoogleMaps("{{ env('Google_Map_API_Key') }}", () => {
            initialize();
        });

    </script>
        
    <script>
        var matchTabButtons = document.querySelectorAll(".match-tab-button");
        var matchTabContents = document.querySelectorAll(".match-tab-content");
        matchTabButtons.forEach(button => {
            button.addEventListener("click", () => {
                var target = button.getAttribute("data-tab");
                matchTabButtons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                matchTabContents.forEach(content => {
                    content.classList.remove("active");
                    if (content.id === target) content.classList.add("active");
                });
            });
        });

        /* sub tabs */
        var kpTabButtons = document.querySelectorAll(".match-sub-tab-button");
        var kpTabContents = document.querySelectorAll(".match-sub-tab-content");

        kpTabButtons.forEach(button => {
            button.addEventListener("click", () => {
                var target = button.getAttribute("data-tab");
                kpTabButtons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");
                kpTabContents.forEach(content => {
                    content.classList.remove("active");
                    if (content.id === target) content.classList.add("active");
                });
            });
        });

        /* progress bar */

        function initializeBox()
        {
            document.querySelectorAll('.verdict-box').forEach((box) => {
                var score = parseFloat(box.dataset.score);
                var total = parseFloat(box.dataset.total);
                var progress = (score / total);

                var circle = box.querySelector('.progress-ring-circle');
                var value = box.querySelector('.progress-value');

                var radius = 54;
                var circumference = 2 * Math.PI * radius;
                var offset = circumference - progress * circumference;

                circle.style.strokeDashoffset = offset;
                value.textContent = `${score}/${total}`;
            });
        }

        /* State management */
        var state = {
            selectedGender: null,
            maleNakshatra: null,
            femaleNakshatra: null,
            currentSelectionFor: null
        };

        /* Function to select gender */
        function selectGender(gender)
        {
            state.selectedGender = gender;
            state.currentSelectionFor = gender;

            /* Highlight selected */
            document.querySelectorAll('.gender-icon').forEach(icon => {
                icon.classList.toggle('selected', icon.getAttribute('data-gender') === gender);
            });

            /* Set selection message */
            document.querySelector('.selection-message').textContent = `Select nakshatra for ${gender}`;

            function openModal() {
                var modal = document.getElementById('nakshatra-modal');
                modal.classList.add('show');
            }

            /* Show modal */
            document.getElementById('nakshatra-modal').classList.remove('hidden');
            openModal();
        }

        function closeModal()
        {
            var modal = document.getElementById('nakshatra-modal');
            modal.classList.remove('show');
        }

        window.addEventListener('click', function (e)
        {
            var modal = document.getElementById('nakshatra-modal');
            if (e.target === modal) {
                closeModal();
            }
        });

        document.querySelectorAll('#tabButtons .match-tab-button:nth-child(-n+3)').forEach(button => {
            button.addEventListener('click', closeModal);
        });
        
        window.addEventListener("keydown", function(event) {
            if (event.key === "Escape") {
                closeModal();
            }
        });

        /* Function to select nakshatra */
        function selectNakshatra(nakshatra, number)
        {
            if (state.currentSelectionFor === 'male')
            {
                state.maleNakshatra = nakshatra;

                document.getElementById('show-now-btn').setAttribute('data-boy_nakshatra', number);

                if (!state.femaleNakshatra) {
                    closeModal();
                    setTimeout(() => selectGender('female'), 200);
                } else {
                    closeModal();
                }

            }
            else if (state.currentSelectionFor === 'female')
            {
                state.femaleNakshatra = nakshatra;
                
                document.getElementById('show-now-btn').setAttribute('data-girl_nakshatra', number);

                if (!state.maleNakshatra) {
                    closeModal();
                    setTimeout(() => selectGender('male'), 200);
                } else {
                    closeModal();
                }
            }

            updateSelectedNakshatras();

            if (state.maleNakshatra && state.femaleNakshatra) {
                document.getElementById('selected-nakshatras').classList.remove('hidden');
                document.getElementById('selected-nakshatras').scrollIntoView({ behavior: 'smooth' });
            }
        }

        /* Function to update the selected nakshatras display */
        function updateSelectedNakshatras()
        {
            var selectedIconsContainer = document.querySelector('.selected-icons');
            selectedIconsContainer.innerHTML = '';
            
            if (state.maleNakshatra && state.femaleNakshatra) {
                /* Add the first selected nakshatra */
                var icon1 = document.createElement('div');
                icon1.className = 'nakshatra-icon';
                icon1.innerHTML = `
                    <div class="icon-circle">
                        <div class="nakshatra-svg ${state.maleNakshatra}-svg"></div>
                    </div>
                    <p>${capitalizeFirstLetter(state.maleNakshatra)}</p>
                `;
                selectedIconsContainer.appendChild(icon1);
                
                /* Add the second selected nakshatra */
                var icon2 = document.createElement('div');
                icon2.className = 'nakshatra-icon';
                icon2.innerHTML = `
                    <div class="icon-circle">
                        <div class="nakshatra-svg ${state.femaleNakshatra}-svg"></div>
                    </div>
                    <p>${capitalizeFirstLetter(state.femaleNakshatra)}</p>
                `;
                selectedIconsContainer.appendChild(icon2);
            }
        }

        /* Helper function to capitalize the first letter */
        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        /* Add CSS class for selected items */
        document.addEventListener('DOMContentLoaded', () => {
            /* Add CSS for selected items */
            var style = document.createElement('style');
            style.textContent = `
                .gender-icon.selected .icon-circle {
                    border: 3px solid #003366;
                }
                .selection-message {
                    text-align: center;
                    font-size: 18px;
                    font-weight: 600;
                    margin-bottom: 10px;
                    color: #003366;
                    text-transform: capitalize;
                }
            `;
            document.head.appendChild(style);
        });

        /* Close modal when Escape key is pressed */
        window.addEventListener('keydown', function(event) {
            var modal = document.getElementById('nakshatra-modal');
            if (event.key === 'Escape' && modal.classList.contains('show')) {
                closeModal();
            }
        });

        document.querySelector('.login-modal-close-btn').addEventListener('click', function(e) {
       
            const login_modal = document.getElementById("login_modal");
            login_modal.classList.add('hidden');
            login_modal.classList.remove("show");

            document.body.classList.remove('login_modal_show');
        });
    </script>

</div>
