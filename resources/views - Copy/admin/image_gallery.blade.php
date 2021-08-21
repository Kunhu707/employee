@extends('layouts.admin_header')

@section('content')
<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase font-medium font-14">Basic Table</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Gallery -->
            <!-- <div class="row">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    
                    @foreach($image as $images)
                    <img
                    src="{{ url('/images/'.$images->title) }}"
                    class="w-100 shadow-1-strong rounded mb-4" alt=""
                    />
                    @endforeach
                </div>
            </div> -->
            <!-- Modal gallery -->
            <section class="">
            <!-- Section: Images -->
            <section class="">
                <div class="row">
                @foreach($image as $images)
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                    <div
                    class="bg-image hover-overlay ripple shadow-1-strong rounded"
                    data-ripple-color="light"
                    >
                    <button class="close" type="button" data-id="{{ $images->id }}" >×</button>
                    <img
                    src="{{ url('/images/'.$images->title) }}"
                    class="w-100" 
                    />
                   
                    </div>
                </div>
                 @endforeach
                </div>
            </section>
            <!-- Section: Images -->
            <!-- Gallery -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center"> 2020 © Ample Admin brought to you by <a
                    href="https://www.wrappixel.com/">wrappixel.com</a>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <script>
        var IMAGE_DLT = "{{ route('images') }}"
    </script>
@endsection