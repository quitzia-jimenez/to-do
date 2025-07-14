@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('tasks.update', $task) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="description" class="form-control">{{ $task->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Fecha límite</label>
                    <input type="date" name="deadline" class="form-control" value="{{ $task->deadline }}">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="complete" class="form-check-input" value="1" {{ $task->complete ? 'checked' : '' }}>
                    <label class="form-check-label">¿Completada?</label>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

@endsection