@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>الرحلات</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">كل الرحلات</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">الرحلات<small
                            style="color: #f03">{{-- ' ' .$locals->total() --}}</small></h3>

                    <form action="{{ route('travels.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                        placeholder="@lang('site.search')">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">@lang('site.search')</button>
                                    </span>
                                </div>
                        </div>
                        <div class="col-md-4">

                            <a href="{{ route('travels.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i>@lang('site.add')</a>
                        </div>
                </div>
                </form>
            </div>
            <div class="box-body">
                @if (isset($travels) && $travels->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{--  <th>رقم الولايه</th>  --}}
                                <th>إسم الرحله</th>
                                <th>الرحله من</th>
                                <th>الرحله الي</th>
                                <th>تاريخ الرحله</th>
                                <th>وقت القيام</th>
                                <th>وقت الوصول</th>
                                <th>ماركة البص</th>
                                <th>عدد التذاكر</th>
                                <th>سعر التذكره</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($travels as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->travel_name }}</td>
                                    <td>{{ $item->travel_from}}</td>
                                    <td>{{ $item->travel_to}}</td>
                                    <td>{{ $item->travel_date }}</td>
                                    <td>{{ $item->travel_go }}</td>
                                    <td>{{ $item->travel_arive }}</td>
                                    <td>{{ $item->modelBus->model_bus }}</td>
                                    <td>{{ $item->tickets_no }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <a href="{{ route('travels.edit', $item->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i>@lang('site.edit')</a>

                                        <form method="post" action="{{ route('travels.destroy', $item->id) }}"
                                            style="display: inline-block">
                                            @csrf
                                            {{ method_field('delete') }}
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                        class="fa fa-trash"></i>@lang('site.delete')</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="content-center">
                        {{-- $locals->appends(request()->query())->links() --}}
                    </div>
                @else
                    <h2> @lang('site.no_data_found')</h2>
                @endif
            </div>
    </div>
    </section>
    </div>
@endsection