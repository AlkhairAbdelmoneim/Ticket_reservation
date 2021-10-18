@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>المسافر</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('passenger.index') }}">المسافر</a></li>
                <li class="active">@lang('site.edit')</li>
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

                    <form action="{{ route('passenger.update' ,$passenger->id) }}" method="POST">
                        @csrf
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>إسم المسافر</label>
                            <input type="text" name="name" class="form-control" value="{{$passenger->name}}">
                        </div>

                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" name="phone" class="form-control" value="{{$passenger->phone}}">
                        </div>

                        <div class="form-group">
                            <label>عدد المقاعد</label>
                            <input type="text" name="chair_count" class="form-control" value="{{$passenger->chair_count}}">
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
