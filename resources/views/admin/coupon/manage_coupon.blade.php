@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <div>
            <h1>Coupons</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Coupon</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUser"> Add Coupon
            </button>
        </div>

    </div>
    <div class="row">

        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-tablec" class="table">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Coupon Code</th>
                                    <th >Coupon Value</th>
                                    <th >Coupon Status</th>
                                    <th >Created On</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    </div>

 <!-- Add User Modal  -->
 <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
     <div class="modal-content">
        <div class="ec-cat-list card card-default mb-24px">
            <div class="card-body" >
                <div class="ec-cat-form">
                    <h4>Add Coupon</h4>

                    <form action="#" id="addform" method="POST">

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Coupon Code</label>
                            <div class="col-12">
                                <input id="coupon_code" name="coupon_code" name="text" class="form-control here slug-title" type="text">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Coupon Type</label>
                            <div class="col-12">
                                <select id="coupon_type" name="coupon_type"  class="form-select">
                                    <option value="">Select</option>
                                    <option value="0">Amount</option>
                                    <option value="1">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Coupon Value</label>
                            <div class="col-12">
                                <input id="coupon_value" name="coupon_value"  class="form-control " type="text">
                            </div>
                        </div>





                        <div class="row modal-footer">
                            <div class="col-12 float-right">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>
                                <button type="submit" class="btn btn-primary" onclick="add()">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
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
                   <h4>Update Coupon</h4>

                   <form action="#" id="form" method="POST">

                    <input type="hidden" name="u_id" id="u_id">

                    <div class="form-group row">
                        <label for="text" class="col-12 col-form-label">Coupon Code</label>
                        <div class="col-12">
                            <input id="u_coupon_code" name="u_coupon_code" name="text" class="form-control here slug-title" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-12 col-form-label">Coupon Type</label>
                        <div class="col-12">
                            <select id="u_coupon_type" name="u_coupon_type"  class="form-select">
                                <option value="">Select</option>
                                <option value="0">Amount</option>
                                <option value="1">Percentage</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="text" class="col-12 col-form-label">Coupon Value</label>
                        <div class="col-12">
                            <input id="u_coupon_value" name="u_coupon_value"  class="form-control " type="text">
                        </div>
                    </div>

                       <div class="row modal-footer">
                           <div class="col-12">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-hidden="true">Cancel</button>

                               <button type="submit" class="btn btn-primary" onclick="update()">Submit</button>
                           </div>
                       </div>

                   </form>

               </div>
           </div>
       </div>
    </div>
</div>
</div>



</div>

<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        table = $('#datatable-buttons').DataTable( {
        destroy: true,
        searching: false
    });

    table.destroy();
	   	$('#responsive-data-tablec').DataTable({
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
	          'url':  '<?php echo url('/');?>/api/v1/coupon/list-coupondt'
	      	},
            "columns": [
                { "data": 'id' },
                { "data": 'coupon_code' },
                { "data": 'coupon_value' },
                {  "render": function( data, type, row, meta ) {
                    if(row.status == '1'){
                        var a = `<span class="badge badge-success">New</span>`;
                        return a;
                    }else if(row.status == '2'){
                        var a = `<span class="badge badge-warning">Used</span>`;
                        return a;
                    }else{
                        var a = `<span class="badge badge-danger">Removed</span>`;
                        return a;
                    }

               } },

                { "data": 'created_date' },

                {  "render": function( data, type, row, meta ) {
                                           var a = `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item edit-value" href="#" data-hash="${row.id}">Edit</a><a class="dropdown-item delete-value" data-hash="${row.id}" href="#">Delete</a></div></div>`

                                           // var a = `<a href="" data-hash="${row.id} " class="btn btn-sm btn btn-primary btn-addon  m-b-xxs edit-value"><i class="fa fa-edit"></i></a>  <button type="button" data-hash="${row.id} " class="btn btn-sm btn btn-danger btn-addon m-b-xxs delete-value"><i class="fa fa-trash"></i> </button>`;
                                           return a;
               }}

	      	]
	   	});
	});
function add(){

var formInstance = document.getElementById('addform');
event.preventDefault();
 var headers = new Headers();
 headers.set('Accept', 'application/json');
//  $("#save_button").hide();
//  $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < formInstance.length; ++i) {
    if(formInstance[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
    //    console.log(fileField);
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(formInstance[i].name, formInstance[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/coupon/create-coupon';
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
            title: 'Coupon Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-coupon";
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

           $(document).on("click", ".edit-value", function (e) {
e.preventDefault();
    var id = $(this).attr('data-hash');
    $.ajax({
                type:'GET',
                url:'<?php echo url('/');?>/api/v1/coupon/list-coupon-ById',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    if(data.status =="SUCCESS"){
                        console.log(data.list);
                        $("#updateUser").modal('show');
                        $('#u_id').val(data.list.id);
                        $('#u_coupon_code').val(data.list.coupon_code);
                        $('#u_coupon_value').val(data.list.coupon_value);
                        $('#u_coupon_type').val(data.list.coupon_type);

                    }else{
                      alert(data.message);
                    }
                }
            });
});

function update(){

var formInstance = document.getElementById('form');

 var headers = new Headers();
 headers.set('Accept', 'application/json');

 var formData = new FormData();
 for (var i = 0; i < formInstance.length; ++i) {
    if(formInstance[i].name == "u_media"){
        const fileField = document.querySelector('input[name="u_media"]');
       console.log(fileField);

       formData.append('media', fileField.files[0]);
     }else{
       formData.append(formInstance[i].name, formInstance[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/coupon/update-coupon';
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
            title: 'Coupon Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-coupon";
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

           $(document).on("click", ".delete-value", function (e) {
		e.preventDefault();
		//var result = confirm("");
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure, you want to delete this Coupon?",
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
                        url:'<?php echo url('/');?>/api/v1/coupon/delete-coupon',
                        data:{'id': id},
                        success:function(data) {
                            console.log(data);
                            if(data.status =="SUCCESS")
                            {
                                location.reload();
                            }else{
                                Swal.fire(
                                'Failed!',
                                data.message,
                                'error'
                                );
                            }

                        }
                    });
		}
	});
    });
               </script>


@endsection

