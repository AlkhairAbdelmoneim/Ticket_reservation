@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>الرحلات</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('travels.index') }}"></a>الرحلات</li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add') {{-- <small>Quick Exapm</small> --}}</h3>
                </div>
                <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('travels.store') }}" method="POST">
                        @csrf
                        {{ method_field('post') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>إسم الرحله</label>
                                <input type="text" name="travel_name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>تاريخ الرحله</label>
                                <input type="date" name="travel_date" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الرحله من</label>
                                <input type="text" name="travel_from" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الرحله الي</label>
                                <input type="text" name="travel_to" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>وقت القيام</label>
                                <input type="time" name="travel_go" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>وقت الوصول</label>
                                <input type="time" name="travel_arive" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput2">ماركة البص</label>
                                <select name="model_bus" class="form-control" style="height: 40px">
                                    @foreach ($bus as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->model_bus  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>عدد التذاكر</label>
                                <input type="text" name="tickets_no" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>سعر التذكرة</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="width: 100%"><i
                                    class=" fa fa-plus">@lang('site.add')</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection