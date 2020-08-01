<!-- lưu tại /resources/views/product/create.blade.php -->
@extends('layout.layout')
@section('title', 'product - create new')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-md-3 col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="{{ url('product/postCreate') }}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="txt-id">Produc Id</label>
                                <input type="text" class="formcontrol" id="txt-id" name="id" placeholder="1">
                            </div>
                            <div class="form-group">
                                <label for="txt-name">Produc Name</label>
                                <input type="text" class="formcontrol" id="txt-name" name="name"
                                    placeholder="Input Product Name">
                            </div>
                            <div class="form-group">
                                <label for="txt-price">Produc Price</label>
                                <input type="text" class="formcontrol" id="txt-price" name="price" placeholder="1">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="formcontrol" rows="3" name="description"
                                    placeholder="Enter ..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-fileinput" id="image" name="image">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btnprimary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-section')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-fileinput.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
 bsCustomFileInput.init();
 });
</script>
@endsection