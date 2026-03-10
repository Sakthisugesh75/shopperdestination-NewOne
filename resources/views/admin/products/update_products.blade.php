@extends('admin.main')

@section('content')

<div class="content">
    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
        <div>
            <h1>Update Product</h1>
            <p class="breadcrumbs"><span><a href="<?php echo url('/');?>/">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Product</p>
        </div>
        <div>
            <a href="<?php echo url('/');?>/manage-products" class="btn btn-primary"> View Products
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Update Product</h2>
                </div>

                <div class="card-body">
                    <div class="row ec-vendor-uploads">

                        <div class="col-lg-12">
                            <div class="ec-vendor-upload-detail">
                                <form class="row g-3" id="form">
                                    <input type="hidden" id="id" name="id" value="<?=$record->id?>"/>
                                    <div class="col-md-12">
                                        <label for="inputEmail4" class="form-label">Product name</label>
                                        <select type="text" class="form-select slug-title" id="product" name="product">
                                            <option value="">Select Product</option>
                                            <?php

                                            if(!empty($groupcode)){
                                            foreach ($groupcode as $item) { ?>
                                            <option value="<?=$item->id?>" <?php if($record->product_group == $item->group_code){ ?>  selected  <?php }?>><?=$item->product_name?>(<?=$item->group_code?>)</option>
                                            <?php   }} ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Categories</label>
                                        <select  id="category_id" name="category_id" class="form-select">
                                            <?php

                                if(!empty($category)){
                                foreach ($category as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($record->category_id == $item->id){ ?>  selected  <?php }?>><?=$item->category_name?></option>
                                <?php   }} ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Select Sub Categories</label>
                                        <select  id="subcategory_id" name="subcategory_id" class="form-select">
                                            <?php

                                if(!empty($subcategory)){
                                foreach ($subcategory as $item) { ?>
                                <option value="<?=$item->id?>" <?php if($record->sub_category_id == $item->id){ ?>  selected  <?php }?>><?=$item->sub_category_name?></option>
                                <?php   }} ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="slug" class="col-12 col-form-label">Slug</label>
                                        <div class="col-12">
                                            <input id="slug" name="slug"  class="form-control here set-slug" type="text" value="<?=$record->slug?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Sort Description</label>
                                        <textarea class="form-control" rows="2" id="short_desc" name="short_desc" ><?=$record->short_desc?></textarea>
                                    </div>

                                    <div class="col-md-6 mb-25">
                                        <label class="form-label">Colors (comma-separated)</label>
                                        <select id="color" name="color" class="form-select">
                                            <option value="">Select</option>
                                            <?php if (!empty($color)) {
                                                foreach ($color as $item) { ?>
                                                    <option value="<?= $item->id ?>" style="color: <?= $item->color_code ?>;" <?php if($record->color == $item->id){ ?>  selected  <?php }?>>
                                                        <?= $item->color ?>
                                                    </option>
                                            <?php } } ?>
                                        </select>

                                    </div>
                                    <?php $sizes = explode( ',',$record->size );
                                    // print_r($sizes);
                                    // exit;
                                    ?>
                                    <div class="col-md-6 mb-25">
                                        <label class="form-label">Size</label>
                                        {{-- <div class="form-checkbox-box">
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="sizeS" value="S" <?php echo (in_array('S', $sizes) ? 'checked' : ''); ?>>
                                                <label for="sizeS">S</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="sizeM" value="M" <?php echo (in_array('M', $sizes) ? 'checked' : ''); ?>>
                                                <label for="sizeM">M</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="sizeL" value="L" <?php echo (in_array('L', $sizes) ? 'checked' : ''); ?>>
                                                <label for="sizeL">L</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="sizeXL" value="XL" <?php echo (in_array('XL', $sizes) ? 'checked' : ''); ?>>
                                                <label for="sizeXL">XL</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="sizeXXL" value="XXL" <?php echo (in_array('XXL', $sizes) ? 'checked' : ''); ?>>
                                                <label for="sizeXXL">XXL</label>
                                            </div>
                                        </div> --}}
                                        <?php if(!empty($size)){
                                            foreach ($size as $key => $value) { ?>
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="size[]" id="size[]" value="{{ $value->id }}" <?php echo (in_array( $value->id , $sizes) ? 'checked' : ''); ?>>
                                                <label>{{ $value->size }}</label>
                                            </div>
                                        <?php }} ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Price <span>( In INR
                                                )</span></label>
                                        <input type="number" class="form-control" id="price" name="price" value="<?=$record->price?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Old Price <span>( In INR
                                                )</span></label>
                                        <input type="number" class="form-control" id="old_price" name="old_price" value="<?=$record->old_price?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Purchased Price <span>( In INR
                                                )</span></label>
                                        <input type="number" class="form-control" id="p_price" name="p_price" value="<?=$record->purchased_price?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Offer </label>
                                        <input type="number" class="form-control" id="offer" name="offer" value="<?=$record->offer?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Offer type </label>
                                        <select type="text" class="form-select" id="offer_type" name="offer_type">
                                            <option value="">Select</option>
                                                <option value="1" <?php if($record->offer_type == '1'){ ?>  selected  <?php }?>>Amount</option>
                                                <option value="0" <?php if($record->offer_type == '0'){ ?>  selected  <?php }?>>Percentage</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" class="form-control" id="qnty" name="qnty" value="<?=$record->qty?>">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Full Detail</label>
                                        <textarea class="form-control" rows="4" id="details" name="detail"><?=$record->detail?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Product Tags <span>( Type and
                                                make comma to separate tags )</span></label>
                                        <input type="text" class="form-control" id="group_tag"
                                            name="group_tag"  placeholder=""
                                            data-role="tagsinput" value="<?=$record->tags?>"/>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Image </label>
                                        <input type="file" class="form-control" id="media"
                                            name="media" value="" placeholder=""
                                             />
                                    </div>
                                    <?php if($record->image_url != null){ ?>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Product Image Display </label>
                                            <img src="<?= url('/') ?>/<?=$record->image_url?>" alt="" width="50%"/>
                                        </div>
                                        <?php  }?>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Product Images </label>
                                        <input type="file" class="form-control" id="images"
                                            name="images" value="" placeholder=""
                                            data-role="tagsinput" multiple/>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                    <?php if(!empty($images)){
                                        foreach ($images as $key => $image) { ?>

                                            <img src="<?= url('/') ?>/<?=$image->image_url?>" alt="no image" height="250px" width="250px" />&nbsp;
                                            <button type="button" style="vertical-align: top;border-radius: 10px;margin: -8px 0px 0px -13px;line-height: 1;height: 20px;"  class="btn btn-sm btn btn-danger btn-addon m-b-xxs delete-value" data-hash="<?=$image->id?>"><i class="fas fas-close"></i> </button>

                                    <?php    }
                                    } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Content -->
