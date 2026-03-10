@extends('admin.main')
@section('content')
<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-wrapper-2 breadcrumb-contacts">
        <div>
            <h1>Main Category</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Main Category</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUser"> Add Category
            </button>
        </div>

    </div>
    <div class="row">
        {{-- <div class="col-xl-4 col-lg-12"> --}}
            {{-- <div class="ec-cat-list card card-default mb-24px">
                <div class="card-body">
                    <div class="ec-cat-form">
                        <h4>Add New Category</h4>

                        <form>

                            <div class="form-group row">
                                <label for="text" class="col-12 col-form-label">Name</label>
                                <div class="col-12">
                                    <input id="text" name="text" class="form-control here slug-title" type="text">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="slug" class="col-12 col-form-label">Slug</label>
                                <div class="col-12">
                                    <input id="slug" name="slug" class="form-control here set-slug" type="text">
                                    <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-form-label">Sort Description</label>
                                <div class="col-12">
                                    <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-form-label">Full Description</label>
                                <div class="col-12">
                                    <textarea id="fulldescription" name="fulldescription" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-12 col-form-label">Product Tags <span>( Type and
                                        make comma to separate tags )</span></label>
                                <div class="col-12">
                                    <input type="text" class="form-control" id="group_tag" name="group_tag" value="" placeholder="" data-role="tagsinput">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-xl-12 col-lg-12">
            <div class="ec-cat-list card card-default">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="responsive-data-tablec" class="table">
                            <thead>
                                <tr>
                                    <th >#</th>
                                    <th >Name</th>
                                    <th>Slug</th>
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
                    <h4>Add Category</h4>

                    <form action="#" id="addform" method="POST">

                        <div class="form-group row">
                            <label for="text" class="col-12 col-form-label">Name</label>
                            <div class="col-12">
                                <input id="cat_name" name="cat_name" name="text" class="form-control here slug-title" type="text">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="slug" class="col-12 col-form-label">Slug</label>
                            <div class="col-12">
                                <input id="slug" name="slug" class="form-control here set-slug" type="text">
                                {{-- <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small> --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label">Sort Description</label>
                            <div class="col-12">
                                <textarea id="sortdescription" name="sortdescription" cols="40" rows="2" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label">Full Description</label>
                            <div class="col-12">
                                <textarea id="fulldescription" name="fulldescription" cols="40" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label">Product Tags <span>( Type and
                                    make comma to separate tags )</span></label>
                            <div class="col-12">
                                <input type="text" class="form-control" id="group_tag" name="group_tag" data-role="tagsinput">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-12 col-form-label">Image </label>
                            <div class="col-12">
                                <input type="file" class="form-control" id="media" name="media" data-role="tagsinput">
                            </div>
                        </div>

                        <div class="row modal-footer">
                            <div class="col-12 float-right">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>
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
                   <h4>Update Category</h4>

                   <form action="#" id="form" method="POST">

                    <input type="hidden" name="u_id" id="u_id">

                       <div class="form-group row">
                           <label for="text" class="col-12 col-form-label">Name</label>
                           <div class="col-12">
                               <input id="u_cat_name" name="u_cat_name"  class="form-control here slug-title" type="text">
                           </div>
                       </div>

                       <div class="form-group row">
                           <label for="slug" class="col-12 col-form-label">Slug</label>
                           <div class="col-12">
                               <input id="u_slug" name="u_slug" class="form-control here set-slug" type="text">
                               {{-- <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small> --}}
                           </div>
                       </div>

                       <div class="form-group row">
                           <label class="col-12 col-form-label">Sort Description</label>
                           <div class="col-12">
                               <textarea id="u_sortdescription" name="u_sortdescription" cols="40" rows="2" class="form-control"></textarea>
                           </div>
                       </div>

                       <div class="form-group row">
                           <label class="col-12 col-form-label">Full Description</label>
                           <div class="col-12">
                               <textarea id="u_fulldescription" name="u_fulldescription" cols="40" rows="4" class="form-control"></textarea>
                           </div>
                       </div>

                       <div class="form-group row">
                           <label class="col-12 col-form-label">Product Tags <span>( Type and
                                   make comma to separate tags )</span></label>
                           <div class="col-12">
                               <input type="text" class="form-control" id="u_group_tag" name="u_group_tag" data-role="tagsinput">
                           </div>
                       </div>

                       <div class="form-group row">
                        <label class="col-12 col-form-label">Image </label>
                        <div class="col-12">
                            <input type="file" class="form-control" id="u_media" name="u_media" >
                        </div>
                    </div>

                       <div class="row modal-footer">
                           <div class="col-12">
                            <button type="button" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Cancel</button>

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
	          'url':  '<?php echo url('/');?>/api/v1/category/list-categorydt'
	      	},
            "columns": [
                { "data": 'id' },
                { "data": 'name' },
                { "data": 'slug' },
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
 var url = '<?php echo url('/');?>/api/v1/category/create-category';
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
            title: 'Category Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-category";
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
                url:'<?php echo url('/');?>/api/v1/category/list-category-ById',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    if(data.status =="SUCCESS"){
                        console.log(data.list);
                        $("#updateUser").modal('show');
                        $('#u_id').val(data.list.id);
                        $('#u_cat_name').val(data.list.category_name);
                        $('#u_slug').val(data.list.slug);
                        $('#u_sortdescription').text(data.list.short_desc);
                        $('#u_fulldescription').text(data.list.full_desc);
                        $('#u_group_tag').val(data.list.tags);
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
 var url = '<?php echo url('/');?>/api/v1/category/update-category';
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
            title: 'Category Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-category";
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
            text: "Are you sure, you want to delete this Category?",
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
                        url:'<?php echo url('/');?>/api/v1/category/delete-category',
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
	});
    });
               </script>


@endsection

