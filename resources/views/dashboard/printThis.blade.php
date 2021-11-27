{{-- كود شاشة طباعة العريضه --}}
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
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1"> مرحبا بك يا,{{ ' ' . auth()->user()->name }}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="card-body">

            @if (isset($petition) && $petition->count() != 0)

                <button class="btn btn-primary btn_print1" href="" style="margin-bottom: 20px"><i
                        class="fa fa-print "></i>طبع</button>

                <div class="table-responsive print1" dir="rtl">
                    
                    <table class="table table-striped mg-b-0 text-md-nowrap ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>إسم القاضي</th>
                                <th>إسم المحامي</th>
                                <th>رقم المحامي</th>
                                <th>إسم مقدم العريضه</th>
                                <th>نوع العريضه</th>
                                <th>موضوع الطعن</th>
                                <th>تحديد الحكم</th>
                                <th>إسم المراجع</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $petition['id'] }}</th>
                                <td>{{ $petition['name'] }}</td>
                                <td>{{ $petition['lawyer_name'] }}</td>
                                <td>{{ $petition['lawyer_phone'] }}</td>
                                <td>{{ $petition['petition_name'] }}</td>
                                <td>{{ $petition->proseType() }}</td>
                                <td>{{ $petition['type_judgment'] }}</td>
                                <td>{{ $petition['subject_appeal'] }}</td>
                                <td>{{-- $petition->Department['name'] --}}.....</td>
                                </td>

                            </tr>
                        </tbody>
                    </table>

                    <h5>المبلغ المدفوع</h5>
                    <p><td>  {{ $petition['payment'] }} جنيه </p>
                        <h5>التاريخ</h5>
                        <p>{{ $petition['created_at'] }}</p>

                    <div class="content-center" style="margin-top: 20px">
                        {{-- {{ $blogs->appends(request()->query())->links() }} --}}
                    </div>

                </div><!-- bd -->

            @else
                لا يوجد بيانات حاليا
            @endif
        </div><!-- bd -->
    </div>
    <!-- row close -->

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
                header: "<h5>عريضه رقم {{ $petition->id }}</h5>",
            });
        });
    </script>
@endsection
