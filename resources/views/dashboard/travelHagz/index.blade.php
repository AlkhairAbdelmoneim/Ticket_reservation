@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>التذاكر</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">التذاكر</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">طباعة التذاكر<small
                            style="color: #f03; font-weight: bold">لا تغادر هذه الشاشه قبل طباعه او إالغاء التذكره
                            !!!</small></h3>

                </div>
                <div class="box-body">
                    @if (isset($passenger) && $passenger->count() > 0)
                        <table class="table table-bordered" id="tickets">
                            <thead>
                                <tr>
                                    {{-- <th>رقم الولايه</th> --}}
                                    <th>إسم المسافر</th>
                                    {{-- <th>ماركة البص</th> --}}
                                    <th>عدد المقاعد</th>
                                    <th>الرحله من</th>
                                    <th>الرحله الي</th>
                                    <th>موديل البص</th>
                                    <th>زمن القيام</th>
                                    <th> سعر التذكرة المدفوع</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $passenger['name'] }}</td>
                                    {{-- <td>{{ $passenger->modelBus->model_bus }}</td> --}}
                                    <td>{{ $passenger['chair_count'] }}</td>
                                    <td>{{ $travels['travel_from'] }}</td>
                                    <td>{{ $travels['travel_to'] }}</td>
                                    <td>{{ $travels->modelBus->model_bus }}</td>
                                    <td>{{ $travels['travel_go'] }}</td>
                                    <td>{{ $passenger['price'] }}</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success"><i class=" fa fa-plus"
                                    id="print">طباعة</i></button>

                            <a href="{{ route('dropTickets', ['passeng' => $passenger['id'], 'travel' => $travels['id']]) }}"
                                class="btn btn-danger"><i class=" fa fa-plus">إلغاء
                                التذكره</i></a>
                        </div>
                </div>
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
