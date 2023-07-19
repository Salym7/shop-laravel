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
                    <li class="breadcrumb-item"><a href="{{route('color.index')}}">Colors</a></li>
                    <li class="breadcrumb-item active">Color</li>
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
                <div class="card w-50">
                    <div class="card-header d-flex p-3">
                        <div class="mr-3"><a class="btn btn-primary" href="{{route('color.edit' , $color->id)}}">Edit
                                color</a></div>
                        <form action="{{route('color.delete', $color->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>Title</td>
                                    <th>Color</th>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{$color->id}}</td>
                                    <td>{{$color->title}}</td>
                                    </td>
                                    <td>
                                        <div style="width: 16px; height:16px; background:{{'#' . $color->title}}"></div>
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