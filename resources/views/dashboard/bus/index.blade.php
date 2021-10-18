@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>البصات</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">كل البصات</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">البصات<small
                            style="color: #f03">{{-- ' ' .$locals->total() --}}</small></h3>

                    <form action="{{ route('bus.index') }}" method="GET">
                        <div class="row">
                        </div>
                        <div class="col-md-4">

                            <a href="{{ route('bus.create') }}" class="btn btn-primary"><i
                                    class="fa fa-plus"></i>@lang('site.add')</a>
                        </div>
                </div>
                </form>
            </div>
            <div class="box-body">
                @if (isset($bus) && $bus->count() > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{--  <th>رقم الولايه</th>  --}}
                                <th>الماركة</th>
                                <th>عدد الركاب</th>
                                <th>خط البص</th>
                                <th>@lang('site.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bus as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->model_bus }}</td>
                                    <td>{{ $item->passenger_count}}</td>
                                    <td>{{ $item->bus_line }}</td>
                                    <td>
                                        <a href="{{ route('bus.edit', $item->id) }}" class="btn btn-info btn-sm"><i
                                                class="fa fa-edit"></i>@lang('site.edit')</a>

                                        <form method="post" action="{{ route('bus.destroy', $item->id) }}"
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
