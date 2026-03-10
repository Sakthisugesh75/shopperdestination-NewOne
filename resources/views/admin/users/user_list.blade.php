@extends('admin.main')
@section('content')

<div class="content">
    <div class="breadcrumb-wrapper breadcrumb-contacts">
        <div>
            <h1>User List</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>User
            </p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addUser"> Add User
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
                                    <th >First name</th>
                                    <th >Last name</th>
                                    <th >Email</th>
                                    <th >Date of Birth</th>
                                    <th >Role</th>
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
                        <h5 class="modal-title" id="exampleModalCenterTitle">Add User</h5>
                    </div>

                    <div class="modal-body px-4">
                        <div class="form-group row mb-6">
                            <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
                                Image</label>

                            <div class="col-sm-8 col-lg-10">
                                <div class="custom-file mb-1">
                                    <input type="file" class="custom-file-input" id="media" name="media"
                                        >
                                    <label class="custom-file-label" for="coverImage">Choose
                                        file...</label>
                                    <div class="invalid-feedback">Example invalid custom file feedback
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="firstName">First name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="lastName">Last name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="userName">User name</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="userName">Password</label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="Birthday">Birthday</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="event">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-4">
                                    <label for="event">Role</label>
                                    <select name="role" class="form-select" placeholder="Enter role" id="role" >
                                        <option value="">Select Role</option>
                                        <?php
                                        if(!empty($role)){
                                        foreach ($role as $item) { ?>
                                        <option value="<?=$item->id?>"><?=$item->role_name?></option>
                                        <?php   }} ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer px-4">
                        <button type="button" class="btn btn-secondary btn-pill"
                            data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-pill" onclick="save()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Add User Modal  -->
     <div class="modal fade modal-add-contact" id="updateUser" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <form action="#" id="form" method="POST">
                 <div class="modal-header px-4">
                     <h5 class="modal-title" id="exampleModalCenterTitle">Update User</h5>
                 </div>
                 <input type="hidden" id="u_id" name="u_id">
                 <div class="modal-body px-4">
                     <div class="form-group row mb-6">
                         <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">User
                             Image</label>

                         <div class="col-sm-8 col-lg-10">
                             <div class="custom-file mb-1">
                                 <input type="file" class="custom-file-input" id="u_media" name="u_media"
                                     >
                                 <label class="custom-file-label" for="coverImage">Choose
                                     file...</label>
                                 <div class="invalid-feedback">Example invalid custom file feedback
                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row mb-2">
                         <div class="col-lg-6">
                             <div class="form-group">
                                 <label for="firstName">First name</label>
                                 <input type="text" class="form-control" id="u_firstName" name="u_firstName" value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group">
                                 <label for="lastName">Last name</label>
                                 <input type="text" class="form-control" id="u_lastName" name="u_lastName" value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="userName">User name</label>
                                 <input type="text" class="form-control" id="u_username" name="u_username"
                                     value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="userName">Password</label>
                                 <input type="text" class="form-control" id="u_password" name="u_password"
                                     value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="email">Email</label>
                                 <input type="email" class="form-control" id="u_email" name="u_email"
                                     value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="Birthday">Birthday</label>
                                 <input type="date" class="form-control" id="u_dob" name="u_dob"
                                     value="">
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="event">Address</label>
                                 <input type="text" class="form-control" id="u_address" name="u_address"
                                     value="">
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="form-group mb-4">
                                 <label for="event">Role</label>
                                 <select name="u_role" class="form-select" placeholder="Enter role" id="u_role" >
                                     <option value="">Select Role</option>
                                     <?php
                                     if(!empty($role)){
                                     foreach ($role as $item) { ?>
                                     <option value="<?=$item->id?>"><?=$item->role_name?></option>
                                     <?php   }} ?>
                                 </select>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="modal-footer px-4">
                     <button type="button" class="btn btn-secondary btn-pill"
                         data-bs-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary btn-pill" onclick="update()">Save</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div> <!-- End Content -->

{{-- <script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script> --}}
<script src="<?= url('/') ?>/assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
       table = $('#responsive-data-table').DataTable({
       destroy: true,
       searching: false
   });
   table.destroy();

          $('#responsive-data-table1').DataTable({
            bDestroy:true,
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
             'url':  '<?php echo url('/');?>/api/v1/users/list-usersdt'
             },


           "columns": [
                { "data": 'id' },
               { "data": 'firstname' },
               { "data": 'lastname' },
               { "data": 'email' },
               { "data": 'dob' },
               { "data": 'role' },
               { "data": 'created_date' },
               {  "render": function( data, type, row, meta ) {
                                           var a = `<div class="btn-group mb-1"><button type="button" class="btn btn-outline-success">Info</button><button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"><span class="sr-only">Info</span></button><div class="dropdown-menu"><a class="dropdown-item edit-value" href="#" data-hash="${row.id}">Edit</a><a class="dropdown-item delete-value" data-hash="${row.id}" href="#">Delete</a></div></div>`

                                           // var a = `<a href="" data-hash="${row.id} " class="btn btn-sm btn btn-primary btn-addon  m-b-xxs edit-value"><i class="fa fa-edit"></i></a>  <button type="button" data-hash="${row.id} " class="btn btn-sm btn btn-danger btn-addon m-b-xxs delete-value"><i class="fa fa-trash"></i> </button>`;
                                           return a;
               }}
             ]
          });
   });


   function save(){

   var insertform = document.getElementById('addform');
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < insertform.length; ++i) {
    if(insertform[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(insertform[i].name, insertform[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/users/create-users';
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
            title: 'Users Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-users";
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
                url:'<?php echo url('/');?>/api/v1/users/get-usersdt',
                data:{'id': id},
                success:function(data) {
                    console.log(data);
                    if(data.status =="SUCCESS"){
                        console.log(data.list);
                        $("#updateUser").modal('show');
                        $('#u_id').val(data.list.id);
                        $('#u_firstName').val(data.list.first_name);
                        $('#u_lastName').val(data.list.last_name);
                        $('#u_userName').val(data.list.username);
                        $('#u_password').val(data.list.password);
                        $('#u_email').val(data.list.email);
                        $('#u_dob').val(data.list.dob);
                        $('#u_address').val(data.list.address);
                        $('#u_role').val(data.list.role);

                    }else{
                      alert(data.message);
                    }
                }
            });
});

function update(){

var insertform = document.getElementById('form');
// insertform.addEventListener('submit', function(event) {
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < insertform.length; ++i) {
    if(insertform[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(insertform[i].name, insertform[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/users/update-users';
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
            title: 'Users Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-users";
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
};




   </script>



@endsection
