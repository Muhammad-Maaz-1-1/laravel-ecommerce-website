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
</style>
<div class="row w-100">

    <div class="col-md-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Add new Category</h1>
            </div>
            <form action="">
                <div class="form-group row">
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Heading<span class="text-danger">*
                            </span>
                        </label>
                        <input name="heading" type="text" class="form-control form-control-user"
                            placeholder="Category Heading" required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Heading<span class="text-danger">*
                            </span>
                        </label>
                        <input name="heading" type="text" class="form-control form-control-user"
                            placeholder="Category Heading" required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Heading<span class="text-danger">*
                            </span>
                        </label>
                        <input name="heading" type="text" class="form-control form-control-user"
                            placeholder="Category Heading" required="">
                    </div>
                    <div class="col-lg-6 mb-3 mt-2">
                        <label for="heading" style="margin-left: 10px !important;">Heading<span class="text-danger">*
                            </span>
                        </label>
                        <input name="heading" type="text" class="form-control form-control-user"
                            placeholder="Category Heading" required="">
                    </div>
                    <button class="btn btn-primary btn-user" type="submit"
                        style="border-radius: 100px;margin-left:10px;">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('admin.layouts.footer')
