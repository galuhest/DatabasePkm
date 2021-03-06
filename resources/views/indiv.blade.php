@extends('template')

@section('title','View')

@section('navbar')
@parent
@endsection

@section('content')
        <!-- Page Content -->
        <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{$category->name}}
                    <small> #ID{{$pkm->id}}</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <img class="img-responsive" src="{{asset('img/'.$category->id)}}.png" alt="icon" width="350" height="250">
            </div>

            <div class="col-md-4">
                <h3>{{$pkm->title}}</h3>
                <h3>PKM Details</h3>
                <ul>
                    <li>Ketua       : {{$pkm->leader}}</li>
                    <li>Tahun       : {{$pkm->year}}</li>
                    <li>Status      : {{$pkm->status}}</li>
                    <li>Download File <br></li>
                </ul>
                <h3>Deskripsi :</h3>
                <p>{{$pkm->description}}</p>
                <a class="btn btn-default btn-pad" href="{{asset('upload/pkm').''.$pkm->id.'.pdf'}}">Download <span class=" glyphicon glyphicon-download-alt"></span></a>

            @if($userDb->id == $pkm->uploader || $userDb->role == 2)
                    <a class="btn btn-warning btn-pad" href="/pkm/edit/{{$pkm->id}}">Edit<span class="glyphicon glyphicon-pencil"></span></a>
                    <a class="btn btn-danger btn-pad" href="/pkm/delete/{{$pkm->id}}">Delete<span class="glyphicon glyphicon-pencil"></span></a>
            @endif
            </div>
        </div>
        <!-- Footer -->
        @endsection

        @section('footer')
            @parent
        @endsection