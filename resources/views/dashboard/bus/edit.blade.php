@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>البصات</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('bus.index') }}">البصات</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit') {{-- <small>Quick Exapm</small> --}}</h3>
                </div>
                <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('bus.update' ,$bus->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>الماركة</label>
                            <input type="text" name="model_bus" class="form-control" value="{{$bus->model_bus}}">
                        </div>

                        <div class="form-group">
                            <label>عدد الركاب</label>
                            <input type="text" name="passenger_count" class="form-control" value="{{$bus->passenger_count}}">
                        </div>

                        <div class="form-group">
                            <label>خط البص</label>
                            <input type="text" name="bus_line" class="form-control" value="{{$bus->bus_line}}"> 
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i
                                    class=" fa fa-plus">@lang('site.edit')</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
