@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <div>
            <h1>Size</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Size</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUser"> Add Size
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
                                    <th >Size</th>
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
                    <h4>Add Size</h4>

                    <form action="#" id="addform" method="POST">

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Size</label>
                            <div class="col-12">
                                <input id="size" name="size" name="text" class="form-control here slug-title" type="text">
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
                   <h4>Update Size</h4>

                   <form action="#" id="form" method="POST">

                    <input type="hidden" name="u_id" id="u_id">

                       <div class="form-group row">
                           <label for="text" class="col-12 col-form-label">Size</label>
                           <div class="col-12">
                               <input id="u_size" name="u_size"  class="form-control here slug-title" type="text">
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
	          'url':  '<?php echo url('/');?>/api/v1/size/list-sizedt'
	      	},
            "columns": [
                { "data": 'id' },
                { "data": 'size' },
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
 var url = '<?php echo url('/');?>/api/v1/size/create-size';
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
            title: 'Size Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-size";
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
                url:'<?php echo url('/');?>/api/v1/size/list-size-ById',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    if(data.status =="SUCCESS"){
                        console.log(data.list);
                        $("#updateUser").modal('show');
                        $('#u_id').val(data.list.id);
                        $('#u_size').val(data.list.size);

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
 var url = '<?php echo url('/');?>/api/v1/size/update-size';
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
            title: 'Size Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-size";
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
            text: "Are you sure, you want to delete this Size?",
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
                        url:'<?php echo url('/');?>/api/v1/size/delete-size',
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

