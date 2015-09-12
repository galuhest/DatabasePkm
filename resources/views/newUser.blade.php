@extends('template')

@section('title','New User')
@parent
@endsection

@section('content')
    <p>Harap masukkan nomor telpon yang dapat dihubungi</p>
    <form action="{{url('auth/newUser')}}" method="post">
    Phone Number :<br>
    <input type="text" name="phone" class="form-control">
        @if ($errors->has('phone')) <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            <span class="sr-only">Error:</span>
            {{ $errors->first('phone') }}
        </div>
        @endif
    <input type="submit" value="submit" name="submit">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>

@endsection

@section('footer')
    @parent
@endsection