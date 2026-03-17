<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title>Order Confirmation</title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {text-decoration: none;}
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup { font-size: 100% !important; }</style>
    <![endif]-->
    <style type="text/css">
        body, table, td, p, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
        table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
        img { -ms-interpolation-mode: bicubic; border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
        body { margin: 0; padding: 0; width: 100%; height: 100%; }
        
        @media only screen and (max-width: 600px) {
            .email-container { width: 100% !important; }
            .mobile-padding { padding: 20px !important; }
            .mobile-full { width: 100% !important; display: block !important; }
            .header-title { font-size: 28px !important; }
            .product-img { width: 60px !important; }
            .info-card { padding: 16px !important; }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6ff; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    
    <?php 
        $date = new DateTime($details['date']);
        $formattedDate = $date->format('M j, Y');
        $baseurl = 'http://shopperdestination.com/';
    ?>
    
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
                            
                            <!-- Success Icon -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td align="center" style="padding-bottom: 20px;">
                                        <div style="width: 80px; height: 80px; background: rgba(255, 255, 255, 0.2); border-radius: 50%; display: inline-block; line-height: 80px; font-size: 40px;">
                                            ✓
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            
                            <h1 class="header-title" style="margin: 0; font-size: 32px; font-weight: 700; color: #ffffff; line-height: 1.3;">
                                Order Confirmed!
                            </h1>
                            <p style="margin: 16px 0 0; font-size: 16px; color: rgba(255, 255, 255, 0.9); line-height: 1.6;">
                                Thank you for your purchase
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Order Info Badge -->
                    <tr>
                        <td class="mobile-padding" style="padding: 32px 48px 24px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <td style="background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%); border-radius: 16px; padding: 24px; text-align: center;">
                                        <p style="margin: 0 0 8px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #888888;">
                                            Order Number
                                        </p>
                                        <p style="margin: 0 0 12px; font-size: 24px; font-weight: 700; color: #667eea;">
                                            #{{ $details['invoiceno'] }}
                                        </p>
                                        <p style="margin: 0; font-size: 14px; color: #666666;">
                                            {{ $formattedDate }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                            
                            <p style="margin: 24px 0 0; font-size: 15px; color: #555555; line-height: 1.7; text-align: center;">
                                We've received your order and will send you another email as soon as it ships.
                            </p>
                        </td>
                    </tr>
                    
                    <!-- Order Items Section -->
                    <tr>
                        <td class="mobile-padding" style="padding: 0 48px;">
                            <p style="margin: 0 0 16px; font-size: 13px; text-transform: uppercase; letter-spacing: 1px; color: #667eea; font-weight: 600;">
                                Order Details
                            </p>
                            
                            <!-- Items List -->
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="border: 1px solid #f0f2ff; border-radius: 16px; overflow: hidden;">
                                <?php foreach ($details['items'] as $key => $products) { ?>
                                <tr>
                                    <td style="padding: 16px; border-bottom: 1px solid #f8f9ff;">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="70" style="vertical-align: top;">
                                                    <img src="<?= $baseurl.$products->image_url ?>" alt="product" width="60" class="product-img" style="border-radius: 10px; display: block;">
                                                </td>
                                                <td style="padding-left: 16px; vertical-align: middle;">
                                                    <p style="margin: 0 0 4px; font-size: 15px; font-weight: 600; color: #1a1a3e;">
                                                        <?= $products->product_name ?>
                                                    </p>
                                                    <p style="margin: 0; font-size: 13px; color: #888888;">
                                                        Qty: <?= $products->quantity ?>
                                                    </p>
                                                </td>
                                                <td width="100" style="text-align: right; vertical-align: middle;">
                                                    <p style="margin: 0; font-size: 16px; font-weight: 600; color: #1a1a3e;">
                                                        Rs. <?= $products->quantity_price ?>
                                                    </p>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                <!-- Total Row -->
                                <tr>
                                    <td style="padding: 20px; background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);">
                                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td style="font-size: 16px; font-weight: 600; color: #1a1a3e;">
                                                    Total
                                                </td>
                                                <td style="text-align: right; font-size: 22px; font-weight: 700; color: #667eea;">
                                                    Rs. {{ $details['total'] }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <!-- Customer & Shipping Info -->
                    <tr>
                        <td class="mobile-padding" style="padding: 32px 48px;">
                            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                <tr>
                                    <!-- Customer Info -->
                                    <td class="mobile-full info-card" width="48%" style="vertical-align: top; padding: 20px; background: #f8f9ff; border-radius: 14px;">
                                        <p style="margin: 0 0 12px; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #667eea; font-weight: 600;">
                                            Customer Details
                                        </p>
                                        <p style="margin: 0 0 6px; font-size: 14px; color: #333333;">
                                            {{ $details['customer']->email }}
                                        </p>
                                        <p style="margin: 0 0 6px; font-size: 14px; color: #666666;">
                                            Order #{{ $details['invoiceno'] }}
                                        </p>
                                        <p style="margin: 0 0 6px; font-size: 14px; color: #666666;">
                                            {{ $formattedDate }}
                                        </p>
                                        <p style="margin: 12px 0 0; font-size: 13px; color: #888888;">
                                            <span style="display: inline-block; background: #10b981; color: #fff; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">PAID</span>
                                            via Razorpay
                                        </p>
                                    </td>
                                    
                                    <td width="4%"></td>
                                    
                                    <!-- Shipping Info -->
                                    <td class="mobile-full info-card" width="48%" style="vertical-align: top; padding: 20px; background: #f8f9ff; border-radius: 14px;">
                                        <p style="margin: 0 0 12px; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #667eea; font-weight: 600;">
                                            Shipping Address
                                        </p>
                                        <p style="margin: 0; font-size: 14px; color: #333333; line-height: 1.7;">
                                            <strong>{{ $details['customer']->fullname }}</strong><br>
                                            {{ $details['address']->address }}<br>
                                            @if($details['address']->landmark){{ $details['address']->landmark }}<br>@endif
                                            {{ $details['address']->city_name }}, {{ $details['address']->state_name }}<br>
                                            {{ $details['address']->zipcode }}
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
                                        <a href="http://shopperdestination.com/my-profile" target="_blank" style="display: inline-block; padding: 16px 40px; font-size: 15px; font-weight: 600; color: #ffffff; text-decoration: none; letter-spacing: 0.5px;">
                                            Track Your Order →
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
                                Questions about your order?
                            </p>
                            <p style="margin: 0; font-size: 14px; color: #666666; line-height: 1.8;">
                                📧 <a href="mailto:contact@shoppersdestination.com" style="color: #667eea; text-decoration: none;">contact@shoppersdestination.com</a><br>
                                📞 <a href="tel:+919342142087" style="color: #667eea; text-decoration: none;">+91 934 214 2087</a>
                            </p>
                            <p style="margin: 24px 0 0; font-size: 15px; color: #333333; line-height: 1.6;">
                                Thanks for shopping with us!<br>
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
                                        <a href="http://shopperdestination.com/" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Visit Us</a>
                                    </td>
                                    <td style="color: rgba(255, 255, 255, 0.3);">|</td>
                                    <td style="padding: 0 12px;">
                                        <a href="http://shopperdestination.com/privacy-policy" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Privacy</a>
                                    </td>
                                    <td style="color: rgba(255, 255, 255, 0.3);">|</td>
                                    <td style="padding: 0 12px;">
                                        <a href="http://shopperdestination.com/terms-condition" target="_blank" style="font-size: 12px; color: rgba(255, 255, 255, 0.6); text-decoration: none;">Terms</a>
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
