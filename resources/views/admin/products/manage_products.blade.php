@extends('admin.main')



@section('content')



<div class="content">
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Product</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
        </div>
        <div>
            <a href="<?php echo url('/');?>/add-products" class="btn btn-primary"> Add Porduct</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-tablep" class="table"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Purchased</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
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
     <!-- Update Product Modal  -->
     <div class="modal fade modal-add-contact" id="updateUser" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <form action="#" id="form" method="POST">
                 <div class="modal-header px-4">
                     <h5 class="modal-title" id="exampleModalCenterTitle">Update Daily Deal</h5>
                 </div>

                 <div class="modal-body px-4">
                   <input type="hidden" class="form-control" id="id" name="id" value="">


                     <div class="row mb-2">
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <label for="role_name">Daily Deal</label>
                                 <select type="text" class="form-select" id="dealdt" name="dealdt"  required>
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                 </select>
                             </div>
                         </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Daily Price</label>
                                <input type="text" class="form-control" id="deal_price" name="deal_price"  required>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Deal Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date"  required>

                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Deal End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date"  required>

                            </div>
                        </div>



                     </div>
                 </div>

                 <div class="modal-footer px-4">
                     <button type="button" class="btn btn-secondary btn-pill"
                         data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary btn-pill" onclick="update()">Update</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>

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

	          'url':  '<?php echo url('/');?>/api/v1/products/list-productsdt'

	      	},

            "columns": [

	            { "data": 'id' },
                { "data": 'product_name' },
                //{ "data": 'product_desc' },
                { "data": 'purchase_price' },
                { "data": 'price' },
                { "data": 'category_id' },
                { "data": 'sub_category_id' },
                { "data": 'created_date' },

                {  "render": function( data, type, row, meta ) {
                                           var a = `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item" href="<?php echo url('/');?>/edit-products/${row.list_id}" >Edit</a><a class="dropdown-item delete-value" data-hash="${row.id}" href="#">Delete</a></div></div>`

                                           // var a = `<a href="" data-hash="${row.id} " class="btn btn-sm btn btn-primary btn-addon  m-b-xxs edit-value"><i class="fa fa-edit"></i></a>  <button type="button" data-hash="${row.id} " class="btn btn-sm btn btn-danger btn-addon m-b-xxs delete-value"><i class="fa fa-trash"></i> </button>`;
                                           return a;
               }}



	      	]

	   	});

	});

    $(document).on("click", ".delete-value", function (e) {

		e.preventDefault();

		//var result = confirm("");

        Swal.fire({

            title: 'Are you sure?',

            text: "Are you sure, you want to delete this Products?",

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#3085d6',

            cancelButtonColor: '#d33',

            confirmButtonText: 'Yes'

            }).then((result) => {

            if (result.isConfirmed) {

			var id = $(this).attr('data-hash');

            $.ajax({

                        type:'DELETE',

                        url:'<?php echo url('/');?>/api/v1/products/delete-products',

                        data:{'id': id},

                        success:function(data) {

                            console.log(data);

                            if(data.status =="SUCCESS")

                            {

                                $('#datatable').DataTable().ajax.reload();

                               // location.reload();

                            }else{

                              alert(data.message);

                            }



                        }

                    });

		}

	});

    });






$(document).on("click", ".daily-deal", function (e) {

    var id= $(this).attr('data-hash');

    console.log(id);

    if(id !=""){

		e.preventDefault();

        $.ajax({

                        type:'GET',

                        url:'<?php echo url('/');?>/api/v1/products/list-products-ById',

                        data:{'id':id},

                        success:function(data) {

                            console.log(data);

                            if(data.status =="SUCCESS")

                       {
                        // console.log("here");
                        $("#updateUser").modal('show');
                        $('#id').val(data.list.id);
                        $('#dealdt').val(data.list.daily_deal);
                        $('#deal_price').val(data.list.deal_price);
                        $('#start_date').val(data.list.start_date);
                        $('#end_date').val(data.list.end_date);


                        }else{
                            $("#error").show();
                            $("#errormessage").text(data.message);
                            }
                        }

                    });

    }else{

        Swal.fire(

               'Failed!',

               'Please Fill the (*) Fields',

               'error'

        );



}

});

        //    }

function update(){
var updateform = document.getElementById('form');
// updateform.addEventListener('submit', function(event) {
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < updateform.length; ++i) {
    if(updateform[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(updateform[i].name, updateform[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/products/update-deal-details';
 var fetchOptions = {
   method: 'POST',
   headers,
   body: formData
 };
 var responsePromise = fetch(url, fetchOptions);
 responsePromise
     .then(response => response.json())
       .then(data => {
        $("#save_button").show();
        $("#save_button_loading").hide();
           if (data.status == 'SUCCESS') {
               // console.log(data);
               Swal.fire({
            title: 'Role Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                location.reload();
            }})
           } else {
               Swal.fire(
               'Failed!',
               data.message,
               'error'
               );
           }
       })
 event.preventDefault();
        }




    </script>








@endsection

