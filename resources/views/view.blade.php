@extends('template')

@section('title','Browse')

@section('navbar')
@parent
@endsection

@section('content')
    <!-- Page Content -->

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8">
                <h1 class="page-header">{{$category}}
                </h1>
            </div>
            <div class="col-lg-4 view-right">
                <form action="/pkm/view=sort">

                    <select name="sorter" value="{{Input::old('sorter')}}">
                        <option value="title">Judul  </option>
                        <option value="leader">Ketua  </option>
                        <option value="year">Tahun  </option>
                    </select>
                    <select name="point" value="{{Input::old('point')}}">
                        <option value="asc">Ascending </option>
                        <option value="desc">Descending</option>
                    </select>
                    <input type="hidden" value="{{$category}}" name="category">
                    <input type="hidden" value="{{$id}}" name="id">
                    @if($id == -1)
                            <input type="hidden" value="{{$input}}" name="query">
                    @endif
                    <button type="submit" class="btn btn-primary" value="submit" name="submit">Sort <span class="glyphicon glyphicon-sort-by-alphabet"></span> </button>
                </form>
            </div>
        </div>
        <!-- /.row -->
        <!-- Each Project-->
        @foreach($results as $result)
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="{{asset('img/'.$result->category)}}.png" alt="icon" width="300" height="250">
                </a>
            </div>
            <div class="col-md-5">
                <h3>{{$result->title}}</h3>
                <p>Ketua : {{$result->leader}}</p>
                <h6>Deskripsi :</h6>
                <p>{{$result->definition}}</p>
                <a class="btn btn-primary" href="/pkm/view/{{$result->id}}">View PKM <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
        <!-- /.row -->
            <hr>

        @endforeach
        <hr>
        <!-- Pagination -->
       {!! $results->render() !!}
        <!-- /.row -->
        <!-- Footer -->
        @endsection

        @section('footer')
            @parent
        @endsection
