
@extends('template')

@section('title','Upload PKM')

@section('navbar')
    @parent
@endsection

@section('content')
        <div class="starter-template">
            <h3> Form Pengisian </h3>

        </div>
    <form action="{{url('pkm/add')}}" method="post" enctype="multipart/form-data">
        
  <div class="form-group">
      
      <label>Judul PKM</label>  
    <input type="title" class="form-control" id="exampleInputTitle" placeholder="Judul" name="title" value="{{Input::old('title')}}">
      @if ($errors->has('title')) <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          {{ $errors->first('title') }}
      </div>
      @endif
  </div>
  <div class="form-group">
    <label>Nama Ketua Kelompok</label>
    <input type="leader" class="form-control" id="exampleInputLeader" placeholder="Nama Ketua" name="leader" value="{{Input::old('leader')}}">
      @if ($errors->has('leader'))
          <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span>
          {{ $errors->first('leader') }}
      </div>
      @endif
  </div>
   <div class="form-group">
    <label>Tahun</label>
    <input type="year" class="form-control" id="exampleInputYear" placeholder="Tahun" name="year" value="{{Input::old('year')}}">
       @if ($errors->has('year'))
           <div class="alert alert-danger" role="alert">
               <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
               <span class="sr-only">Error:</span>
               {{ $errors->first('year') }}
           </div>
       @endif
  </div>
       
        <label>Jenis PKM </label>
        <br>
        <select name="category" value="{{Input::old('category')}}">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        @if ($errors->has('category'))
            <div class="alert alert-danger" role="alert">
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
            <input type="radio" name="status" value="{{$i}}" name="status" value="{{Input::old('status')}}">{{$status[$i]}}
            <br>
        @endfor
        @if ($errors->has('status'))
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $errors->first('status') }}
            </div>
        @endif
</div> 
           
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile" name="file" value="{{Input::old('file')}}">
    <p class="help-block">Contoh: judulpkm.pdf</p>
      <p class="help-block"> Harus dalam format .pdf</p>
  </div>

           
  <button type="submit" class="btn btn-default" value="submit" name="submit">Submit</button>
        <input type="hidden" value="{{csrf_token()}}" name="_token">
        <br>
        @if ($errors->has('file'))
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $errors->first('file') }}
            </div>
        @endif
        {!! csrf_field() !!}
         </form>
        @endsection

        @section('footer')
            @parent
            @endsection