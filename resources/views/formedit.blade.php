
@extends('template')

@section('title','Edit PKM')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="starter-template">
        <h3> Form Pengisian </h3>

    </div>

        <form action="{{url('pkm/edit/'.$pkm->id)}}" method="post" enctype="multipart/form-data">

            <div class="form-group">

                <label>Judul PKM</label>
                <input type="title" class="form-control" id="exampleInputTitle" placeholder="Judul" name="title" value="{{$pkm->title}}">
                @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->first('title') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Nama Ketua Kelompok</label>
                <input type="leader" class="form-control" id="exampleInputLeader" placeholder="Nama Ketua" name="leader" value="{{$pkm->leader}}">
                @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->first('leader') }}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label>Tahun</label>
                <input type="year" class="form-control" id="exampleInputYear" placeholder="Tahun" name="year" value="{{$pkm->year}}">
                @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->first('year') }}
                </div>
                @endif
            </div>

            <label>Jenis PKM </label>
            <br>
            <select name="category">
                @foreach($categories as $category)
                    <option @if($pkm->category == $category->id) {{'selected'}}@endif value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $errors->first('category') }}
            </div>
            @endif
            <br>
            <div >
                <label>
                    Status PKM
                </label>
                <br>
                @for($i = 0; $i<4;$i++)
                    <input @if($pkm->status == $i) checked="checked" @endif type="radio" name="status" value="{{$i}}" name="status">{{$status[$i]}}
                <br>
                 @endfor
                @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->first('status') }}
                </div>
                @endif
            </div>

            <div class="form-group">
                <label>Deskripsi singkat :</label><br>
            <textarea cols="100" rows="5" name="description" form="new_pkm">
            </textarea>
                @if ($errors->has('description'))
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile" value="{{asset('upload/pkm').''.$pkm->id.'.pdf'}}" name="file">
                <p class="help-block">Contoh: judulpkm.pdf</p>
            </div>
            <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
            @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $errors->first('file') }}
            </div>
            @endif
            <input type="hidden" value="{{csrf_token()}}" name="_token">
            <br>

        </form>
        @endsection

        @section('footer')
            @parent
        @endsection