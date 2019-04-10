@extends('layouts.app')
  @push('customcss')
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  @endpush
  @section('title','Dashboard')
  @section('page-title','Home')
  @section('content')
  <!-- Default box -->
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add New Artikel

            </h3>
        </div>
            <!-- /.box-header -->
            <div class="box-body pad">
                <form action={{ route('article.update',$yangdikirim->id) }} enctype="multipart/form-data" method="POST" onsubmit="return (data berhasil ditambahkan")>
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Judul Artikel</label>
                          <input value="{{$yangdikirim->title}}" type="text" class="form-control {{$errors->first('title') ? "is-invalid" : ""}} " name="title" placeholder="title">
                          <div class="invalid-feedback">
                          {{$errors->first('title')}}
                          </div>
                    </div>

                    <div class="form-group">
                        <label>Gambar</label>
                        @if($yangdikirim->picture)
                        <img src="{{asset('uploads/'. $yangdikirim->picture)}}" width="80px">
                        @endif
                        <input type="file" class="form-control {{$errors->first('picture') ? "is-invalid" : ""}}" 
                            name="picture">
                        <div class="invalid-feedback">
                            {{$errors->first('picture')}}
                        </div>
                    </div>
                    <div class="form-group">

                      <label>Kategori Artikel</label>
                      <select name="id_category" class="form-control">
                            <option></option>
                            @foreach ($item as $items)
                                @if( $items->id == $yangdikirim->id_category){
                                    <option value={{$items->id}} selected >{{$items->nama_category}}</option>
                                }@else{
                                    <option value={{$items->id}}>{{$items->nama_category}}</option>
                                }@endif
                            @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label>Isi Artikel</label>
                        <textarea name="body" id="editor1" class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                              {{$yangdikirim->body}}
                      </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Artikel</button>
                        <a href="#" class="btn btn-danger">Kembali</a>
                    </div>

                </form>
            </div>
        </div>  
  </div>
  <!-- /.box -->
  @endsection
  @push('datatables')
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      //CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
  @endpush