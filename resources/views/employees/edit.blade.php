<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>Halda töölist</title>
</head>
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none; 
        margin: 0; 
    }
</style>
<body>
    <div class="container">
        <div class="panel text-center">
            <form action="{{route('employees.update', $employee->id)}}" method="POST">
                @method('PUT')
                <div class="form-group">
                    <label class="label label-success">Nimi<span class="required">*</span></label><br/>
                    <input type="text" name="nimi" placeholder="Nimi" value="{{$employee->nimi}}" required/>
                </div>
                <div class="form-group">
                    <label class="label label-success">Isikukood<span class="required">*</span></label><br/>
                    <input type="number" name="isikukood" placeholder="Isikukood" value="{{$employee->isikukood}}" required/>
                </div>
                <div class="form-group">
                    <label class="label label-success">Sünnipäev<span class="required">*</span></label><br/>
                    <input type="date" name="sunnipaev" value="{{$employee->sunnipaev}}" required/>
                </div>
                <div class="form-group">
                    <a href="{{route('employees.index')}}" class="btn btn-success">Tagasi</a>
                    <input type="submit" class="btn btn-info" name="E_Submit" value="Muuda"/>
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>
</html>