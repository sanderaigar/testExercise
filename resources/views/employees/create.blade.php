<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <title>Lisa tööline</title>
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
        <div class="text-center">
                @foreach($errors->all() as $error)
                <div>
                   {{$error}}
                </div>
           @endforeach
        </div>
        <div class="panel text-center">
            <form action="{{action('EmployeesController@store')}}" method="POST">
                <div class="form-group">
                    <label>Nimi<span class="required">*</span></label><br/>
                    <input type="text" name="nimi" placeholder="Nimi" required/>
                </div>
                <div class="form-group">
                    <label>Isikukood<span class="required">*</span></label><br/>
                    <input type="number" name="isikukood" placeholder="Isikukood" required/>
                </div>
                <div class="form-group">
                    <label>Sünnipäev<span class="required">*</span></label><br/>
                    <input type="date" name="sunnipaev" placeholder="Sünnipäev" required/>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" name="C_Submit" value="Lisa"/>
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
</body>
</html>