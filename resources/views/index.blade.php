
@extends('template')

@section('title','Home')

@section('navbar')
    @parent
@endsection

@section('content')
    <!-- Page Content -->
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-8">
                <h1 class="page-header">Database PKM UI
                </h1>
            </div>
            <div class="col-lg-4">
                @if($userDb->role == 1 || $userDb->role == 2)
                    <a class="btn btn-primary" href="user/control_panel/{{$userDb->id}}">Control Panel <span class="glyphicon glyphicon-chevron-right"></span></a>
                @endif
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="col-md-6">
        
        <div class="col-md-3" style="text-align: left;">
        
         <img src="img/1.png" class="img-rounded" width="100;">
    </div>
  
        <div class="col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-P</h4>
                <table class="table table-default table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm1);$i++)
                    <tr>
                        <th><a href="/pkm/view/{{$pkm1[$i]->id}}">{{$pkm1[$i]->title}}</a></th>
                    </tr>
                    @endfor
                    <tr> <th> <a href="pkm/view/category/1">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>
        
    </div>

    <div class="col-md-6">
        
        <div class="col-md-3" style="text-align: left;">

         <img src="img/2.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-T</h4>
                <table class="table table-default  table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm2);$i++)
                        <tr>
                            <th><a href="/pkm/view/{{$pkm2[$i]->id}}">{{$pkm2[$i]->title}}</a></th>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/2">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>

    </div>
        </div>
        <hr>
        <div class="row">
    <div class="col-md-6">

        <div class="col-md-3" style="text-align: left;">

         <img src="img/3.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-K</h4>
                <table class="table table-default table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm3);$i++)
                        <tr>
                            <td><a href="/pkm/view/{{$pkm3[$i]->id}}">{{$pkm3[$i]->title}}</a></td>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/3">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>

    </div>

   <div class="col-md-6">

        <div class="col-md-3" style="text-align: left;">

         <img src="img/4.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: center;">
           <h4>PKM-M</h4>
                <table class="table table-default table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm4);$i++)
                        <tr>
                            <th><a href="/pkm/view/{{$pkm4[$i]->id}}">{{$pkm4[$i]->title}}</a></th>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/4">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>

    </div>
        </div>
        <hr>
    <div class="row">
    <div class="col-md-6">

        <div class="col-md-3" style="text-align: left;">

         <img src="img/5.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-KC</h4>
                <table class="table table-default table-bordered table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm5);$i++)
                        <tr>
                            <th><a href="/pkm/view/{{$pkm5[$i]->id}}">{{$pkm5[$i]->title}}</a></th>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/5">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>

    </div>

    <div class="col-md-6">

        <div class="col-md-3" style="text-align: left;">

         <img src="img/6.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-AI</h4>
                <table class="table table-default table-bordered table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm6);$i++)
                        <tr>
                            <th><a href="/pkm/view/{{$pkm6[$i]->id}}">{{$pkm6[$i]->title}}</a></th>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/6">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>

    </div>
    </div>
    <hr>
        <div class="row">
   <div class="col-md-6">

        <div class="col-md-3" style="text-align: left;">

         <img src="img/7.png" class="img-rounded" width="100;">
    </div>

        <div class=" col-md-9 table-responsive pkm" style="text-align: left;">
           <h4>PKM-GT</h4>
                <table class="table table-default table-bordered table-hover" style="background-color: white;">
                    @for($i=0;$i<count($pkm7);$i++)
                        <tr>
                            <th><a href="/pkm/view/{{$pkm7[$i]->id}}">{{$pkm7[$i]->title}}</a></th>
                        </tr>
                    @endfor
                        <tr> <th> <a href="pkm/view/category/7">See more <span class="glyphicon glyphicon-chevron-right"></span> </a></th></tr>
                </table>
        </div>
   </div>
    </div>
        <!-- /.row -->

        <!-- Footer -->
        @endsection

        @section('footer')
            @parent
        @endsection