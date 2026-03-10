@extends('admin.main')

@section('content')

<div class="content">
    <div class="container">

        <div class="row p-3">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4>Update City</h4>
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
                            <input type="hidden" id="city_id" name="city_id" value="<?=$record->city_id?>"/>
                            <div class="mb-3">
                <label class="form-label">City</label>
                <input type="text" name="city_name" class="form-control" placeholder="Enter city_name" id="city_name" value="<?=$record->city_name?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">State</label>
                <select name="state_id" id="state_id" class="form-select" required>
                    <option value="">Select State</option>
                    <?php
                    if(!empty($state)){
                    foreach ($state as $item) {
                        if($item->state_id == $record->state_id){
                            $checked = "selected";
                        }else{
                            $checked = "";
                        }
                        ?>
                    <option value="<?=$item->state_id?>" <?=$checked?>><?=$item->state_name?></option>
                    <?php   }} ?>
                     </select>
              </div>
             <div class="mb-3">
                <label class="form-label">Country</label>
                <select name="country_id" id="country_id" class="form-select" required onchange="getState()">
                    <option value="">Select Country</option>
                    <?php
                    if(!empty($country)){
                    foreach ($country as $item) {
                        if($item->country_id == $record->country_id){
                            $checked = "selected";
                        }else{
                            $checked = "";
                        }
                        ?>
                    <option value="<?=$item->country_id?>" <?=$checked?>><?=$item->country_name?></option>
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
 var url = '<?php echo url('/');?>/api/v1/city/update-city';
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
            title: 'City Updated Successfully',
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
