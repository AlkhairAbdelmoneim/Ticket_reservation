{{-- كود شاشة انشاء الاقسام --}}
@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاقسام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة
                    الاقسام</span>
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
                    
                    <form class="___class_+?9___" action="{{ route('department.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('post') }}

                        <div class="___class_+?9___">

                            <div class="form-group">
                                <label for="exampleInputEmail1">الاسم</label>
                                <input type="text" name="name" class="form-control" placeholder="الاسم">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-0">إضافه</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
@endsection