<script src="<?=url('/')?>/assets/datatable/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo url('/');?>/assets/datatable/js/sweetalert2@11.js"></script>
<script type="text/javascript">
window.onload = function(){

var formInstance = document.getElementById('form');
formInstance.addEventListener('submit', function(event) {
    event.preventDefault();
    // getcheckbox();
 var headers = new Headers();
 headers.set('Accept', 'application/json');
 $("#save_button").hide();
 $("#save_button_loading").show();
 var formData = new FormData();

for (var i = 0; i < formInstance.length; ++i) {
    if (formInstance[i].name == "media") {
        const fileField = document.querySelector('input[name="media"]');
        formData.append('media', fileField.files[0]);
    }else if(formInstance[i].name == "images"){
        const fileField = document.querySelector('input[name="images"]');
        for(j=0;j<fileField.files.length;j++){
            formData.append('images[]', fileField.files[j]);
        }

     }

    else if (formInstance[i].name == "size[]") {
        var checkboxes = document.querySelectorAll('input[name="size[]"]');
        var selectedSizes = [];

        // Iterate over the checkboxes and check if they are checked
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                // If checked, add the value to the selectedSizes array
                selectedSizes.push(checkbox.value);
            }
        });

        // Construct the comma-separated string of selected sizes
        var size = selectedSizes.join();

        // Append the size to the FormData object
        formData.append('size', size);
    } else {
        formData.append(formInstance[i].name, formInstance[i].value);
    }
}
 var url = '<?php echo url('/');?>/api/v1/products/update-products';
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
            title: 'Products Updated Successfully',
            icon: 'success',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?=url('/');?>/manage-products";
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

function getcheckbox(){
   // Select all checkboxes with name "size[]"
var checkboxes = document.querySelectorAll('input[name="size[]"]');

// Initialize an array to store the selected checkbox values
var selectedSizes = [];

var size;

// Iterate over the checkboxes and check if they are checked
checkboxes.forEach(function(checkbox) {
    if (checkbox.checked) {
        // If checked, add the value to the selectedSizes array
        selectedSizes.push(checkbox.value);
        size = selectedSizes.join();
    }
});

// Now, selectedSizes array contains the values of the selected checkboxes
console.log(selectedSizes);

}

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

                url:'<?php echo url('/');?>/api/v1/products/delete-product-image',

                data:{'id': id},

                success:function(data) {

                    console.log(data);

                    if(data.status =="SUCCESS")

                    {

                        location.reload();

                       // location.reload();

                    }else{

                      alert(data.message);

                    }



                }

            });

}

});

});




      // Get the input elements
      var titleInput = document.getElementById('product');
var slugInput = document.getElementById('slug');

// Add an event listener to the title input
titleInput.addEventListener('input', function() {
    console.log(titleInput);
//   var titleDt = titleInput.value;
  const selectedOption = titleInput.options[titleInput.selectedIndex].text;
  const productName = selectedOption.split('(')[0].trim();
  var slug = createSlug(productName);
  slugInput.value = slug;
});

// var u_titleInput = document.getElementById('u_product_name');
// var u_slugInput = document.getElementById('u_slug');

// // Add an event listener to the title input
// u_titleInput.addEventListener('change', function() {
//   var title = u_titleInput.value;
//   var slug = createSlug(title);
//   u_slugInput.value = slug;
// });


function createSlug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // Trim leading/trailing white spaces
  str = str.toLowerCase(); // Convert to lowercase
  str = str.replace(/[^a-z0-9 -]/g, '') // Remove non-alphanumeric characters except spaces and hyphens
    .replace(/\s+/g, '-') // Replace spaces with hyphens
    .replace(/-+/g, '-'); // Replace multiple hyphens with a single hyphen

 return str;
}
               </script>








@endsection
