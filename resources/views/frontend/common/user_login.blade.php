@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM LOGIN PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.login-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.login-premium-header::before {
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

.tf-page-title.login-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Login Section */
.login-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 70vh;
}

/* Login Container */
.login-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 48px;
    max-width: 1000px;
    margin: 0 auto;
}

/* Login Card */
.login-card {
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.login-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.login-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 32px;
}

/* Form Styles */
.premium-form .form-group {
    margin-bottom: 24px;
    position: relative;
}

.premium-form .form-label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 8px;
}

.premium-form .form-input {
    width: 100%;
    padding: 16px 20px;
    background: #fff;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #1a1a3e;
    transition: all 0.3s ease;
}

.premium-form .form-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
}

.premium-form .form-input::placeholder {
    color: #aaa;
}

/* Forgot Password Link */
.forgot-link {
    display: inline-block;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #667eea;
    text-decoration: none;
    margin-bottom: 24px;
    transition: all 0.3s ease;
}

.forgot-link:hover {
    color: #764ba2;
    text-decoration: underline;
}

/* Login Button */
.btn-login {
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
}

.btn-login:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
}

/* Error Message */
.error-message {
    display: none;
    padding: 14px 18px;
    background: #fff0f0;
    border: 1px solid #fecaca;
    border-radius: 10px;
    margin-bottom: 20px;
}

.error-message span {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #dc2626;
}

/* Register Card */
.register-card {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border-radius: 24px;
    padding: 48px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.register-card::before {
    content: '';
    position: absolute;
    width: 300px;
    height: 300px;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    top: -100px;
    right: -100px;
}

.register-card::after {
    content: '';
    position: absolute;
    width: 200px;
    height: 200px;
    background: rgba(255, 255, 255, 0.05);
    border-radius: 50%;
    bottom: -50px;
    left: -50px;
}

.register-card .card-icon {
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 24px;
    font-size: 32px;
    position: relative;
    z-index: 1;
}

.register-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 16px;
    position: relative;
    z-index: 1;
}

.register-card .card-text {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    margin-bottom: 32px;
    position: relative;
    z-index: 1;
}

.btn-register {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 16px 32px;
    background: #fff;
    color: #667eea;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    position: relative;
    z-index: 1;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.btn-register:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
    background: #fff;
    color: #764ba2;
}

/* Password Reset Section (Hidden by default) */
#recover {
    display: none;
}

#recover.active {
    display: block;
}

#login.hidden {
    display: none;
}

/* Password Reset Card */
.reset-card .card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    margin-bottom: 28px;
}

.btn-cancel {
    display: inline-block;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #888;
    text-decoration: none;
    margin-bottom: 20px;
    transition: all 0.3s ease;
}

.btn-cancel:hover {
    color: #667eea;
}

/* Responsive */
@media (max-width: 991.98px) {
    .login-container {
        grid-template-columns: 1fr;
        max-width: 500px;
    }
    
    .register-card {
        order: -1;
    }
}

@media (max-width: 575.98px) {
    .tf-page-title.login-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.login-premium-header .heading {
        font-size: 32px !important;
    }
    
    .login-premium-section {
        padding: 40px 0;
    }
    
    .login-card,
    .register-card {
        padding: 32px 24px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title login-premium-header">
    <div class="container-full">
        <div class="heading text-center">Log In</div>
    </div>
</div>
<!-- /page-title -->

<section class="login-premium-section">
    <div class="container">
        <div class="login-container">
            <!-- Login Card -->
            <div class="login-card">
                <!-- Password Reset Form -->
                <div id="recover" class="reset-card">
                    <h2 class="card-title">Reset Password</h2>
                    <p class="card-subtitle">We will send you an email to reset your password</p>
                    <form id="reset-form">
                        <div class="premium-form">
                            <div class="form-group">
                                <label class="form-label" for="username1">Email Address</label>
                                <input type="email" class="form-input" id="username1" name="username1" placeholder="Enter your email">
                            </div>
                            <a href="#login" class="btn-cancel" onclick="toggleForms('login')">← Back to Login</a>
                            <button type="submit" class="btn-login">
                                Send Reset Link
                            </button>
                        </div>
                    </form>
                </div>
                
                <!-- Login Form -->
                <div id="login">
                    <h2 class="card-title">Welcome Back</h2>
                    <form id="login-form" class="premium-form">
                        <input type="hidden" id="session" name="session" value="<?php echo $session; ?>">
                        
                        <div id="error" class="error-message">
                            <span id="errormessage"></span>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="username">Email Address</label>
                            <input type="text" class="form-input" id="username" name="username" placeholder="Enter your email">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-input" id="password" name="password" placeholder="Enter your password">
                        </div>
                        
                        <a href="<?=url('/')?>/forgot-password" class="forgot-link">Forgot your password?</a>
                        
                        <button type="submit" class="btn-login login">
                            <span>Log In</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Register Card -->
            <div class="register-card">
                <div class="card-icon">👋</div>
                <h2 class="card-title">New Here?</h2>
                <p class="card-text">
                    Sign up for early sale access plus tailored new arrivals, trends and exclusive promotions. Join our community today!
                </p>
                <a href="<?=url('/')?>/user-register" class="btn-register">
                    Create Account
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<script src="{{ url('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
<script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>

<script>
function toggleForms(target) {
    if(target === 'recover') {
        document.getElementById('login').classList.add('hidden');
        document.getElementById('recover').classList.add('active');
    } else {
        document.getElementById('recover').classList.remove('active');
        document.getElementById('login').classList.remove('hidden');
    }
}

$(document).on("click", ".login", function (e) {
    e.preventDefault();
    var username = $("#username").val();
    var password = $("#password").val();
    var session = $("#session").val();

    console.log(username);
    console.log(password);

    if (username != "" && password != "") {
        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/login',
            data: {
                'username': username,
                'password': password
            },
            success: function(data) {
                console.log(data);
                if (data.status == "SUCCESS") {
                    if(data.role == 1){
                        window.location.href = "<?=url('/')?>/dashboard";
                    }else{
                        if(session){
                            window.location.href = "<?=url('/')?>/cart";
                        }else{
                            window.location.href = "<?=url('/')?>/my-profile";
                        }
                    }
                } else {
                    $("#error").show();
                    $("#errormessage").text(data.message);
                }
            }
        });
    } else {
        Swal.fire({
            title: 'Missing Information',
            text: 'Please fill in all required fields',
            icon: 'warning',
            confirmButtonColor: '#667eea'
        });
    }
    e.preventDefault();
});
</script>

@endsection
