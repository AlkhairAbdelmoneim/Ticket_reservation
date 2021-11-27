{{-- كود شاشة عرض كل الموظفين --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">كل الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
            </div>
        </div>
    </div>

    {{-- <form action="{{ route('employee.index') }}" method="GET">
        @csrf
        <div class="breadcrumb-header justify-content-between">
            <div class="card-body pb-0">
                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="بحث....." value="{{ request()->search }}">
                    <span class="input-group-append">
                        <button class="btn ripple btn-primary" type="submit">بحث</button>
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
                        <td><a class="btn btn-info" href="{{ route('employee.create') }}"><i
                                    class="fa fa-pulse"></i>إضافة</a></td>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">

                    @if (isset($employee) && $employee->count() != 0)

                        <div class="table-responsive">
                            <table class="table table-striped mg-b-0 text-md-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>الاسم</th>
                                        <th>الهاتف</th>
                                        <th>العنوان</th>
                                        <th>القسم</th>
                                        <th>النوع</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employee as $value)
                                        <tr>
                                            <th scope="row">{{ $value->id }}</th>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->address }}</td>
                                            <td>{{ $value->Department->name }}</td>
                                            <td>{{ $value->getGender() }}</td>
                                            <td>{{ $value->created_at->toFormattedDateString() }}</td>
                                            <td><a class="btn btn-primary"
                                                    href="{{ route('employee.edit', $value->id) }}"><i
                                                        class="fa fa-pulse"></i>تعديل</a>

                                                <form method="post" action="{{ route('employee.destroy', $value->id) }}"
                                                    style="display: inline-block">
                                                    @csrf
                                                    {{ method_field('delete') }}

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-danger "><i
                                                                class="fa fa-trash"></i>حذف</button>
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
