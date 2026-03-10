@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
        <h1>Orders History</h1>
        <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
            <span><i class="mdi mdi-chevron-right"></i></span>History
        </p>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-tableh" class="table" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Invoice Number</th>
                                    <th>Customer</th>
                                    <th>Items</th>
                                    <th>Total Amount</th>
                                    <th>Tax Amount</th>
                                    <th>Net Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- <tr>
                                    <td>1050</td>
                                    <td>Johny Markue</td>
                                    <td>johny@example.com</td>
                                    <td>3</td>
                                    <td>$80</td>
                                    <td>PAID</td>
                                    <td><span class="mb-2 mr-2 badge badge-secondary">Cancel</span></td>
                                    <td>2021-10-30</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Track</a>
                                                <a class="dropdown-item" href="#">Cancel</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1049</td>
                                    <td>Ktn Markue</td>
                                    <td>ktn@example.com</td>
                                    <td>10</td>
                                    <td>$280</td>
                                    <td>COD</td>
                                    <td><span class="mb-2 mr-2 badge badge-warning">Return</span></td>
                                    <td>2021-10-30</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Track</a>
                                                <a class="dropdown-item" href="#">Cancel</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1048</td>
                                    <td>mehul Markue</td>
                                    <td>mehul@example.com</td>
                                    <td>5</td>
                                    <td>$100</td>
                                    <td>COD</td>
                                    <td><span class="mb-2 mr-2 badge badge-success">Delivered</span>
                                    </td>
                                    <td>2021-10-30</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button type="button"
                                                class="btn btn-outline-success">Info</button>
                                            <button type="button"
                                                class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false" data-display="static">
                                                <span class="sr-only">Info</span>
                                            </button>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Detail</a>
                                                <a class="dropdown-item" href="#">Track</a>
                                                <a class="dropdown-item" href="#">Cancel</a>
                                            </div>
                                        </div>
                                    </td>
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

	   	$('#responsive-data-tableh').DataTable({

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

	          'url':  '<?php echo url('/');?>/api/v1/order/list-orderdt'

	      	},

            "columns": [

	            { "data": 'id' },
                { "data": 'order_number' },
                { "data": 'fullname' },
                { "data": 'qty' },
                { "data": 'total_amount' },
                { "data": 'tax_amount' },
                { "data": 'net_amount' },
                // { "data": 'order_status' },
                {  "render": function( data, type, row, meta ) {
                    if(row.order_status == 'DELIVERED'){
                        var a = `<span class="mb-2 mr-2 badge badge-success">${row.order_status}</span>`;
                    }else if(row.order_status == 'RETURN'){
                        var a = `<span class="mb-2 mr-2 badge badge-dark">${row.order_status}</span>`;
                    }else if(row.order_status == 'PENDING'){
                        var a = `<span class="mb-2 mr-2 badge badge-secondary">${row.order_status}</span>`;
                    }else if(row.order_status == 'ON THE WAY'){
                        var a = `<span class="mb-2 mr-2 badge badge-warning">${row.order_status}</span>`;
                    }else if(row.order_status == 'CANCEL'){
                        var a = `<span class="mb-2 mr-2 badge badge-danger">${row.order_status}</span>`;
                    }
                    else if(row.order_status == 'READY TO SHIP'){
                        var a = `<span class="mb-2 mr-2 badge badge-info">${row.order_status}</span>`;
                    }
                    else if(row.order_status == 'NEW'){
                        var a = `<span class="mb-2 mr-2 badge badge-primary">${row.order_status}</span>`;
                    }
                    return a;
               }},

                { "data": 'created_date' },

                {  "render": function( data, type, row, meta ) {
                    var a = `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item" href="<?php echo url('/');?>/invoice/${row.list_id}">Invoice</a><a class="dropdown-item" href="<?php echo url('/');?>/order-detail/${row.list_id}">Detail</a><a class="dropdown-item" href="<?php echo url('/');?>/order-detail/${row.list_id}#trk-order">Track</a><a class="dropdown-item update-status" href="#" data-hash="${row.id}">Cancel</a></div></div>`;
                    return a;
               }}


	      	]

	   	});

	});

    $(document).on("click", ".update-status", function (e) {
		e.preventDefault();
        var id = $(this).attr('data-hash');
            var status = 'CANCEL';
		//var result = confirm("");
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure, you want to Cancel this Order?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
            }).then((result) => {
            if (result.isConfirmed) {
			var id = $(this).attr('data-hash');
            $.ajax({
                        type:'POST',
                        url:'<?php echo url('/');?>/api/v1/order/update-orderstus',
                        data:{'order_id': id,'order_status':status},
                        success:function(data) {
                            console.log(data);
                            if(data.status =="SUCCESS")
                            {
                                location.reload();
                            }else{
                              alert(data.message);
                            }

                        }
                    });
		}
	});
    });

    $(document).on("click", ".get-detail", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-hash');
            $.ajax({
                type: 'GET',
                url: '<?php echo url('/'); ?>/api/v1/order/list-orderbyId',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == "SUCCESS") {
                        console.log(data.list);
                        $('#updateCanvas').offcanvas('show');
                        $('#u_id').val(data.list.id);
                        $('#u_role_name').val(data.list.role_name);
                    } else {
                        alert(data.message);
                    }
                }
            });
        });
</script>
@endsection
