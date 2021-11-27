{{-- كود شاشة انشاء الموظفين --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة
                    الموظفين</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                {{-- <div class="card-header">
								<h4 class="card-title mb-1">Vertical Form</h4>
								<p class="mb-2">It is Very Easy to Customize and it uses in your website apllication.</p>
							</div> --}}
                <div class="card-body">

                    @include('partials._errors')

                    <form class="___class_+?9___" action="{{ route('employee.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('post') }}

                        <div class="___class_+?9___">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم</label>
                                <input type="text" name="name" class="form-control" placeholder="الاسم">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">العنوان</label>
                                <input type="text" name="address" class="form-control" placeholder="العنوان">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الهاتف</label>
                                <input type="text" name="phone" class="form-control" placeholder="الهاتف">
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="mg-b-10">النوع</p><select class="form-control select2-no-search"
                                            name="gender">
                                            <option label="إختر واحده">
                                            </option>
                                            <option value="1">ذكر</option>
                                            <option value="2">انثي</option>
                                        </select>
                                    </div><!-- col-4 -->
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <p class="mg-b-10">القسم</p><select
                                            class="form-control select2-no-search" name="em_research">
                                            <option label="إختر ...">
                                            </option>
                                            @foreach ($department as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div><!-- col-4 -->
                                </div>
                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">إضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
