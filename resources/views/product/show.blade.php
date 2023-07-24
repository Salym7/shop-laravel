@extends('layouts.main')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Show</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('main.index')}}">Main</a></li>
                    <li class="breadcrumb-item"><a href="{{route('tag.index')}}">Products</a></li>
                    <li class="breadcrumb-item active">Product</li>
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

            <div class="col-12">
                <div class="card w-100">
                    <div class="card-header d-flex p-3">
                        <div class="mr-3"><a class="btn btn-primary"
                                href="{{route('product.edit' , $product->id)}}">Edit
                                tag</a></div>
                        <form action="{{route('product.delete', $product->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <div>
                            <img class="w-25" src="{{Storage::url($product->preview_image)}}" alt="">
                        </div>
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    </td>
                                    <td>description</td>
                                    </td>
                                    <td>content</td>
                                    </td>
                                    <td>price</td>
                                    </td>
                                    <td>count</td>
                                    </td>
                                    <td>category</td>
                                    </td>
                                    <td>tags</td>
                                    </td>
                                    <td>colors</td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->content}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->count}}</td>
                                    <td>{{$product->category->title}}</td>
                                    <td>@foreach ($product->tags as $tag)
                                        {{$tag->title . ', '}}
                                        @endforeach</td>
                                    <td class="d-flex"> @foreach ($product->colors as $color)
                                        <div style="width: 16px; height:16px; background:{{'#' . $color->title}}"></div>
                                        @endforeach
                                    </td>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection