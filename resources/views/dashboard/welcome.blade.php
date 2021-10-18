@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.home')</h1>
            <ol class="breadcrumb">
                <li><a href="{{-- route('adminbanel') --}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">الرحلات</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">منطقة حجر الرحلات</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i
                                            class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('partials._errors')

                                    <form action="{{ route('travelsHagz.store') }}" method="POST">
                                        @csrf
                                        {{ method_field('post') }}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>إسم المسافر</label>
                                                <input type="text" name="name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>رقم الهاتف</label>
                                                <input type="text" name="phone" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>عدد المقاعد</label>
                                                <input type="text" name="chair_count" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput2">كل الرحلات من و الي</label>
                                                <select name="travel_from_to" class="form-control" style="height: 40px">
                                                    @foreach ($travels as $key => $value)
                                                        <option value="{{ $value->id }}">
                                                            {{ ' من ' . $value->travel_from . ' الي ' . $value->travel_to . ' السعر ' . $value->price . ' القيام ' . $value->travel_go . ' الوصول ' . $value->travel_arive }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info" style="width: 100%">حجز الرحله</button>
                                        </div>
                                    </form>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </section><!-- /.content -->
    </div>
@endsection

@push('scripts')



@endpush
