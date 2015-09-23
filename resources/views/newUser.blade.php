@extends('template')

@section('title','New User')
@parent
@endsection

@section('content')
    <h3>Data Pribadi</h3>
    <p>Harap masukkan nomor telpon yang dapat dihubungi</p>
    <form action="{{url('auth/newUser')}}" method="post">
        <div class="form-group">
    Phone Number :<br>

        <input type="text" name="phone" class="form-control">
        @if ($errors->has('phone')) <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {{ $errors->first('phone') }}
        </div>
        @endif

        </div>
        <div class="form-group">
            <label>Fakultas :</label><br>
            <select name="faculty">
               @foreach($faculties as $faculty)
                    <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
          </select>
         @if ($errors->has('phone')) <div class="alert alert-danger" role="alert">
              <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
             <span class="sr-only">Error:</span>
               {{ $errors->first('phone') }}
          </div>
        @endif
        </div>
    <input type="submit" value="submit" name="submit">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>

@endsection

@section('footer')
    @parent
@endsection