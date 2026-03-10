@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
        <h1>Order Detail</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Orders
        </p>
    </div>
    <?php
    // print_r($order);

    if(!empty($order)){ ?>
    <div class="row">
        <div class="col-12">
            <div class="ec-odr-dtl card card-default">
                <div class="card-header card-header-border-bottom d-flex justify-content-between">
                    <h2 class="ec-odr">Order Detail<br>
                        <span class="small">Order ID: <?=$order->invoice_number?></span>
                    </h2>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6">
                            <address class="info-grid">
                                <div class="info-title"><strong>Customer:</strong></div><br>
                                <div class="info-content">
                                    <?php if(!empty($order->customer)){?>
                                       <?= $order->customer->first_name?> <?= $order->customer->last_name?><br>
                                       <?= $order->customer->address?><br>
                                       <?= $order->customer->email?>
                                   <?php }else{?>
                                    XXXXX, Inc.<br>
                                    795 XXXXX XXX, XXXX<br>
                                    XXXXXX, XX XXXX<br>
                                    <?php } ?>
                                </div>
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <address class="info-grid">
                                <div class="info-title"><strong>Shipped To:</strong></div><br>
                                <div class="info-content">
                                    <?php if(!empty($order->address)){?>
                                        <?= $order->address->fullname?> <br>
                                        <?= $order->address->address?> ,
                                        <?= $order->address->city?>,
                                        <?= $order->address->country?><br>
                                        landmark: <?= $order->address->landmark?>,<br>
                                        Pincode: <?= $order->address->zipcode?>,<br>
                                        Phone: <?= $order->address->phone?>.
                                    <?php }else{?>
                                     XXXXX, Inc.<br>
                                     795 XXXXX XXX, XXXX<br>
                                     XXXXXX, XX XXXX<br>
                                     <?php } ?>
                                </div>
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <address class="info-grid">
                                <div class="info-title"><strong>Payment Method:</strong></div><br>
                                <div class="info-content">
                                    Visa ending **** 1234<br>
                                    h.elaine@gmail.com<br>
                                </div>
                            </address>
                        </div>
                        <div class="col-xl-3 col-lg-6">
                            <address class="info-grid">
                                <div class="info-title"><strong>Order Date:</strong></div><br>
                                <div class="info-content">
                                    {{-- 4:34PM,<br>
                                    Wed, Aug 13, 2020 --}}
                                    <?php echo date( "h:i a", strtotime($order->created_date)) ?><br>
                                    <?php echo date( "F d,Y", strtotime($order->created_date)) ?>
                                </div>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="tbl-title">PRODUCT SUMMARY</h3>
                            <div class="table-responsive">
                                <table class="table table-striped o-tbl">
                                    <thead>
                                        <tr class="line">
                                            <td><strong>#</strong></td>
                                            <td class="text-center"><strong>PRODUCT</strong></td>
                                            <td class="text-center"><strong>PRICE/UNIT</strong></td>
                                            <td class="text-right"><strong>QUANTITY</strong></td>
                                            <td class="text-right"><strong>SUBTOTAL</strong></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 0;
                                            // print_r($order->data);
                                            foreach ($order->data as $key => $value) { ?>
                                            <tr>
                                            <td><?= $i + 1 ?></td>
                                            <td><?= $value->product_name ?></td>
                                            <td class="text-center"><?= $value->price ?></td>
                                            <td class="text-center"><?= $value->quantity ?></td>
                                            <td class="text-right"><?= $value->quantity_price ?></td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="text-right"><strong>Taxes</strong></td>
                                            <td class="text-right"><strong><?= $order->tax_amount ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                            </td>
                                            <td class="text-right"><strong>Total</strong></td>
                                            <td class="text-right"><strong><?= $order->net_amount ?></strong></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">
                                            </td>
                                            <td class="text-right"><strong>Payment Status</strong></td>
                                            <td class="text-right"><strong>PAID</strong></td>
                                        </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tracking Detail -->
            <div class="card mt-4 trk-order" id="trk-order">
                <div class="p-4 text-center text-white text-lg bg-dark rounded-top">
                    <span class="text-uppercase">Tracking Order No - </span>
                    <span class="text-medium">34VB5540K83</span>
                </div>
                <div
                    class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Shipped
                            Via:</span> UPS Ground</div>
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span>
                        Checking Quality</div>
                    <div class="w-100 text-center py-1 px-2"><span class="text-medium">Expected
                            Date:</span> DEC 09, 2021</div>
                </div>

                <div class="card-body">
                    <div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">
                        <div class="step{{ $order->delivery_status == 'Confirmed Order' || $order->delivery_status == 'Processing Order' || $order->delivery_status == 'Product Dispatched' || $order->delivery_status == 'On Delivery' || $order->delivery_status == 'Product Delivered' ? ' completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="mdi mdi-cart"></i></div>
                            </div>
                            <h4 class="step-title">Confirmed Order</h4>
                        </div>
                        <div class="step{{ $order->delivery_status == 'Processing Order' || $order->delivery_status == 'Product Dispatched' || $order->delivery_status == 'On Delivery' || $order->delivery_status == 'Product Delivered' ? ' completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="mdi mdi-tumblr-reblog"></i></div>
                            </div>
                            <h4 class="step-title">Processing Order</h4>
                        </div>
                        <div class="step{{ $order->delivery_status == 'Product Dispatched' || $order->delivery_status == 'On Delivery' || $order->delivery_status == 'Product Delivered' ? ' completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="mdi mdi-gift"></i></div>
                            </div>
                            <h4 class="step-title">Product Dispatched</h4>
                        </div>
                        <div class="step{{ $order->delivery_status == 'On Delivery' || $order->delivery_status == 'Product Delivered' ? ' completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="mdi mdi-truck-delivery"></i></div>
                            </div>
                            <h4 class="step-title">On Delivery</h4>
                        </div>
                        <div class="step{{ $order->delivery_status == 'Product Delivered' ? ' completed' : '' }}">
                            <div class="step-icon-wrap">
                                <div class="step-icon"><i class="mdi mdi-hail"></i></div>
                            </div>
                            <h4 class="step-title">Product Delivered</h4>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <?php } ?>
</div> <!-- End Content -->
@endsection
