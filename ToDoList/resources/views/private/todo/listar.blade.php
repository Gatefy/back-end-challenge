@extends('private')
@section('content')
    {{-- <h1 class="h3 mb-4 text-gray-800">Tasks</h1> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="form-group row p-0 my-0">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <h6 class="m-0 font-weight-bold text-primary">Tasks</h6>
                </div>
                <div class="col-sm-6">
                    <a class="nav-link p-0 float-sm-right" href="#" data-toggle="modal" data-target="#addTaskModal">
                        <i class="fas fa-plus-square"></i>
                        <span>New</span>
                    </a>
                </div>
            </div>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="todo-table"></table>
            </div>
        </div>
    </div>
@stop

@section('extras_scripts')
    @include('private.modais.add-task')
    @include('form-message')

    <script type="application/javascript">let access_token = "{{$access_token}}";</script>
    <script src="/js/todo.js"></script>
@stop
