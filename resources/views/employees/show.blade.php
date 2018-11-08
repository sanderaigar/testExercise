<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Töötaja: {{$employee->nimi}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

</head>
<body>
    <div class="container">
        <div class="panel text-center">
            <span class="badge">Nimi</span><br/>
            {{$employee->nimi}}<br/><br/>
            <span class="badge">Isikukood</span><br/>
            {{$employee->isikukood}}<br/><br/>
            <span class="badge">Sünnipäev</span><br/>
            {{str_replace('-', '/',$employee->sunnipaev)}}<br/><br/>
            
            <a href="{{url('/employees')}}" class="btn btn-success">Tagasi</a>
        </div>
    </div>
</body>
</html>