{{-- كود شاشة عرض كل العرائض المفتوحه --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العريضه</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
            </div>
        </div>
    </div>

    {{-- <form action="{{ route('petition.index') }}" method="GET">
        @csrf
        <div class="breadcrumb-header justify-content-between">
            <div class="card-body pb-0">
                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="بحث....."
                        value="{{ request()->search }}">
                    <span class="input-group-append">
                        <button class="btn ripple btn-primary" type="submit">@lang('site.search')</button>
                    </span>
                </div>
            </div>
        </div>
    </form> --}}
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <td><a class="btn btn-info" href="{{ route('petition.create') }}"><i
                                    class="fa fa-pulse"></i>إضافه</a></td>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">

                    @if (isset($petition) && $petition->count() != 0)

                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
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
                                        <th>المبلغ المدفوع</th>
                                        <th>التاريخ</th>
                                        <th>اكشن</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($petition as $value)
                                        <tr>
                                            <th scope="row">{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->lawyer_name }}</td>
                                            <td>{{ $value->lawyer_phone }}</td>
                                            <td>{{ $value->petition_name }}</td>
                                            <td>{{ $value->proseType() }}</td>
                                            <td>{{ $value->type_judgment }}</td>
                                            <td>{{ $value->subject_appeal }}</td>
                                            <td>{{-- $value->Department->name --}}</td>
                                            <td>{{ $value->payment }}</td>

                                            <td>{{ $value->created_at->toFormattedDateString() }}</td>
                                            <td><a class="btn btn-primary sm"
                                                    href="{{ route('petition.edit', $value->id) }}"><i
                                                        class="fa fa-pulse "></i>تعديل</a>

                                                <a class="btn btn-info sm" href="{{ route('printThis', $value->id) }}"><i
                                                        class="fa fa-pulse "></i>طبع</a>

                                                <form method="post" action="{{ route('petition.destroy', $value->id) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    {{ method_field('delete') }}

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger sm">حذف</button>
                                                    </div>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="content-center" style="margin-top: 20px">
                                {{-- {{ $blogs->appends(request()->query())->links() }} --}}
                            </div>

                        </div><!-- bd -->

                    @else
                        لا يوجد بيانات حاليا
                    @endif
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection
@section('js')
@endsection
