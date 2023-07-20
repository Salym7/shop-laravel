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
                    <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                    <li class="breadcrumb-item active">User</li>
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
                        <div class="mr-3"><a class="btn btn-primary" href="{{route('user.edit' , $user->id)}}">Edit
                                category</a></div>
                        <form action="{{route('user.delete', $user->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="delete">
                        </form>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>surname</th>
                                    <th>patronymic</th>
                                    <th>email</th>
                                    <th>age</th>
                                    <th>gender</th>
                                    <th>address</th>
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td><a href="{{route('user.show', $user->id)}}">{{$user->name}}
                                        </a>
                                    </td>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->patronymic}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->age}}</td>
                                    <td>{{$user->genderTitle}}</td>
                                    <td>{{$user->address}}</td>
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