<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">


<div class="container">
    <div class="row">
        <form action="{{ url('productos/store') }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="col-md-2">
                    <label for="selectTipo">Tipo</label>
                    <select class="form-control" id="selectTipo" name="tipo">
                        <option value='Harinas'>Harinas</option>
                        <option value='Verduras'>Verduras</option>
                        <option value='Carnes'>Carnes</option>
                        <option value='Legumbres'>Legumbres</option>
                        <option value='Hortalizas'>Hortalizas</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                </div>
                <div class="col-md-2">
                    <label for="cantidad">Cantidad</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad">
                </div>
                <div class="col-md-2"><br>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
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
                        <a class="btn btn-secondary" onclick="update('{{ $producto->id_productos}}')">Editar</a>
                        <a href="productos/delete/{{$producto->id_productos}}" class="btn btn-secondary">Eliminar</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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
                            <input type="text" class="form-control" id="nombre_update" name="nombre">
                        </div>
                        <div class="col-md-6">
                            <label for="selectTipo_update">Tipo</label>
                            <select class="form-control" id="selectTipo_update" name="tipo">
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
                            <textarea class="form-control" id="descripcion_update" name="descripcion"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="cantidad_update">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad_update" name="cantidad">
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