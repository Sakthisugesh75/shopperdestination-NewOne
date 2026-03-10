@extends('admin.main')
@section('content')
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
	integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
	crossorigin="anonymous"
	referrerpolicy="no-referrer"
></script>
<style>
    @media print {
    #content {
    visibility: visible;
    position: absolute;
    left: 0;
    top: 0;
  }}
</style>
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
        <h1>Invoice</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Invoice
        </p>
    </div>
    <?php if(!empty($order)){ ?>
    <div class="card invoice-wrapper border-radius border bg-white p-4" id="content">
        <div class="d-flex justify-content-between">
            <h3 class="text-dark font-weight-medium">Invoice #<?= $order->id ?></h3>

            <div class="btn-group">
                <button class="btn btn-sm btn-primary" onclick="exportHTMLtoPDF(<?=$order->invoice_number?>)">
                    <i class="mdi mdi-content-save"></i> Save
                </button>

                <button class="btn btn-sm btn-primary" onclick="printDiv()">
                    <i class="mdi mdi-printer"></i> Print
                </button>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <p class="text-dark mb-2">From</p>

                <address>
                    <span>Shopper Destination</span>
                    <br> No 9 1st A Main Road 1st Cross,
                    <br> Munisuppa Reddy Layout, Hongachandra,
                    <br> Near Rajarajeshwari Temple, Bangalore,
                    <br> Karnataka, In, 560068.
                    <br> <span>Email:</span> contact@shopperdestination.com
                    <br> <span>Phone:</span> (+91) 733 938 5705
                </address>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <p class="text-dark mb-2">To</p>

                <address>
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
                </address>
            </div>
            <div class="col-xl-4 disp-none"></div>
            <div class="col-xl-2 col-lg-4 col-sm-6">
                <p class="text-dark mb-2">Details</p>

                <address>
                    <span>Invoice ID:</span>
                    <span class="text-dark"><?=$order->invoice_number?></span>
                    <br><span>Date :</span> <?php echo date( "F d,Y", strtotime($order->created_date)) ?>
                    {{-- <br> <span>VAT:</span> PL6541215450 --}}
                </address>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table mt-3 table-striped table-responsive table-responsive-large inv-tbl"
                style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit_Cost</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    {{-- <tr>
                        <td>1</td>
                        <td><img class="invoice-item-img" src="assets/img/products/p1.jpg" alt="product-image" /></td>
                        <td>Baby Pink Shoese</td>
                        <td>Amazing shoes with 10 day's replacement warrenty</td>
                        <td>4</td>
                        <td>$50.00</td>
                        <td>$200.00</td>
                    </tr> --}}
                    <?php
                    $i = 0;
                    // print_r($order->data);
                    foreach ($order->data as $key => $value) { ?>
                    <tr>
                    <td><?= $i + 1 ?></td>
                    <td><?= $value->product_name ?><br> color: <?= $value->color_name ?>/ Size : <?= $value->size ?> </td>
                    <td ><?= $value->quantity ?></td>
                    <td ><?= $value->price ?></td>
                    <td ><?= $value->quantity_price ?></td>
                </tr>
                <?php } ?>




                </tbody>
            </table>
            <div class="row justify-content-end inc-total">
                <div class="col-lg-3 col-xl-3 col-xl-3 ml-sm-auto">
                    <ul class="list-unstyled mt-3">
                        <li class="mid pb-3 text-dark"> Subtotal
                            <span class="d-inline-block float-right text-default"><?= $order->total_amount ?></span>
                        </li>

                        <li class="mid pb-3 text-dark">Vat
                            <span class="d-inline-block float-right text-default"><?= $order->tax_amount ?></span>
                        </li>

                        <li class="pb-3 text-dark">Total
                            <span class="d-inline-block float-right"><?= $order->net_amount ?></span>
                        </li>
                    </ul>

                    {{-- <a href="javascript:void(0)" class="btn btn-block mt-2 btn-primary btn-pill"> Procced to
                        Payment</a> --}}
                </div>
            </div>
        </div>


    </div>
    <?php } ?>
</div> <!-- End Content -->

<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="html2pdf.bundle.min.js"></script>
<script type="text/javascript">
function exportHTMLtoPDF(inv_number) {
         let htmlElement = document.getElementById('content');

         html2pdf().from(htmlElement).save('invoice-"'+inv_number+'".pdf');
      }

function printDiv() {
     var printContents = document.getElementById('content').innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
@endsection
