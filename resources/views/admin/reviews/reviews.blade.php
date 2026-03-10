@extends('admin.main')
@section('content')
<div class="content">
    <div
        class="breadcrumb-wrapper breadcrumb-wrapper-2 d-flex align-items-center justify-content-between">
        <h1>Review</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>Review
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-tablep" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>User</th>

                                    <th>Ratings</th>
                                    <th>Date</th>

                                </tr>
                            </thead>

                            <tbody>
                                {{-- <tr>
                                    <td><img class="tbl-thumb" src="assets/img/products/p1.jpg" alt="product image"/></td>
                                    <td>Baby shoes</td>
                                    <td><img class="tbl-thumb" src="assets/img/user/u1.jpg" alt="product image"/></td>

                                    <td>
                                        <div class="ec-t-rate">
                                            <i class="mdi mdi-star is-rated"></i>
                                            <i class="mdi mdi-star is-rated"></i>
                                            <i class="mdi mdi-star is-rated"></i>
                                            <i class="mdi mdi-star is-rated"></i>
                                            <i class="mdi mdi-star"></i>
                                        </div>
                                    </td>
                                    <td>2021-12-03</td>

                                </tr> --}}


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Content -->

{{-- <script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script> --}}

<script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>


<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>

<script>

    $(document).ready(function(){

        table = $('#datatable-buttons').DataTable( {

        destroy: true,

        searching: false

    });



    table.destroy();

	   	$('#responsive-data-tablep').DataTable({

            dom: '<"dt-top-container"<l><"dt-center-in-div pt-3"B><f>r>t<ip>',

                                        buttons: [

            'copy', 'csv', 'excel', 'pdf', 'print'

            ],

			"order": [[ 0, "desc" ]],

	      	'processing': true,

	      	'serverSide': true,

              retrieve: true,

              columnDefs: [{

                    "defaultContent": "-",

                    "targets": "_all"

                }],



            "responsive": true,

	      	'serverMethod': 'GET',

	      	'ajax': {

	          'url':  '<?php echo url('/');?>/api/v1/order/review'

	      	},

            "columns": [

	            { "data": 'id' },
                { "data": 'product_id' },
                { "data": 'user_id' },
                {   "data": "ratings",
                "render": function(data, type, row) {
                    var stars = '<div class="ec-t-rate">';
                    for (var i = 0; i < 5; i++) {
                        if (i < data) {
                            stars += '<i class="mdi mdi-star is-rated"></i>';
                        } else {
                            stars += '<i class="mdi mdi-star"></i>';
                        }
                    }
                    stars += '</div>';
                    return stars;}},
                { "data": 'created_date' },





	      	]

	   	});

	});
</script>
@endsection
