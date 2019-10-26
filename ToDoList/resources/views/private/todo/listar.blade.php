@extends('private')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h1 class="h3 m-0 font-weight-bold text-primary">Tasks</h1>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div id="todo-table-info"></div>
                <div class="form-group row p-0 my-0">
                    <div class="col-sm-9 mb-3 mb-sm-0">

                        <div class="float-sm-left pr-2 mb-2 mb-sm-0">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        id="dropdownAction" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" value="filter">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownAction">
                                    <button class="dropdown-item" type="button" value="filter">Filter</button>
                                    <button class="dropdown-item" type="button" value="delete">Delete</button>
                                </div>
                            </div>
                        </div>

                        <div class="float-sm-left pr-2 mb-2 mb-sm-0">
                            <div class="dropdown">
                                <button class="btn btn-outline-primary dropdown-toggle" type="button"
                                        id="dropdownFilter" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" value="">
                                    Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownFilter">
                                    <button class="dropdown-item" type="button" value="todo">To Do</button>
                                    <button class="dropdown-item" type="button" value="done">Done</button>
                                    <button class="dropdown-item" type="button" value="">All</button>
                                </div>
                            </div>
                        </div>

                        <div class="float-sm-left mb-2 mb-sm-0">
                            <button class="btn btn-primary" onclick="return window.todo.filterOrDelete();">
                                <i class="fas fa-terminal"></i> Do
                            </button>
                        </div>

                    </div>
                    <div class="col-sm-3 mb-3 mb-sm-0 pl-sm-0">
                        <div class="float-sm-right">
                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#addTaskModal">
                                <i class="fas fa-plus-square"></i> New
                            </a>
                        </div>
                    </div>
                </div>


            </li>
            <li class="list-group-item">
                <div class="table-responsive">
                    <table class="table" id="todo-table"></table>
                </div>
            </li>
        </ul>

    </div>
@stop

@section('extras_scripts')
    @include('private.modais.add-task')
    @include('form-message')

    <script src="/js/todo.js"></script>
@stop
