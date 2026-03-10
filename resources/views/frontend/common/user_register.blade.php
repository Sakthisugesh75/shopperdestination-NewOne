@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM REGISTER PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.register-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.register-premium-header::before {
    content: '';
    position: absolute;
    width: 500px;
    height: 500px;
    background: linear-gradient(135deg, rgba(102, 126, 234, 0.15), rgba(118, 75, 162, 0.15));
    border-radius: 50%;
    top: -250px;
    right: -100px;
    filter: blur(80px);
    pointer-events: none;
}

.tf-page-title.register-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Register Section */
.register-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 70vh;
}

/* Register Container */
.register-container {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 48px;
    max-width: 1100px;
    margin: 0 auto;
}

/* Register Card */
.register-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.register-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.register-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.register-card .card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #888;
    margin-bottom: 32px;
}

/* Form Styles */
.premium-form .form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.premium-form .form-group {
    margin-bottom: 20px;
}

.premium-form .form-label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.premium-form .form-input,
.premium-form .form-select {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.premium-form .form-input:focus,
.premium-form .form-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.premium-form .form-input::placeholder {
    color: #aaa;
}

/* Select Wrapper */
.select-wrapper {
    position: relative;
}

.select-wrapper::after {
    content: '';
    position: absolute;
    right: 18px;
    top: 50%;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #888;
    pointer-events: none;
}

/* Register Button */
.btn-register {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    padding: 18px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    border: none;
    border-radius: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(102, 126, 234, 0.3);
    margin-top: 12px;
}

.btn-register:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
}

/* Login Link */
.login-link-wrap {
    text-align: center;
    margin-top: 24px;
    padding-top: 24px;
    border-top: 1px solid #f0f2ff;
}

.login-link {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #667eea;
    text-decoration: none;
    transition: all 0.3s ease;
}

.login-link:hover {
    color: #764ba2;
    text-decoration: underline;
}

/* Benefits Card */
.benefits-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 24px;
    padding: 40px;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
    height: fit-content;
}

.benefits-card::before {
    content: '';
    position: absolute;
    width: 250px;
    height: 250px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    top: -80px;
    right: -80px;
}

.benefits-card .card-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    font-size: 28px;
    position: relative;
    z-index: 1;
}

.benefits-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 24px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 20px;
    position: relative;
    z-index: 1;
}

.benefits-list {
    list-style: none;
    padding: 0;
    margin: 0 0 32px;
    position: relative;
    z-index: 1;
}

.benefits-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.95);
    padding: 12px 0;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.benefits-list li:last-child {
    border-bottom: none;
}

.benefits-list .check-icon {
    width: 22px;
    height: 22px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    flex-shrink: 0;
}

