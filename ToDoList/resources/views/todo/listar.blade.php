@extends('private')
@section('content')
{{--    <h1 class="h3 mb-4 text-gray-800">Tarefas</h1>--}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tarefas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                {{-- Tabela AQUI --}}

{{--                {{route('login')}}--}}

            </div>
        </div>
    </div>
@stop

@section('extras_scripts')
    <script src="/js/todo.js"></script>
@stop
