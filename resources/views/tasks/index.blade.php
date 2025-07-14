@extends ('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
              <h5 class="card-title">Mis proximas Tareas</h5>
              @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
              @endif
               <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">+ Nueva tarea</a>
              <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                        <th scope="col" class="ps-0">Tarea</th>
                        <th scope="col" class="text-center">Fecha limite</th>
                        <th scope="col" class="text-center">Estatus</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    @forelse ($tasks as $task)
                        
                    
                    <tr>
                      <td>{{ $task->title }}</td>
                      <td>{{ $task->deadline ?? 'Sin fecha' }}</td>
                      <td>
                          @if($task->complete)
                              <span class="badge bg-success">Completada</span>
                          @else
                              <span class="badge bg-warning text-dark">Pendiente</span>
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('tasks.show', $task) }}" class="btn btn-sm btn-info">Ver</a>
                          <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">Editar</a>
                          <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                              @csrf @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta tarea?')">Eliminar</button>
                          </form>
                        </td>
                       </tr>
                      @empty
                      <tr><td colspan="4" class="text-center">No hay tareas registradas.</td></tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
            </div>
    </div>
</div>

@endsection