/* Responsive */
@media (max-width: 991.98px) {
    .register-container {
        grid-template-columns: 1fr;
        max-width: 600px;
    }
    
    .benefits-card {
        order: -1;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.register-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.register-premium-header .heading {
        font-size: 32px !important;
    }
    
    .register-premium-section {
        padding: 40px 0;
    }
    
    .register-card,
    .benefits-card {
        padding: 28px 24px;
    }
    
    .premium-form .form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title register-premium-header">
    <div class="container-full">
        <div class="heading text-center">Create Account</div>
    </div>
</div>
<!-- /page-title -->

<section class="register-premium-section">
    <div class="container">
        <div class="register-container">
            <!-- Register Card -->
            <div class="register-card">
                <h2 class="card-title">Join Shopper Destination</h2>
                <p class="card-subtitle">Create your account and start shopping</p>
                
                <form id="register-form" class="premium-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="firstname">First Name</label>
                            <input type="text" class="form-input" id="firstname" name="firstname" placeholder="Enter first name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="lastname">Last Name</label>
                            <input type="text" class="form-input" id="lastname" name="lastname" placeholder="Enter last name">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="email">Email Address *</label>
                            <input type="email" class="form-input" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number *</label>
                            <input type="text" class="form-input" id="phone" name="phone" placeholder="Enter phone">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="address">Address *</label>
                        <input type="text" class="form-input" id="address" name="address" placeholder="Enter your address">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="state">State/Region *</label>
                            <div class="select-wrapper">
                                <select class="form-select" id="state" name="state" onchange="getCity()">
                                    <option value="">Select State</option>
                                    <?php
                                    if(!empty($state)){
                                    foreach ($state as $item) { ?>
                                    <option value="<?=$item->state_id?>"><?=$item->state_name?></option>
                                    <?php   }} ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="city">Town/City *</label>
                            <div class="select-wrapper">
                                <select class="form-select" id="city" name="city">
                                    <option value="">Select City</option>
                                    <?php
                                    if(!empty($city)){
                                    foreach ($city as $item) { ?>
                                    <option value="<?=$item->city_id?>"><?=$item->city_name?></option>
                                    <?php   }} ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="pincode">Post Code *</label>
                        <input type="text" class="form-input" id="pincode" name="pincode" placeholder="Enter pincode">
                    </div>
                    
                    <button type="submit" class="btn-register" id="save_button">
                        <span>Create Account</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                    </button>
                    <button type="button" class="btn-register" id="save_button_loading" style="display: none;">
                        <span>Creating Account...</span>
                    </button>
                    
                    <div class="login-link-wrap">
                        <a href="<?=url('/')?>/user-login" class="login-link">
                            Already have an account? Log in here →
                        </a>
                    </div>
                </form>
            </div>
            
            <!-- Benefits Card -->
            {{-- <div class="benefits-card">
                <div class="card-icon">🎁</div>
                <h3 class="card-title">Member Benefits</h3>
                <ul class="benefits-list">
                    <li>
                        <span class="check-icon">✓</span>
                        Early access to sales & new arrivals
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Exclusive member-only promotions
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Personalized style recommendations
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Track orders & save favorites
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Faster checkout experience
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</section>

<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>

<script>
function getCity(){
    let id = $("#state").val();
    $.ajax({
        type:'GET',
        url:'<?php echo url('/');?>/api/v1/state/getCityByState',
        data:{'id': id},
        success:function(data) {
            console.log(data);
            if (data.status == "SUCCESS") {
                $("#city").empty();
                $("#city").append("<option>Select City</option>");
                console.log(data.list.length);
                for(let i = 0; i < data.list.length; i++) {
                    $("#city").append("<option value='"+data.list[i].city_id+"'>"+data.list[i].city_name+'</option>');
                }
            }
        }
    });
}

window.onload = function(){
    var formInstance = document.getElementById('register-form');
    formInstance.addEventListener('submit', function(event) {
        event.preventDefault();
        var headers = new Headers();
        headers.set('Accept', 'application/json');
        $("#save_button").hide();
        $("#save_button_loading").show();
        var formData = new FormData();
        for (var i = 0; i < formInstance.length; ++i) {
            if(formInstance[i].name == "media"){
                const fileField = document.querySelector('input[name="media"]');
                formData.append('media', fileField.files[0]);
            }else{
                formData.append(formInstance[i].name, formInstance[i].value);
            }
        }
        var url = '<?php echo url('/');?>/api/v1/register';
        var fetchOptions = {
            method: 'POST',
            headers,
            body: formData
        };
        var responsePromise = fetch(url, fetchOptions);
        responsePromise
            .then(response => response.json())
            .then(data => {
                $("#save_button").show();
                $("#save_button_loading").hide();
                if (data.status == 'SUCCESS') {
                    Swal.fire({
                        title: 'Welcome to Shopper Destination!',
                        text: 'Your login credentials have been sent to your email',
                        icon: 'success',
                        confirmButtonColor: '#667eea',
                        confirmButtonText: 'Continue to Login'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "<?=url('/');?>/user-login";
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Registration Failed',
                        text: data.message,
                        icon: 'error',
                        confirmButtonColor: '#667eea'
                    });
                }
            });
        event.preventDefault();
    });
}
</script>

@endsection
