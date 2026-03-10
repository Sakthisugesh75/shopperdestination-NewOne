@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>Banner List</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Banner
            </p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUser"> Add Banner
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="ec-vendor-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-table1" class="table">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    {{-- <th >Short Heading</th> --}}
                                    <th >Main Heading</th>
                                    <th >Start Price </th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add User Modal  -->
    <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="#" id="addform" method="POST">
                    <div class="modal-header px-4">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Banner</h5>
                    </div>

                    <div class="modal-body px-4">


                        <div class="row mb-2">

                            <div class="col-lg-6">
                                <label class="form-label">Select Categories</label>
                                <select  id="category_id" name="category_id" class="form-select">
                                    <?php

                        if(!empty($category)){
                        foreach ($category as $item) { ?>
                        <option value="<?=$item->id?>"><?=$item->category_name?></option>
                        <?php   }} ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="form-label">Select Page</label>
                                <select  id="page" name="page" class="form-select">
                                    <option value="">Select</option>
                                    <option value="home">Home</option>
                                    <option value="cat1">Category 1</option>
                                    <option value="cat2">Category 2</option>
                                    <option value="cat3">Category 3</option>
                                    <option value="cat4">Category 4</option>
                                    <option value="cat5">Category 5</option>
                                    <option value="cat6">Category 6</option>

                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_name">Short Heading</label>
                                    <input type="text" class="form-control" id="s_head" name="s_head" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_name">Main heading</label>
                                    <input type="text" class="form-control" id="m_head" name="m_head" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_name">Starting At Price</label>
                                    <input type="text" class="form-control" id="start_price" name="start_price" value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="role_name">Banner Image</label>
                                    <input type="file" class="form-control" id="media" name="media" value="">
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-pill" onclick="add()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

      <!-- Update User Modal  -->
      <div class="modal fade modal-add-contact" id="updateUser" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
              <form action="#" id="form" method="POST">
                  <div class="modal-header px-4">
                      <h5 class="modal-title" id="exampleModalCenterTitle">Update Role</h5>
                  </div>

                  <div class="modal-body px-4">
                    <input type="hidden" id="u_id" name="u_id" class="form-control">

                    <div class="row mb-2">

                        <div class="col-lg-6">
                            <label class="form-label">Select Categories</label>
                            <select  id="u_category_id" name="u_category_id" class="form-select">
                                <?php

                    if(!empty($category)){
                    foreach ($category as $item) { ?>
                    <option value="<?=$item->id?>"><?=$item->category_name?></option>
                    <?php   }} ?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label">Select Page</label>
                            <select  id="u_page" name="u_page" class="form-select">
                                <option value="">Select</option>
                                <option value="home">Home</option>
                                <option value="cat1">Category 1</option>
                                <option value="cat2">Category 2</option>
                                <option value="cat3">Category 3</option>
                                <option value="cat4">Category 4</option>
                                <option value="cat5">Category 5</option>
                                <option value="cat6">Category 6</option>

                            </select>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Short Heading</label>
                                <input type="text" class="form-control" id="u_s_head" name="u_s_head" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Main heading</label>
                                <input type="text" class="form-control" id="u_m_head" name="u_m_head" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Starting At Price</label>
                                <input type="text" class="form-control" id="u_start_price" name="u_start_price" value="">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="role_name">Banner Image</label>
                                <input type="file" class="form-control" id="u_media" name="u_media" >
                            </div>
                        </div>
                        <div class="col-lg-6" id="img_display">
                            {{-- <div class="form-group">
                                <label for="role_name">Banner Image</label>
                                <input type="file" class="form-control" id="media" name="media" value="">
                            </div> --}}
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
	   	$('#responsive-data-table1').DataTable({
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
	          'url':  '<?php echo url('/');?>/api/v1/banner/list-bannerdt'
	      	},
            "columns": [
	         	{ "data": 'id' },
                // { "data": 'short_heading' },
                { "data": 'main_heading' },
                { "data": 'starting_at' },
                { "data": 'created_date' },
                {  "render": function( data, type, row, meta ) {
                                           var a = `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item edit-value" href="#" data-hash="${row.id}">Edit</a><a class="dropdown-item delete-value" data-hash="${row.id}" href="#">Delete</a></div></div>`

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
            text: "Are you sure, you want to delete this Banner?",
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
                        url:'<?php echo url('/');?>/api/v1/banner/delete-banner',
                        data:{'id': id},
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
	})
    event.preventDefault();
    });

function add(){
    event.preventDefault();
var insertform = document.getElementById('addform');
// insertform.addEventListener('submit', function(event) {
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 var formData = new FormData();
 for (var i = 0; i < insertform.length; ++i) {
    if(insertform[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(insertform[i].name, insertform[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/banner/create-banner';
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
            title: 'Banner Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/banner";
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
// });
    }

    function update(){
var updateform = document.getElementById('form');
// updateform.addEventListener('submit', function(event) {
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < updateform.length; ++i) {
    if(updateform[i].name == "u_media"){
       const fileField = document.querySelector('input[name="u_media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(updateform[i].name, updateform[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/banner/update-banner';
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
            title: 'Banner Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/banner";
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
// });
    }

           $(document).on("click", ".edit-value", function (e) {
e.preventDefault();
    var id = $(this).attr('data-hash');

    $.ajax({
                type:'GET',
                url:'<?php echo url('/');?>/api/v1/banner/get-bannerdtbyid',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    document.getElementById('img_display').innerHTML = "";
                    if(data.status =="SUCCESS"){
                        console.log(data.list);
                        $("#updateUser").modal('show');
                        $('#u_id').val(data.list.id);
                        $('#u_category_id').val(data.list.category_id);
                        $('#u_s_head').val(data.list.short_heading);
                        $('#u_m_head').val(data.list.main_heading);
                        $('#u_start_price').val(data.list.starting_at);
                        $('#u_page').val(data.list.page);
                        if(data.list.image_url != null){
                        document.getElementById('img_display').innerHTML +=
                            "<img src='<?php echo url('/'); ?>/" + data.list.image_url +
                            "' style='width:50%;height:50%;'/>"
                        }
                    }else{
                      alert(data.message);
                    }
                }
            });
});
    </script>
@endsection
