@extends('public')
@section('content')
    {{--    <div id="wrapper">--}}
    <!-- Content Wrapper -->
    {{--        <div id="content-wrapper" class="d-flex flex-column">--}}
    <!-- Main Content -->
    {{--            <div id="content">--}}
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- 404 Error Text -->
        <div class="text-center mt-5 mb-5">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5">Página não encontrada</p>
            <p class="text-gray-500 mb-0">Parece que você encontrou uma falha na MATRIX...</p>
            <a href="{{ url('/') }}">&larr; Voltar para a HOME</a>
        </div>

    </div>
    <!-- /.container-fluid -->
    {{--            </div>--}}
    <!-- End of Main Content -->
    {{--        </div>--}}
    <!-- End of Content Wrapper -->
    {{--    </div>--}}
@stop

