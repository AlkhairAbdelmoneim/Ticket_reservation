<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('dashboard_files/img/avatar04.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> متصل</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i><span>@lang('site.home')</span></a></li>

              <li><a href="{{route('bus.index') }}"><i class="fa fa-group"></i><span>كل البصات السفريه</span></a></li>

            

            <li><a href="{{ route('passenger.index') }}"><i class="fa fa-building"></i><span>المسافر</span></a></li>
            
           <li><a href="{{ route('travels.index') }}"><i class="fa fa-envelope-o"></i><span>كل الرحلات</span></a></li>
           
             <li><a href="{{ route('home') }}"><i class="fa fa-th"></i><span>حجز رحله</span></a></li>
            
          <li><a href="{{ route('change') }}"><i class="fa fa-setting"></i><span>إعدادات النظام</span></a></li>

        </ul>

    </section>

</aside>

