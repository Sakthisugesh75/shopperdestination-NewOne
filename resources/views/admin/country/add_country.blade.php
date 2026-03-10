@extends('admin.main')

@section('content')

<div class="content">
    <div class="container">

        <div class="row  p-3">
            <div class="col-12">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h4>Add Country</h4>
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
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Country Name</label>
                <input type="text" name="country_name" class="form-control" placeholder="Enter Country Name" id="country_name" >
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone Code</label>
                <input type="text" name="phone_code" class="form-control" placeholder="Enter Phone Code" id="phone_code" >
                                </div>


              </div>

             <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Capital</label>
                <input type="text" name="capital" class="form-control" placeholder="Enter capital" id="capital" >
                </div>
                <div class="col-md-6">
                    <label class="form-label">Currency Name</label>
                <input type="text" name="currency_name" class="form-control" placeholder="Enter Currency Name" id="currency_name" >
                </div>
              </div>
             <div class="mb-3">

              </div>

             <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Currency Symbol</label>
              <input type="text" name="currency_symbol" class="form-control" placeholder="Enter Currency Symbol" id="currency_symbol" ></div>

              <div class="col-md-6">
                <label class="form-label">Tld</label>
                <input type="text" name="tld" class="form-control" placeholder="Enter Tld" id="tld" >
              </div>

             <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Is Active</label>
                    <select type="text" name="is_active" class="form-control" placeholder="Enter is_active" id="is_active" >
                        <option value="">Select</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>

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
 var url = '<?php echo url('/');?>/api/v1/country/create-country';
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
            title: 'Country Added Successfully',
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
