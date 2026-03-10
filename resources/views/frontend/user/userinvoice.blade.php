<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Shopper Destination - Invoice">

    <title>Invoice - Shopper Destination</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- FAVICON -->
    <link href="{{url ('frontassets/imgs/favicon.ico') }}" rel="shortcut icon" />

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .invoice-container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* Header Actions */
        .invoice-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            color: #764ba2;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            font-weight: 600;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-action.primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: #fff;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .btn-action.primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-action.secondary {
            background: #fff;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-action.secondary:hover {
            background: #667eea;
            color: #fff;
        }

        /* Invoice Card */
        .invoice-card {
            background: #fff;
            border-radius: 24px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Invoice Header */
        .invoice-header {
            background: linear-gradient(135deg, #1a1a3e 0%, #2d2d5a 100%);
            padding: 40px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .invoice-brand h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            color: #fff;
            margin-bottom: 8px;
        }

        .invoice-brand p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-number {
            font-family: 'Playfair Display', serif;
            font-size: 20px;
            color: #fff;
            margin-bottom: 4px;
        }

        .invoice-date {
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
        }

        .invoice-status {
            display: inline-block;
            margin-top: 12px;
            padding: 6px 16px;
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 50px;
        }

        /* Invoice Body */
        .invoice-body {
            padding: 40px;
        }

        /* Addresses */
        .addresses-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .address-block h3 {
            font-size: 12px;
            font-weight: 600;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 12px;
        }

        .address-block address {
            font-style: normal;
            font-size: 14px;
            color: #555;
            line-height: 1.8;
        }

        .address-block .company-name {
            font-weight: 600;
            color: #1a1a3e;
            font-size: 16px;
        }

        /* Items Table */
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 32px;
        }

        .items-table thead {
            background: #f8f9ff;
        }

        .items-table th {
            padding: 16px 20px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #667eea;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #eef1ff;
        }

        .items-table th:last-child,
        .items-table td:last-child {
            text-align: right;
        }

        .items-table td {
            padding: 20px;
            font-size: 14px;
            color: #555;
            border-bottom: 1px solid #f0f2ff;
        }

        .items-table .item-name {
            font-weight: 600;
            color: #1a1a3e;
        }

        .items-table .item-details {
            font-size: 13px;
            color: #888;
            margin-top: 4px;
        }

        .items-table .price {
            font-weight: 600;
            color: #1a1a3e;
        }

        /* Totals */
        .invoice-totals {
            display: flex;
            justify-content: flex-end;
        }

        .totals-box {
            min-width: 300px;
            background: #f8f9ff;
            border-radius: 16px;
            padding: 24px;
        }

        .totals-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            font-size: 14px;
            color: #555;
        }

        .totals-row.subtotal {
            border-bottom: 1px solid #e0e4f5;
        }

        .totals-row.tax {
            border-bottom: 1px solid #e0e4f5;
        }

        .totals-row.total {
            padding-top: 16px;
            margin-top: 8px;
            font-size: 18px;
            font-weight: 700;
            color: #1a1a3e;
        }

        .totals-row.total span:last-child {
            font-family: 'Playfair Display', serif;
            color: #667eea;
        }

        /* Invoice Footer */
        .invoice-footer {
            background: #f8f9ff;
            padding: 24px 40px;
            text-align: center;
            border-top: 1px solid #eef1ff;
        }

        .invoice-footer p {
            font-size: 13px;
            color: #888;
        }

        .invoice-footer a {
            color: #667eea;
            text-decoration: none;
        }

        /* Print Styles */
        @media print {
            body {
                background: #fff;
                padding: 0;
            }

            .invoice-actions {
                display: none !important;
            }

            .invoice-card {
                box-shadow: none;
                border-radius: 0;
            }

            .invoice-header {
                background: #1a1a3e !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }

        /* Responsive */
        @media (max-width: 767.98px) {
            .invoice-actions {
                flex-direction: column;
                gap: 16px;
                align-items: flex-start;
            }

            .invoice-header {
                flex-direction: column;
                gap: 20px;
                padding: 24px;
            }

            .invoice-meta {
                text-align: left;
            }

            .invoice-body {
                padding: 24px;
            }

            .addresses-row {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .items-table th,
            .items-table td {
                padding: 12px;
            }

            .totals-box {
                min-width: 100%;
            }

            .invoice-footer {
                padding: 20px 24px;
            }
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="invoice-container">
        <!-- Actions -->
        <div class="invoice-actions">
            <a href="<?= url('/') ?>/my-orders" class="back-link">
                ← Back to Orders
            </a>
            <div class="action-buttons">
                <button class="btn-action secondary" onclick="printDiv()">
                    🖨️ Print
                </button>
                <button class="btn-action primary" onclick="exportHTMLtoPDF(<?=$order->invoice_number?>)">
                    💾 Save PDF
                </button>
            </div>
        </div>

        <?php if(!empty($order)){ ?>
        <!-- Invoice Card -->
        <div class="invoice-card" id="content">
            <!-- Header -->
            <div class="invoice-header">
                <div class="invoice-brand">
                    <h1>Shopper Destination</h1>
                    <p>Premium Fashion Store</p>
                </div>
                <div class="invoice-meta">
                    <div class="invoice-number">Invoice #<?=$order->invoice_number?></div>
                    <div class="invoice-date"><?php echo date("F d, Y", strtotime($order->created_date)) ?></div>
                    <span class="invoice-status">Paid</span>
                </div>
            </div>

            <!-- Body -->
            <div class="invoice-body">
                <!-- Addresses -->
                <div class="addresses-row">
                    <div class="address-block">
                        <h3>From</h3>
                        <address>
                            <span class="company-name">Shopper Destination</span><br>
                            No 9 1st A Main Road 1st Cross,<br>
                            Munisuppa Reddy Layout, Hongachandra,<br>
                            Near Rajarajeshwari Temple, Bangalore,<br>
                            Karnataka, IN - 560068<br><br>
                            <strong>Email:</strong> contact@shopperdestination.in<br>
                            <strong>Phone:</strong> (+91) 733 938 5705
                        </address>
                    </div>
                    <div class="address-block">
                        <h3>Bill To</h3>
                        <address>
                            <?php if(!empty($order->address)){?>
                            <span class="company-name"><?= $order->address->fullname?></span><br>
                            <?= $order->address->address?>,<br>
                            <?= $order->address->city?>, <?= $order->address->country?><br>
                            Landmark: <?= $order->address->landmark?><br>
                            Pincode: <?= $order->address->zipcode?><br><br>
                            <strong>Phone:</strong> <?= $order->address->phone?>
                            <?php }else{?>
                            Customer Address Not Available
                            <?php } ?>
                        </address>
                    </div>
                </div>

                <!-- Items Table -->
                <table class="items-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($order->data as $key => $value) { 
                            $i++;
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <div class="item-name"><?= $value->product_name ?></div>
                                <div class="item-details">Color: <?= $value->color_name ?> | Size: <?= $value->size ?></div>
                            </td>
                            <td><?= $value->quantity ?></td>
                            <td class="price">₹<?= $value->price ?></td>
                            <td class="price">₹<?= $value->quantity_price ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Totals -->
                <div class="invoice-totals">
                    <div class="totals-box">
                        <div class="totals-row subtotal">
                            <span>Subtotal</span>
                            <span>₹<?= $order->total_amount ?></span>
                        </div>
                        <div class="totals-row tax">
                            <span>Tax (GST)</span>
                            <span>₹<?= $order->tax_amount ?></span>
                        </div>
                        <div class="totals-row total">
                            <span>Total Amount</span>
                            <span>₹<?= $order->net_amount ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="invoice-footer">
                <p>Thank you for shopping with us! For any queries, contact us at <a href="mailto:contact@shopperdestination.in">contact@shopperdestination.in</a></p>
            </div>
        </div>
        <?php } ?>
    </div>

    <script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        function exportHTMLtoPDF(inv_number) {
            let htmlElement = document.getElementById('content');
            const opt = {
                margin: 0.5,
                filename: 'invoice-' + inv_number + '.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
            };
            html2pdf().set(opt).from(htmlElement).save();
        }

        function printDiv() {
            window.print();
        }
    </script>
</body>

</html>
