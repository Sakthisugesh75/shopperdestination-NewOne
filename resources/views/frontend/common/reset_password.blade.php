@extends('frontend.main')
@section('content')

<style>
/* ========================================
   PREMIUM RESET PASSWORD PAGE
   ======================================== */

@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap');

/* Page Header */
.tf-page-title.reset-premium-header {
    background: linear-gradient(135deg, #0c0c1e 0%, #1a1a3e 100%);
    padding: 60px 0;
    position: relative;
    overflow: hidden;
}

.tf-page-title.reset-premium-header::before {
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

.tf-page-title.reset-premium-header .heading {
    font-family: 'Playfair Display', serif !important;
    font-size: 42px !important;
    font-weight: 600 !important;
    color: #fff !important;
    position: relative;
    z-index: 1;
}

/* Reset Section */
.reset-premium-section {
    background: linear-gradient(180deg, #fafbff 0%, #f0f4ff 100%);
    padding: 80px 0;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

/* Reset Card */
.reset-card {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    position: relative;
    overflow: hidden;
}

.reset-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

.reset-card .card-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #f8f9ff, #f0f2ff);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 32px;
}

.reset-card .card-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    text-align: center;
    margin-bottom: 8px;
}

.reset-card .card-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #888;
    text-align: center;
    margin-bottom: 32px;
}

/* Form Styles */
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

/* Error Message */
.error-message {
    display: none;
    padding: 14px 18px;
    background: #fff0f0;
    border: 1px solid #fecaca;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
}

.error-message span {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: #dc2626;
}

/* Submit Button */
.btn-reset {
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
    margin-top: 8px;
}

.btn-reset:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
}

/* Success Card */
.success-card {
    max-width: 500px;
    margin: 0 auto;
    background: #fff;
    border-radius: 24px;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.05);
    padding: 48px;
    text-align: center;
    display: none;
}

.success-card .success-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #10b981, #059669);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 24px;
    font-size: 40px;
    color: #fff;
}

.success-card .success-title {
    font-family: 'Playfair Display', serif;
    font-size: 28px;
    font-weight: 600;
    color: #1a1a3e;
    margin-bottom: 12px;
}

.success-card .success-text {
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    color: #666;
    margin-bottom: 28px;
}

.btn-login-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 16px 32px;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #fff;
    font-family: 'Inter', sans-serif;
    font-size: 15px;
    font-weight: 600;
    text-decoration: none;
    border-radius: 50px;
    transition: all 0.3s ease;
}

.btn-login-link:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 30px rgba(102, 126, 234, 0.4);
    color: #fff;
}

/* Responsive */
@media (max-width: 575.98px) {
    .tf-page-title.reset-premium-header {
        padding: 40px 0;
    }
    
    .tf-page-title.reset-premium-header .heading {
        font-size: 32px !important;
    }
    
    .reset-premium-section {
        padding: 40px 0;
    }
    
    .reset-card,
    .success-card {
        padding: 32px 24px;
        margin: 0 15px;
    }
}
</style>

<!-- page-title -->
<div class="tf-page-title reset-premium-header">
    <div class="container-full">
        <div class="heading text-center">Reset Password</div>
    </div>
</div>
<!-- /page-title -->

<section class="reset-premium-section">
    <div class="container">
        <!-- Reset Form -->
        <div class="reset-card" id="email">
            <div class="card-icon">🔐</div>
            <h2 class="card-title">Create New Password</h2>
            <p class="card-subtitle">Enter your new password below</p>
            
            <form id="login-form" class="premium-form">
                <input type="hidden" id="user_id" name="user_id" value="<?php echo $user->id; ?>">
                
                <div id="error" class="error-message">
                    <span id="errormessage"></span>
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="n_password">New Password</label>
                    <input type="password" class="form-input" id="n_password" placeholder="Enter new password">
                </div>
                
                <div class="form-group">
                    <label class="form-label" for="c_password">Confirm Password</label>
                    <input type="password" class="form-input" id="c_password" placeholder="Confirm new password">
                </div>
                
                <button type="button" class="btn-reset" onclick="update()">
                    <span>Reset Password</span>
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7"/>
                    </svg>
                </button>
            </form>
        </div>
        
        <!-- Success Message -->
        <div class="success-card" id="resetLink">
            <div class="success-icon">✓</div>
            <h2 class="success-title">Password Changed!</h2>
            <p class="success-text">Your password has been successfully updated. You can now log in with your new password.</p>
            <a href="<?=url('/')?>/user-login" class="btn-login-link">
                Go to Login
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
</section>

<script src="{{ url('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('email').style.display = 'block';
    document.getElementById('resetLink').style.display = 'none';
});

function update(){
    var id = $("#user_id").val();
    var c_password = $("#c_password").val();
    var n_password = $("#n_password").val();

    // Hide previous error
    $("#error").hide();

    if (c_password === n_password && c_password !== "") {
        var password = c_password;
        $.ajax({
            type: 'POST',
            url: '<?php echo url('/'); ?>/api/v1/update-password',
            data: {
                'id': id,
                'password': password
            },
            success: function(data) {
                console.log(data);
                if (data.status == "SUCCESS") {
                    document.getElementById('email').style.display = 'none';
                    document.getElementById('resetLink').style.display = 'block';
                } else {
                    $("#error").show();
                    $("#errormessage").text(data.message);
                }
            }
        });
    } else if (c_password === "" || n_password === "") {
        $("#error").show();
        $("#errormessage").text("Please fill in both password fields");
    } else {
        $("#error").show();
        $("#errormessage").text("Passwords do not match. Please try again.");
    }
}
</script>

@endsection
