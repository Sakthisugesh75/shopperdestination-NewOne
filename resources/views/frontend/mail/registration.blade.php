<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Welcome to Shoppers Destination</title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup { font-size: 100% !important; }</style>
    <![endif]-->
    <!--[if gte mso 9]>
    <noscript>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG></o:AllowPNG>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
    </noscript>
    <![endif]-->
    <style type="text/css">
        /* Reset */
        body, table, td, p, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        
        /* Typography */
        body { margin: 0; padding: 0; width: 100%; height: 100%; }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .email-container { width: 100% !important; }
            .mobile-padding { padding: 20px !important; }
            .mobile-center { text-align: center !important; }
            .mobile-full { width: 100% !important; display: block !important; }
            .header-title { font-size: 32px !important; }
            .credential-box { padding: 16px !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6ff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <!-- Wrapper -->
    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="background-color: #f4f6ff;">
        <tr>
            <td align="center" style="padding: 40px 20px;">
                
                <!-- Email Container -->
                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600" class="email-container" style="max-width: 600px; background-color: #ffffff; border-radius: 24px; overflow: hidden; box-shadow: 0 10px 40px rgba(102, 126, 234, 0.1);">
                    
                    <!-- Header with Gradient -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 50px 40px; text-align: center;">
                            <!-- Logo -->
                            <img src="http://shopperdestination.com/frontassets/images/logo/E-Logoedit.png" alt="Shoppers Destination Logo" width="160" style="display: inline-block; margin-bottom: 30px;">
                            
                            <!-- Welcome Icon -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 20px;">
                                        <div style="width: 80px; height: 80px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: inline-block; line-height: 80px; font-size: 40px;">
                                            👋
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <h1 class="header-title" style="margin: 0; font-size: 36px; font-weight: 700; color: #ffffff; line-height: 1.3;">
                                Welcome Aboard!
                            </h1>
                            <p style="margin: 16px 0 0; font-size: 16px; color: rgba(255, 255, 255, 0.9); line-height: 1.6;">
                                Thanks for joining the Shoppers Destination family
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Content -->
                    <tr>
                        <td class="mobile-padding" style="padding: 48px 48px 32px;">
                            <p style="margin: 0 0 24px; font-size: 16px; color: #333333; line-height: 1.7;">
                                Hello, <strong style="color: #667eea;">{{ $details['username'] }}</strong>! 🎉
                            </p>
                            <p style="margin: 0 0 32px; font-size: 16px; color: #555555; line-height: 1.7;">
                                You've successfully registered with us! You're now on our exclusive mailing list, which means you'll be the first to hear about our fresh collections, special offers, and exciting deals!
                            </p>
                            
                            <!-- Credentials Card -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td class="credential-box" style="background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%); border-radius: 16px; padding: 28px; border-left: 4px solid #667eea;">
                                        <p style="margin: 0 0 16px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #667eea; font-weight: 600;">
                                            Your Login Credentials
                                        </p>
                                        
                                        <!-- Username Row -->
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-bottom: 12px;">
                                            <tr>
                                                <td width="100" style="font-size: 14px; color: #888888; padding: 8px 0;">
                                                    Username:
                                                </td>
                                                <td style="font-size: 15px; font-weight: 600; color: #1a1a3e; padding: 8px 0;">
                                                    {{ $details['username'] }}
                                                </td>
                                            </tr>
                                        </table>
                                        
                                        <!-- Password Row -->
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="100" style="font-size: 14px; color: #888888; padding: 8px 0;">
                                                    Password:
                                                </td>
                                                <td style="font-size: 15px; font-weight: 600; color: #1a1a3e; padding: 8px 0;">
                                                    {{ $details['password'] }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            
                            <!-- Security Note -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin-top: 24px;">
                                <tr>
                                    <td style="background-color: #fff8e6; border-radius: 12px; padding: 16px 20px;">
                                        <p style="margin: 0; font-size: 13px; color: #996600; line-height: 1.5;">
                                            🔒 <strong>Security Tip:</strong> We recommend changing your password after your first login for added security.
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- CTA Button -->
                    <tr>
                        <td class="mobile-padding" style="padding: 0 48px 40px; text-align: center;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                    <td style="border-radius: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                        <a href="https://shopperdestination.com/user-login" target="_blank" style="display: inline-block; padding: 16px 40px; font-size: 15px; font-weight: 600; color: #ffffff; text-decoration: none; letter-spacing: 0.5px;">
                                            Start Shopping Now →
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Divider -->
                    <tr>
                        <td style="padding: 0 48px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td style="border-top: 1px solid #f0f2ff; height: 1px;"></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Contact Section -->
                    <tr>
                        <td class="mobile-padding" style="padding: 32px 48px;">
                            <p style="margin: 0 0 8px; font-size: 15px; color: #333333; line-height: 1.6;">
                                Got a question? We're here to help!
                            </p>
                            <p style="margin: 0; font-size: 14px; color: #666666; line-height: 1.8;">
                                📧 <a href="mailto:contact@shoppersdestination.com" style="color: #667eea; text-decoration: none;">contact@shoppersdestination.com</a><br>
                                📞 <a href="tel:+919342142087" style="color: #667eea; text-decoration: none;">+91 934 214 2087</a>
                            </p>
                            <p style="margin: 24px 0 0; font-size: 15px; color: #333333; line-height: 1.6;">
                                Warm regards,<br>
                                <strong style="color: #667eea;">The Shoppers Destination Team</strong>
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Footer -->
                    <tr>
                        <td style="background: linear-gradient(135deg, #1a1a3e 0%, #0c0c1e 100%); padding: 32px 48px; text-align: center;">
                            <p style="margin: 0 0 16px; font-size: 12px; color: rgba(255, 255, 255, 0.7); line-height: 1.6;">
                                © 2025 Shoppers Destination. All Rights Reserved.<br>
                                24A, RS Puram Palayakadu, North Uthukuli Road, Tiruppur 641607.
                            </p>
                            
                            <!-- Footer Links -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center">
                                <tr>
                                    <td style="padding: 0 12px;">
                                        <a href="https://shopperdestination.com/" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Visit Us</a>
                                    </td>
                                    <td style="color: rgba(255, 255, 255, 0.3);">|</td>
                                    <td style="padding: 0 12px;">
                                        <a href="https://shopperdestination.com/privacy-policy" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Privacy</a>
                                    </td>
                                    <td style="color: rgba(255, 255, 255, 0.3);">|</td>
                                    <td style="padding: 0 12px;">
                                        <a href="https://shopperdestination.com/terms-condition" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Terms</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                </table>
                <!-- End Email Container -->
                
            </td>
        </tr>
    </table>
    <!-- End Wrapper -->
    
</body>
</html>
