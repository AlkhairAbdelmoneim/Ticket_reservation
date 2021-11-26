@extends('layouts.dashboard.app')

@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.home')</h1>
            <ol class="breadcrumb">
                <li><a href="{{-- route('adminbanel') --}}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">المستخدم</li>
            </ol>
        </section>
        <section class="content">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">تعديل بيانات المستخدم</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                                <button class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('partials._errors')

                                    <form action="{{ route('update') }}" method="POST">
                                        @csrf
                                        {{ method_field('post') }}
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>إسم المستخدم</label>
                                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>الإيميل</label>
                                                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>كلمة المرور القديمه</label>
                                                <input type="password" name="old_password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>كلمة المرور الجديدة</label>
                                                <input type="password" name="new_password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-info" style="width: 100%">تعديل</button>
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
