@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add tag</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Main</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Tag</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
            <form action="{{route('product.update', $product->id)}}" method='post' enctype="multipart/form-data">
                @csrf
                @method('patch')
                @foreach ($errors->all() as $message)
                <p>{{$message}}</p>
                @endforeach
                <div class="form-group">
                    <input value="{{$product->title ?? old('title')}}" type=" text" name='title' class="form-control"
                        placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea name="description" class="form-control" id="" cols="30" rows="10"
                        placeholder="description">{{$product->description ?? old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <input value="{{$product->content ?? old('content')}}" type="text" name='content'
                        class="form-control" placeholder="content">
                </div>
                <div class="form-group">
                    <input value="{{$product->price ?? old('price')}}" type="number" name='price' class="form-control"
                        placeholder="price">
                </div>
                <div class="form-group">
                    <input value="{{$product->count ?? old('count')}}" type="number" name='count' class="form-control"
                        placeholder="count">
                </div>
                <div class="form-group">
                    <div class=" mb-3"><img class="w-25" src="{{Storage::url($product->preview_image)}}"
                            alt="preview_image"></div>
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
                        <option value="{{$category->id}}" {{$product->category_id == $category->id ? ' selected' :
                            ''}}>{{$category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag"
                        style="width: 100%;">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" {{is_array($product->tags->pluck('id')->toArray()) &&
                            in_array($tag->id,$product->tags->pluck('id')->toArray()) ? ' selected' :
                            ''}}>{{$tag->title}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a color"
                        style="width: 100%;">
                        @foreach ($colors as $color)
                        <option value="{{$color->id}}" {{is_array($product->colors->pluck('id')->toArray()) &&
                            in_array($color->id,$product->colors->pluck('id')->toArray()) ? ' selected' :
                            ''}}>{{$color->title}}<span
                                style="display:inline-block; width: 16px; height:16px; background:{{'#' . $color->title}}"></span>
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection