@extends('base')
@section('private')
    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('private.sidebar')

    <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content" class="pt-3">

            {{-- @include('topbar')--}}

            <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include('private.footer')


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('private.modais.logout')
    <script type="application/javascript">let access_token = "{{$access_token}}";</script>
    <script type="text/html" id="csrf"> {{csrf_field()}} </script>
@stop
