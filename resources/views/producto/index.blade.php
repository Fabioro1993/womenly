<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.80.0">
        <title>Fabiana Orozco - CRUD LARAVEL</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/pricing/">
        
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        
        <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }
        html {
            font-size: 14px;
            }
            @media (min-width: 768px) {
            html {
                font-size: 16px;
            }
            }

            .container {
            max-width: 960px;
            }

            .pricing-header {
            max-width: 700px;
            }

            .card-deck .card {
            min-width: 220px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Womenly</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="#">Fabiana Orozco</a>
            </nav>
        </div>

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Productos</h1>
            <p class="lead">Fabiana Orozco - CRUD LARAVEL</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3">Nuevo Producto</h4>
                    <form action="{{ url('productos/store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="col-md-2">
                                <label for="selectTipo">Tipo</label>
                                <select class="custom-select d-block w-100" id="selectTipo" name="tipo">
                                    <option value='Harinas'>Harinas</option>
                                    <option value='Verduras'>Verduras</option>
                                    <option value='Carnes'>Carnes</option>
                                    <option value='Legumbres'>Legumbres</option>
                                    <option value='Hortalizas'>Hortalizas</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                            </div>
                            <div class="col-md-2">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                            </div>
                            <div class="col-md-2"><br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 order-md-1">
                    <h4 class="mb-3 text-center pb-md-4 pt-md-5">Historico de Productos</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Descripcion</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $key => $producto)
                            <tr>
                                <th scope="row">{{$producto->id_productos}}</th>
                                <td>{{$producto->nombre}}</td>
                                <td>{{$producto->tipo}}</td>
                                <td>{{$producto->descripcion}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-info" onclick="update('{{ $producto->id_productos}}')">Editar</a>
                                        <a href="productos/delete/{{$producto->id_productos}}" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('productos/update') }}" method="post" id="update">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre_update">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_update" name="nombre" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="selectTipo_update">Tipo</label>
                                    <select class="custom-select d-block w-100" id="selectTipo_update" name="tipo">
                                        <option value='Harinas'>Harinas</option>
                                        <option value='Verduras'>Verduras</option>
                                        <option value='Carnes'>Carnes</option>
                                        <option value='Legumbres'>Legumbres</option>
                                        <option value='Hortalizas'>Hortalizas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="descripcion_update">Descripcion</label>
                                    <input type="text" class="form-control" id="descripcion_update" name="descripcion" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="cantidad_update">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad_update" name="cantidad" required>
                                </div>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script
        src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
            function update(id_productos){

                var url_form = "{{ url('productos/update') }}"+"/"+id_productos;

                $.ajax({
                    url: "{{ route('productos/edit') }}",
                    method: 'get',
                    data: {
                        id_productos : id_productos,
                    },
                    success: function(data) {
                        console.log(data);
                        $("#update").attr("action",url_form);

                        $("#nombre_update").val(data['nombre']);
                    // $("#selectTipo_update").val(data['tipo']);
                        $("#descripcion_update").val(data['descripcion']);
                        $("#cantidad_update").val(data['cantidad']);
                        $("#selectTipo_update option[value="+data['tipo']+"]").attr('selected', 'selected');

                        // $('select').selectpicker('refresh');

                        $("#exampleModal").modal("show");
                    }
                });
            }
        </script>


    </body>
</html>
