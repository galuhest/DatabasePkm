@extends('template')

@section('title','Growth Chart')

@section('navbar')
    @parent
@endsection

@section('content')
    <div class="col-lg-6">
        <h4>PKM 2012-2013-2014-2015</h4>
    <canvas id="myChart" width="400" height="400" >
    </canvas>
    </div>
    <div class="col-lg-6 margin-auto">
        <h4>Status PKM hingga tahun 2015</h4>
        Tidak didanai : {{$arrstatus[0]}}
        <br>
        Didanai : {{$arrstatus[1]}}
        <br>
        Finalis : {{$arrstatus[2]}}
        <br>
        Juara : {{$arrstatus[3]}}
        <br>
        <h6>Total PKM : {{$arrstatus[0] + $arrstatus[1] + $arrstatus[2] + $arrstatus[3]}} </h6>
    </div>


@endsection

@section('footer')
    @parent

    <script src="{{asset('js/Chart.js/Chart.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var json = '{!!$arrpkm!!}';
        console.log(json);
        json = JSON.parse(json);
        var barData = {
            labels: ['PKM-P','PKM-T','PKM-K','PKM-M','PKM-I','PKM-AI','PKM-GT'],
            datasets: [
                {
                    label: "2012 data",
                    fillColor: "rgba(231, 76, 60,0.5)",
                    strokeColor: "rgba(231, 76, 60,0.8)",
                    highlightFill: "rgba(231, 76, 60,0.75)",
                    highlightStroke: "rgba(231, 76, 60,1)",
                    data: [json[1][1], json[1][2], json[1][3], json[1][4], json[1][5], json[1][6], json[1][7]]
                },
                {
                    label: "2013 data",
                    fillColor: "rgba(44, 62, 80,0.5)",
                    strokeColor: "rgba(44, 62, 80,0.8)",
                    highlightFill: "rgba(44, 62, 80,0.75)",
                    highlightStroke: "rgba(44, 62, 80,1)",
                    data: [json[2][1], json[2][2], json[2][3], json[2][4], json[2][5], json[2][6], json[2][7]]
                },
                {
                    label: "2014 data",
                    fillColor: "rgba(243, 156, 18,0.5)",
                    strokeColor: "rgba(243, 156, 18,0.8)",
                    highlightFill: "rgba(243, 156, 18,0.75)",
                    highlightStroke: "rgba(243, 156, 18,1)",
                    data: [json[3][1], json[3][2], json[3][3], json[3][4], json[3][5], json[3][6], json[3][7]]
                },
                {
                    label: "2015 data",
                    fillColor: "rgba(46, 204, 113,0.5)",
                    strokeColor: "rgba(46, 204, 113,0.8)",
                    highlightFill: "rgba(46, 204, 113,0.75)",
                    highlightStroke: "rgba(46, 204, 113,1)",
                    data: [json[4][1], json[4][2], json[4][3], json[4][4], json[4][5], json[4][6], json[4][7]]
                },
            ]
        };
        var options =   {
            responsive: true,
            barStrokeWidth : 1,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

        };
        var context = document.getElementById('myChart').getContext('2d');
        var clientsChart = new Chart(context).Bar(barData,options);
        clientsChart.generateLegend();
        clientsChart.draw();
    </script>
@endsection