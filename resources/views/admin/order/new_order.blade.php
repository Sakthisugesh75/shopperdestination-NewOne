@extends('admin.main')
@section('content')
    <div class="content">
        <div class="breadcrumb-wrapper breadcrumb-wrapper-2">
            <h1>New Orders</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Orders
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
                                        <th>Item</th>
                                        <th>Name</th>
                                        <th>Customer</th>
                                        <th>Items</th>
                                        <th>Price</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                            <th>AWB No</th>
                                    <th>Shipment</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Update User Modal  -->
        <div class="modal fade modal-add-contact" id="updateUser" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="ec-cat-list card card-default mb-24px">
                        <div class="card-body">
                            <div class="ec-cat-form">
                                <h4>Update Order</h4>

                                <form action="#" id="form" method="POST">

                                    <input type="hidden" name="s_id" id="s_id">

                                    <div class="form-group row">
                                        <div class="col-6">
                                            <label for="text" class="col-12 col-form-label">Order Status</label>
                                            <div class="col-12">
                                                <select id="status" name="status" class="form-select here slug-title"
                                                    type="text">
                                                    <option value="">Select</option>
                                                    <option value="READY TO SHIP">READY TO SHIP</option>
                                                    <option value="ON THE WAY">ON THE WAY</option>
                                                    <option value="DELIVERED">DELIVERED</option>
                                                    <option value="PENDING">PENDING</option>
                                                    <option value="RETURN">RETURN</option>
                                                    <option value="CANCEL">CANCEL</option>
                                                    <option value="NEW">NEW</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row modal-footer">
                                        <div class="col-12">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"
                                                aria-hidden="true">Cancel</button>

                                            <button type="submit" class="btn btn-primary"
                                                onclick="update()">Update</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Update User shipment  -->
      <div class="modal fade modal-add-contact" id="updateShipment" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" >
          <div class="modal-content">
              <div class="ec-cat-list card card-default mb-24px">
                  <div class="card-body">
                      <div class="ec-cat-form">
                          <h4>Update Shipment</h4>

                          <form id="shipform" onsubmit="updateInvoice(event)">
                            <input type="hidden" name="o_id" id="o_id">

                            <div class="row">

                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">Courier</label>
                                            <select id="courier" name="courier" class="form-select col-12" type="text" onchange="checkCourier()">
                                                <option value="">Select Courier</option>
                                                <option value="delhivery">Delhivery</option>
                                                <option value="others">Others</option>
                                            </select>
                                    </div>


                              </div>

                              <div id="delhivery">
                                <div class="row mb-3" >
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">length</label>
                                        <input id="length" name="length" class="form-control col-12"  type="text"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">width</label>
                                        <input id="width" name="width" class="form-control col-12"  type="text"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">Height</label>
                                        <input id="height" name="height" class="form-control col-12"  type="text"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">Weight (in Gms)</label>
                                        <input id="weight" name="weight" class="form-control col-12"  type="text"/>
                                    </div>
                                </div>
                              </div>
                              <div id="others">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">AWB Number</label>
                                        <input id="awb" name="awb" class="form-control col-12"  type="text"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="text" class="col-12 col-form-label">Tracking URL</label>
                                        <input id="track_url" name="track_url" class="form-control col-12"  type="text"/>
                                    </div>
                                </div>
                              </div>

                              <div class="row modal-footer">
                                  <div class="col-12">
                                      <button type="button" class="btn btn-primary" data-dismiss="modal"
                                          aria-hidden="true">Cancel</button>

                                      <button type="submit" class="btn btn-primary"
                                          >Update</button>
                                  </div>
                              </div>

                          </form>

                      </div>
                  </div>
              </div>
          </div>
      </div>
        </div>





    </div> <!-- End Content -->



    {{-- <script src="<?= url('/') ?>/assets/datatable/js/jquery-3.4.1.min.js"></script> --}}

    <script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>


    <script src="<?php echo url('/'); ?>/assets/datatable/js/sweetalert2@11.js"></script>

    <script>


 window.onload = function() {
            checkCourier();


        }




        $(document).ready(function() {

            table = $('#datatable-buttons').DataTable({

                destroy: true,

                searching: false

            });



            table.destroy();

            $('#responsive-data-tableh').DataTable({

                dom: '<"dt-top-container"<l><"dt-center-in-div pt-3"B><f>r>t<ip>',

                buttons: [

                    'copy', 'csv', 'excel', 'pdf', 'print'

                ],

                "order": [
                    [0, "desc"]
                ],

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

                    'url': '<?php echo url('/'); ?>/api/v1/order/list-orderdtbystatus'

                },

                "columns": [

                    {
                        "data": 'id'
                    },
                    {
                        "data": 'order_number'
                    },
                    {
                        "data": 'fullname'
                    },
                    {
                        "data": 'qty'
                    },
                    {
                        "data": 'total_amount'
                    },
                    {
                        "data": 'tax_amount'
                    },
                    {
                        "data": 'net_amount'
                    },
                    // { "data": 'order_status' },
                    {
                        "render": function(data, type, row, meta) {
                            if (row.order_status == 'DELIVERED') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-success">${row.order_status}</span>`;
                            } else if (row.order_status == 'RETURN') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-dark">${row.order_status}</span>`;
                            } else if (row.order_status == 'PENDING') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-secondary">${row.order_status}</span>`;
                            } else if (row.order_status == 'ON THE WAY') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-warning">${row.order_status}</span>`;
                            } else if (row.order_status == 'CANCEL') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-danger">${row.order_status}</span>`;
                            } else if (row.order_status == 'READY TO SHIP') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-info">${row.order_status}</span>`;
                            } else if (row.order_status == 'NEW') {
                                var a =
                                    `<span class="mb-2 mr-2 badge badge-primary">${row.order_status}</span>`;
                            }
                            return a;
                        }
                    },
                     { "data": 'awb_no' },

                      {
                        "render": function(data, type, row, meta) {
                            if( row.order_status == 'NEW' && row.awb_no == ""){
                            var a =
                                `<a class="dropdown-item update-shipment btn btn-primary" href="#" data-hash="${row.id}" >Create Shipment</a>`;
                            return a;
                            }else{
                                var a =
                                `<button class="dropdown-item btn btn-primary" href="#" data-hash="${row.id}" disabled>Created</button>`;
                            return a;
                            }
                        }
                    },

                    {
                        "data": 'created_date'
                    },

                    {
                        "render": function(data, type, row, meta) {
                            var a =
                                `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item" href="<?php echo url('/'); ?>/invoice/${row.list_id}">Invoice</a><a class="dropdown-item" href="<?php echo url('/'); ?>/order-detail/${row.list_id}">Detail</a><a class="dropdown-item" href="<?php echo url('/'); ?>/order-detail/${row.list_id}#trk-order">Track</a><a class="dropdown-item update-status" href="#" data-hash="${row.id}" id="Cancel">Cancel</a><a class="dropdown-item update-order" href="#" data-hash="${row.id}" >Update Status</a></div></div>`;
                            return a;
                        }
                    }


                ]

            });

        });


        $(document).on("click", ".update-status", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-hash');
            // var status = $(this).attr('id');
            // if(statusDt == 'cancel'){
            var status = 'CANCEL';
            // }

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
                        type: 'POST',
                        url: '<?php echo url('/'); ?>/api/v1/order/update-orderstus',
                        data: {
                            'order_id': id,
                            'order_status': status
                        },
                        success: function(data) {
                            console.log(data);
                            if (data.status == "SUCCESS") {
                                location.reload();
                            } else {
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

        $(document).on("click", ".update-order", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-hash');
            console.log(id);
            $("#updateUser").modal('show');
            $('#s_id').val(id);


        });

        function update() {
            var id = $('#s_id').val();
            var status = $('#status').val();
            console.log(id);

            if (status == 'NEW') {
                var deliverystatus = 'Confirmed Order';
            } else if (status == 'READY TO SHIP' || status == 'PENDING') {
                var deliverystatus = 'Processing Order';
            } else if (status == 'ON THE WAY') {
                var deliverystatus =  'Product Dispatched';
            } else if (status == 'DELIVERED')
                var deliverystatus = 'Product Delivered';
            else if (status == 'CANCEL' || status == 'RETURN') {
                var deliverystatus = 'Cancelled'
            }




            if (id != "" && status != "") {
                $.ajax({
                    url: '<?php echo url('/'); ?>/api/v1/order/update-ordercurrentstatus',
                    type: "post",
                    data: {
                        id: id,
                        status: status,
                        deliverystatus:deliverystatus
                            },
                    success: function(data) {
                        if (data["status"] == "SUCCESS") {
                            console.log(data);
                            // alert(data);
                            Swal.fire(
                                'Success!',
                                'User Updated Successfully',
                                'success'
                            );
                            //alert("Account Added Successfully");
                            window.location.href = "<?= url('/') ?>/new-order";
                        } else {
                            console.log("DataS NOT stored");
                            location.reload(true);
                        }
                    },
                    error: function(request, error) {
                        //alert("Request: "+JSON.stringify(request));
                        //$("#staticBackdrop").modal("show");
                        alert("Not Added")
                    }
                });
            } else {
                Swal.fire(
                    'Failed!',
                    'Please Fill the (*) Fields',
                    'error'
                );

            }
            event.preventDefault();
        }


                 function checkCourier(){
            var courier  = $('#courier').val();

            // var courier = document.getElementById('courier').value;
            if (courier === 'delhivery') {
                document.getElementById('delhivery').style.display = 'block';
                document.getElementById('others').style.display = 'none';
            } else if (courier === 'others') {
                document.getElementById('delhivery').style.display = 'none';
                document.getElementById('others').style.display = 'block';
            } else {
                document.getElementById('delhivery').style.display = 'none';
                document.getElementById('others').style.display = 'none';
            }
        }

    function updateInvoice(event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    var formInstance = document.getElementById('shipform');

    var headers = new Headers();
    headers.set('Accept', 'application/json');

    var formData = new FormData(formInstance); // Create FormData from form instance directly

    // Debugging: Log the FormData values to console
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }

    var url = '<?php echo url('/');?>/api/v1/order/update-invoice';
    var fetchOptions = {
        method: 'POST',
        headers,
        body: formData
    };

    fetch(url, fetchOptions)
        .then(response => response.json())
        .then(data => {
            $("#save_button").show();
            $("#save_button_loading").hide();
            if (data.status == 'SUCCESS') {
                console.log(data);
                Swal.fire({
                    title: 'Invoice Updated Successfully',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?=url('/');?>/new-order";
                    }
                });
            } else {
                Swal.fire(
                    'Failed!',
                    data.message,
                    'error'
                );
            }
        })
        .catch(error => console.error('Error:', error));
}

 $(document).on("click", ".update-shipment", function(e) {
            e.preventDefault();
            var id = $(this).attr('data-hash');
            console.log(id);
            $("#updateShipment").modal('show');
            $('#o_id').val(id);


        });
    </script>
@endsection
