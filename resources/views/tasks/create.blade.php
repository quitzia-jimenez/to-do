@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="container mt-4">
            <h1>Crear nueva tarea</h1>

            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Título</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea name="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label">Fecha límite</label>
                    <input type="date" name="deadline" class="form-control">
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" name="complete" class="form-check-input" value="1">
                    <label class="form-check-label">¿Completada?</label>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>
@endsection