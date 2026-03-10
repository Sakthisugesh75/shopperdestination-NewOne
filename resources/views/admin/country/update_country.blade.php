@extends('admin.main')

@section('content')

<div class="content">
    <div class="container">

        <div class="row p-3">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4>Update Country</h4>
                    <div class="page-title-right">
                    <a href="<?php echo url('/');?>/manage-country" class="btn btn-primary"   style="float: right;">Manage Country</a>

                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="#" id="form" method="POST">
                            <input type="hidden" id="country_id" name="country_id" value="<?=$record->country_id?>"/>
                            <div class="mb-3">
                <label class="form-label">country_name</label>
                <input type="text" name="country_name" class="form-control" placeholder="Enter country_name" id="country_name" value="<?=$record->country_name?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">iso3</label>
                <input type="text" name="iso3" class="form-control" placeholder="Enter iso3" id="iso3" value="<?=$record->iso3?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">iso2</label>
                <input type="text" name="iso2" class="form-control" placeholder="Enter iso2" id="iso2" value="<?=$record->iso2?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">numeric_code</label>
                <input type="text" name="numeric_code" class="form-control" placeholder="Enter numeric_code" id="numeric_code" value="<?=$record->numeric_code?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">phone_code</label>
                <input type="text" name="phone_code" class="form-control" placeholder="Enter phone_code" id="phone_code" value="<?=$record->phone_code?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">capital</label>
                <input type="text" name="capital" class="form-control" placeholder="Enter capital" id="capital" value="<?=$record->capital?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">currency</label>
                <input type="text" name="currency" class="form-control" placeholder="Enter currency" id="currency" value="<?=$record->currency?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">currency_name</label>
                <input type="text" name="currency_name" class="form-control" placeholder="Enter currency_name" id="currency_name" value="<?=$record->currency_name?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">currency_symbol</label>
                <input type="text" name="currency_symbol" class="form-control" placeholder="Enter currency_symbol" id="currency_symbol" value="<?=$record->currency_symbol?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">tld</label>
                <input type="text" name="tld" class="form-control" placeholder="Enter tld" id="tld" value="<?=$record->tld?>" >
              </div>
             <div class="mb-3">
                <label class="form-label">is_active</label>
                <input type="text" name="is_active" class="form-control" placeholder="Enter is_active" id="is_active" value="<?=$record->is_active?>" >
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
 var url = '<?php echo url('/');?>/api/v1/country/update-country';
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
            title: 'Country Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-country";
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
               </script>
@endsection
