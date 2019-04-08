@extends('layouts.app')
@section('title') Category
@endsection
@section('page-title') Tambah Category
@endsection
@section('content')
    <div class="row">
    <!-- left column -->
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action={{Route('category.store')}} enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kategori</label>
                    <input autocomplete="off" value="{{old('nama_category')}}" type="text" class="form-control {{$errors->first('nama_category') ? "is-invalid" : ""}} " name="nama_category" placeholder="Nama_category">
                    <div class="invalid-feedback">
                    {{$errors->first('nama_category')}}
                    </div>
                </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="submit" class="btn btn-primary">Kembali</button>

                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- /.box -->

    
@endsection