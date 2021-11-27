{{-- كود شاشة تعديل عريضه --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">العريضه</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة
                    العريضه</span>
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

                    <form class="___class_+?9___" action="{{ route('petition.update' ,$petition->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="___class_+?9___">

                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم القاضي</label>
                                <input type="text" name="name" class="form-control" value="{{$petition->name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم المحامي</label>
                                <input type="text" name="lawyer_name" class="form-control" value="{{$petition->lawyer_name}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">رقم المحامي</label>
                                <input type="text" name="lawyer_phone" class="form-control" value="{{$petition->lawyer_phone}}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">إسم مقدم العريضه</label>
                                <input type="text" name="petition_name" class="form-control" value="{{$petition->petition_name}}">
                            </div>

                            <div class="form-group">
                                <label for="projectinput2">نوع العريضه</label>
                                <select name="type_petition">
        
                                        <option value="1">جنائية</option>
                                        <option value="2">مدنية</option>
                                        <option value="3">شرعية</option>
                                        <option value="4">إدارية</option>
                                </select>
                            </div>

                            <div class="form-group ">
                                <div class="form-group has-success mg-b-0">
                                    <label for="exampleInputEmail1">إسم المراجع</label>
                                    <select name="em_research" >
                                        @foreach ($employee as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>موضوع الطعن</label>
                                <textarea name="type_judgment" id="" class="form-control" cols="4" rows="4">{{$petition->type_judgment}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>تحديد الحكم</label>
                                <textarea name="subject_appeal" id="" class="form-control" cols="4" rows="4">{{$petition->subject_appeal}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">المبلغ المدفوع</label>
                                <input type="text" name="payment" class="form-control" value="{{$petition->payment}}">
                            </div>

                            

                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">تعديل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
