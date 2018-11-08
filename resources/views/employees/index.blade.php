<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.min.js')}}"></script>
    <title>Nimekiri</title>
</head>
<style>
    #deletePrompt {
        position: absolute;
        display: none;
        text-align: center;
        top: calc(100vh / 2 - 50px);
        left: calc(100vw / 2 - 125px);
        background-color: rgba(100, 0, 0, 0.25);
        border: 2px solid black;
        border-radius: 10px;
        padding: 25px;
        margin: 0;
    }

    .promptButton {
        margin: 10px 0 0 0 !important;
    }
</style>
<body>
    <div id="deletePrompt">
        <form action="{{route('employees.destroy', '-id-')}}" method="POST">
            <span></span><br/>
            @method('DELETE')
            {{ csrf_field() }}
            <a href="javascript:deletePrompt()" class="btn btn-success promptButton">Loobu</a>
            <input type="submit" class="btn btn-danger promptButton" value="Kustuta"/>
        </form>
    </div>
    <div class="container">
        <div class="panel">
            <a href="{{ route('employees.create') }}"class="btn btn-success">Lisa uus</a>
            <table id="nimekiri" class="display">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Isikukood</th>
                        <th>Sünniaasta & kuupäev</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->nimi}}</td>
                            <td>{{$employee->isikukood}}</td>
                            <td>{{$employee->sunnipaev}}</td>
                            <td>
                                <a href="{{route('employees.show', $employee->id)}}" class="btn btn-success">Vaata</a>
                                <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-info">Muuda</a>
                                <a href='javascript:deletePrompt({{$employee->id}}, "{{$employee->nimi}}")' class="btn btn-danger">Kustuta</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
    var promptVisible = false;
    $(document).ready( function () {
        $('#nimekiri').DataTable();
    } );

    function deletePrompt(id, nimi) {
        if(!promptVisible) {
            $('#deletePrompt').find('form').attr("action", $('#deletePrompt').find('form').attr("action").replace('-id-', id));
            $('#deletePrompt').find('span').html("Töölise \"" + nimi + "\", kustutamine.");
            $('#deletePrompt').fadeIn(200);
            promptVisible = true;
        } else {
            $('#deletePrompt').fadeOut(100);
            promptVisible = false;
        }
    }
    </script>
</body>
</html>