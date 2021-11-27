{{-- كود شاشة تعديل الموظفين --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل
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

                    <form class="___class_+?9___" action="{{ route('employee.update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="___class_+?9___">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم</label>
                                <input type="text" name="name" class="form-control" placeholder="الاسم"
                                    value="{{ $employee->name }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">العنوان</label>
                                <input type="text" name="address" class="form-control" placeholder="العنوان"
                                    value="{{ $employee->address }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الهاتف</label>
                                <input type="text" name="phone" class="form-control" placeholder="الهاتف"
                                    value="{{ $employee->phone }}">
                            </div>

                            <div class="form-group ">
                                <div class="form-group has-success mg-b-0">
                                    <label for="exampleInputEmail1">النوع</label>
                                    <select name="gender">
                                        @foreach (getGender() as $key => $item)
                                            <option value="{{$key}}" @if ($employee->gender == $key )
                                                selected
                                        @endif>{{$item}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>

                            <div class="form-group ">
                                <div class="form-group has-success mg-b-0">
                                    <label for="exampleInputEmail1">القسم</label>
                                    <select name="department" >
                                        @foreach ($department as $item)
                                        <option value="{{$item->id}}" @if ($employee->department == $item->id)
                                            selected
                                        @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">@lang('site.edit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
