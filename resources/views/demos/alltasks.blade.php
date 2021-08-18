@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1>Manage Tasks</h1>
    <task-draggable :tasks-completed="{{ $tasksCompleted }}" :tasks-not-completed="{{ $tasksNotCompleted }}"></task-draggable>
    {{-- <button class="btn btn-default" onclick="window.location.reload()"><b>REFRESH</b></button> --}}
</div>

@endsection
