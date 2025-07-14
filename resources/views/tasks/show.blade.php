@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="container mt-4">
                <h1>{{ $task->title }}</h1>

                <p><strong>Descripción:</strong><br> {{ $task->description ?? 'Sin descripción' }}</p>
                <p><strong>Fecha límite:</strong> {{ $task->deadline ?? 'No establecida' }}</p>
                <p><strong>Estado:</strong>
                    @if($task->complete)
                        <span class="badge bg-success">Completada</span>
                    @else
                        <span class="badge bg-warning text-dark">Pendiente</span>
                    @endif
                </p>

                <a href="{{ route('tasks.index') }}" class="btn btn-secondary">← Volver</a>
            </div>
        </div>
    </div>
</div>

@endsection