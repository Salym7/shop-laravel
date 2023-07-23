@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add product</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Main</a></li>
                    <li class="breadcrumb-item"><a href="{{route('product.index')}}">Product</a></li>
                    <li class="breadcrumb-item active">Add Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <form action="{{route('product.store')}}" method='post' enctype="multipart/form-data">
                @csrf
                @foreach ($errors->all() as $message)
                <p>{{$message}}</p>
                @endforeach
                <div class="form-group">
                    <input type="text" name='title' class="form-control" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"
                        placeholder="description"></textarea>
                </div>
                <div class="form-group">
                    <input type="text" name='content' class="form-control" placeholder="content">
                </div>
                <div class="form-group">
                    <input type="number" name='price' class="form-control" placeholder="price">
                </div>
                <div class="form-group">
                    <input type="number" name='count' class="form-control" placeholder="count">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Select category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag"
                        style="width: 100%;">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a color"
                        style="width: 100%;">
                        @foreach ($colors as $color)
                        <option value="{{$color->id}}">{{$color->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection