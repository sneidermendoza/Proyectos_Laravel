<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                ->{{$error}} <br>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{route('users.store')}}" method="POST">
                            <div class="form-row " >
                                
                                <div class="col-sm-3">
                                    <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{old('name')}}">
                                </div>

                                <div class="col-sm-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{old('email')}}">
                                </div>

                                <div class="col-sm-4">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                </div>

                                <div class="col-auto">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>&nbsp;</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user -> id}}</td>
                            <td>{{$user -> name}}</td>
                            <td>{{$user -> email}}</td>
                            <td>
                                <form action="{{route('users.destroy', $user)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input 
                                    type="submit"
                                    value="Eliminar"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Esta seguro que desea eliminar...?')">
                            
                            </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>