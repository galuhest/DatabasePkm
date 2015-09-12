
@extends('template')

@section('title','Control Panel')

@section('navbar')
@parent
@endsection

@section('content')
 <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Control Panel
                    <small>What you've done</small>
                </h1>
              </div>
        </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Your PKM</h2>
            </div>

            @foreach($pkm_uploaded_by_user as $pkm)
            <div class="col-lg-4 col-sm-6 text-center margin-auto">
                <img class="img-circle img-responsive img-center" src="http://placehold.it/200x200" alt="">
                <h3>{{$pkm->category}}
                    <small>{{$pkm->id}}</small>
                </h3>
                <p>{{$pkm->title}}</p>
                <a class="btn btn-primary" href="/pkm/view/{{$pkm->id}}">View <span class="glyphicon glyphicon-chevron-right"></span></a>
                <a class="btn btn-warning" href="/pkm/edit/{{$pkm->id}}">Edit <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
                @endforeach
            </div>
{!! $pkm_uploaded_by_user->render() !!}
@endsection

@section('footer')
    @parent
@endsection