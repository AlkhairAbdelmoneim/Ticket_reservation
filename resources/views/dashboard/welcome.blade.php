{{-- كود الشاشه الرئيسيه للنظام مع شاشة تعديل معلومات مدير النظام --}}
@extends('layouts.master')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">المستخدم,{{ ' ' . auth()->user()->name }}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    @include('partials._errors')

    <form action="{{ route('change') }}" method="post">
        @csrf
        {{ method_field('post') }}

        <span>تعديل البيانات الشخصيه</span>
        <div class="form-group">
            <label for="exampleInputPassword1">إيميلك</label>
            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
        </div>


        <div class="form-group">
            <label for="exampleInputPassword1">كلمة المرور القديمه</label>
            <input type="password" name="old_password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">كلمة المرور الجديده</label>
            <input type="password" name="new_password" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary ">تعديل</button>
    </form>
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>

    <script>
        $(document).on('click', '.btn_print1', function() {

            $('.print1').printThis({
                header: "<h1>فاتورة منصرفات الشركة</h1>",
            });
        });

        $(document).on('click', '.btn_print2', function() {

            $('.print2').printThis({
                header: "<h1>فاتورة منصرفات الكورس</h1>",
            });
        });
    </script>
@endsection
