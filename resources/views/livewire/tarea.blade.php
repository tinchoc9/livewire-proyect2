<div >
   <form class="mb-3" wire:submit.prevent="save">
    <div >
        <label class="form-label" >Ingrese Nombre de la Tarea</label>
        <input type="text" class="form-control" wire:model="tarea.nombre"required placeholder="Nombre....">
    @error("tarea.nombre")<div>{{ $message}}</div>@enderror
</div>
      <div >
        <label class="form-label">Descripcion de la Tarea</label>
        <input type="text" class="form-control" wire:model="tarea.descripcion" required placeholder="Descripcion....">
        @error("tarea.descripcion")<div>{{ $message}}</div>@enderror
    </div>
 <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@if (session()->has('mensaje'))
    <h3>{{session('mensaje')}}</h3>
@endif
<div>

    <table class="table sm-9">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Tarea</th>
                <th scope="col">Descripcion</th>

            </tr>
        </thead>
        <tbody>

            @foreach ($tareas as $tarea)
                <tr>

                    <th scope="row">{{ $tarea->id }}</th>
                    <td>{{ $tarea->nombre }}</td>
                    <td>{{ $tarea->descripcion }}</td>
                    <td><button wire:click="borrar({{$tarea->id}})" type="button" class="btn btn-danger">Borrar
                            Tarea</button></td>
                    <td><button wire:click="editar({{$tarea->id}})" type="button" class="btn btn-primary">Editar Tarea</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
