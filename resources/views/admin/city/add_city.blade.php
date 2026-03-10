@extends('admin.main')

@section('content')

<div class="content">
    <div class="container">

        <div class="row  p-3">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4>Add City</h4>
                    <div class="page-title-right">
                    <a href="<?php echo url('/');?>/manage-city" class="btn btn-primary"   style="float: right;">Manage City</a>

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" id="form" method="POST">
                            <div class="mb-3">
                <label class="form-label">city_name</label>
                <input type="text" name="city_name" class="form-control" placeholder="Enter city_name" id="city_name" >
              </div>
             <div class="mb-3">
                <label class="form-label">state_id</label>
                <select name="state_id" id="state_id" class="form-select" required>
                    <option value="">Select State</option>
                    <?php
                    if(!empty($state)){
                    foreach ($state as $item) { ?>
                    <option value="<?=$item->state_id?>"><?=$item->state_name?></option>
                    <?php   }} ?>
                     </select>
              </div>
             <div class="mb-3">
                <label class="form-label">country_id</label>
                <select name="country_id" id="country_id" class="form-select" onchange="getState()"  required>
                    <option value="">Select Country</option>
                    <?php
                    if(!empty($country)){
                    foreach ($country as $item) { ?>
                    <option value="<?=$item->country_id?>"><?=$item->country_name?></option>
                    <?php   }} ?>
                     </select>
              </div>

                            <div class="text-end">
                                <button class="btn btn-primary" id="save_button" type="submit">Submit</button>
                                <button type="button" style="display:none;" id="save_button_loading" class="btn">Storing the data please wait ...</button>
                            </div>

                        </form>
                    </div>
                </div> <!-- end card -->
            </div>
        </div>

    </div>
</div>
<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
window.onload = function(){

var formInstance = document.getElementById('form');
formInstance.addEventListener('submit', function(event) {
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();
 for (var i = 0; i < formInstance.length; ++i) {
    if(formInstance[i].name == "media"){
       const fileField = document.querySelector('input[name="media"]');
       formData.append('media', fileField.files[0]);
     }else{
       formData.append(formInstance[i].name, formInstance[i].value);
     }
 }
 var url = '<?php echo url('/');?>/api/v1/city/create-city';
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
            title: 'City Added Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-city";
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
});
           }


           function getState(){
            var id = $("#country_id").val();
            $.ajax({
                        type:'GET',
                        url:'<?php echo url('/');?>/api/v1/state/getStateByCountry',
                        data:{'id': id},
                        success:function(data) {
                            console.log(data);

                            if (data.status == "SUCCESS") {
                                 $("#state_id").empty();
                                 console.log(data.list.length);
                                    for(var i = 0; i < data.list.length;i++) {
                                         $("#state_id").append("<option value='"+data.list[i].state_id+"'>"+data.list[i].state_name+'</option>');
                                            }
                            }

                        }
                    });
    }





               </script>
@endsection
