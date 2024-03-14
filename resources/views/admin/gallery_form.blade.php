@include('admin.layouts.header')
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }

    footer {
        display: none
    }

    .row {
        width: 100%;
    }

    body {
        overflow-x: hidden
    }

    input.form-control.form-control-user {
        border-radius: 100px !important;
        padding: 13px !important;
        height: 55px !important;
    }
    .container {
  width: 200px;
  margin: 50px auto;
  font-family: sans-serif;
}
label {
  display: block;
  max-width: 200px;
  margin: 0 auto 15px;
  text-align: center;
  word-wrap: break-word;
  color: #1a4756;
}
.hidden,
#uploadImg:not(.hidden) + label {
  display: none;
}
#file {
  display: none;
  margin: 0 auto;
}
#upload {
  display: block;
  padding: 10px 25px;
  border: 0;
  margin: 0 auto;
  font-size: 15px;
  letter-spacing: 0.05em;
  cursor: pointer;
  background: #216e69;
  color: #fff;
  outline: none;
  transition: 0.3s ease-in-out;
}
#upload:hover,
#upload:focus {
  background: #1aa39a;
}
#upload:active {
  background: #13d4c8;
  transition: 0.1s ease-in-out;
}
img {
  display: block;
  margin: 0 auto 15px;
}

</style>
<div class="row w-100">

    <div class="col-md-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Category</h1>
            </div>
        <div class="container" style="
    width: 100%;display:flex;
">
    <div class="row">
      <form method="post" class="offset-md-2 col-md-8" action="{{ route('gallery_image_form_submit') }}" enctype="multipart/form-data">
      @csrf
        <div class="my-2">
          <input type="file" class="form-control" id="images" name="gallery_image[]" onchange="preview_images();" multiple/>
        </div>
        <div>
          <input onclick="upload_files()" type="button" class="btn btn-primary" name='submit_image' value="Upload Multiple Image"/>
          <input onclick="return resetForm();" type="reset" class="btn btn-danger" name='reset_images' value="Reset"/>
        </div>
          <Select name="product_id">
        @foreach($productModel as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                            
                            </select>
                            <button type="submit" class="btn">Submit</button>
      </form>
      
    </div>
    <div class="row" id="image_preview"></div>

    
    <hr>
  </div>
        </div>
    </div>
</div>

<script>
function preview_images() {
  var total_file = document.getElementById("images").files.length;
  for(var i=0;i<total_file;i++){
    $('#image_preview').append(`
                <div class='col-md-3'>
                    <img style='width:100%' class='img-responsive' src='${URL.createObjectURL(event.target.files[i])}'>
                </div>`);
  }
}
function resetForm(){
  $("#image_preview").html("");
  return true;
}</script>
@include('admin.layouts.footer')
