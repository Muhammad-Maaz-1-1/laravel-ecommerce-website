@include('admin.layouts.header')
<script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -0.75rem;
        margin-left: -0.75rem;
    }
    select{
        display: block;width: 100%;border: 1px solid #d1d3e2;padding: 14px;border-radius: 100px;
    }
    textarea {
    display: block;
    width: 100%;
    height: 101px;
    border: 1px solid #d1d3e2;
}
    footer {
        display: none
    }

    .row {
        width: 100%;
    }
    select {
    display: block;
    width: 100%;
    border: 1px solid #d1d3e2;
    padding: 14px;
    border-radius: 100px;
}
label{width: 100%}
    body {
        overflow-x: hidden
    }

    input.form-control.form-control-user {
        border-radius: 100px !important;
        padding: 13px !important;
        height: 55px !important;
    }
</style>
<div class="row w-100">

    <div class="col-md-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Category</h1>
            </div>
            <form action="{{ route('product_form_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Name<span class="text-danger">*
                            </span>
                        </label>
                        <input name="name" type="text" class="form-control form-control-user"
                            placeholder="Title Name" value="Aliquam lobortis set" required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Product Image<span class="text-danger">*
                            </span>
                        </label>
                        <input name="image" type="file" class="form-control form-control-user"
                             required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Product Price<span class="text-danger">*
                            </span>
                        </label>
                        <input name="price" type="number" class="form-control form-control-user"
                            placeholder="Product Price" required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">IS For<span class="text-danger">*
                            </span>
                     <select name="is_for" id="" style="display: block;width: 100%;border: 1px solid #d1d3e2;padding: 14px;border-radius: 100px;">
                        <option value="men">Men</option>
                        <option value="women">women</option>
                     </select>
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Selct cateogries<span class="text-danger">*
                            </span>
                        </label>
                        <select name="categories" id="" style="display: block;width: 100%;border: 1px solid #d1d3e2;padding: 14px;border-radius: 100px;">
                            @foreach($categoryModel as $key => $value)
                                <option value="{{ $value->id }}">{{ $value->categoryName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-12 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Product Description<span class="text-danger">*
                            </span>
                        </label>
                      {{-- <textarea name="description" id="" cols="30" rows="10">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id

                      </textarea> --}}
                      <textarea name="editor" id="editor"></textarea>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>

                    </div>
                 
                    <button class="btn btn-primary btn-user" type="submit"
                        style="border-radius: 100px;margin-left:10px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
