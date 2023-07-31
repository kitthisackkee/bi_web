<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
      <a href="{{route('admin.dashboard')}}" class="navbar-brand">
        <img src="{{asset('images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <!--<span class="brand-text font-weight-light">{{__('lang.title')}}</span>-->
      </a>

      <!-- Left navbar links -->
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">

          <!--Modules-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.modules')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="https://mail.hostinger.com" target="_blank" class="dropdown-item">{{__('lang.module_email')}}</a></li>
              <li><a href="{{route('dashboardblog.index')}}" class="dropdown-item">{{__('lang.module_website')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.module_document')}}</a></li>
              
              <!-- Module System-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_setting')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('admin.village')}}" class="dropdown-item">{{__('lang.village')}}</a></li>
                  <li><a href="{{route('admin.district')}}" class="dropdown-item">{{__('lang.district')}}</a></li>
                  <li><a href="{{route('admin.province')}}" class="dropdown-item">{{__('lang.province')}}</a></li>
                  <li class="dropdown-divider"></li>
                </ul>
              </li>

              <li><a href="{{route('dashboardsetting.index')}}" class="dropdown-item">{{__('lang.module_system')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.pay_member')}}</a></li>

            </ul>
          </li>

          <!--Transection-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.transection')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('admin.sale')}}" class="dropdown-item">{{__('lang.sale')}}</a></li>
              <li><a href="{{route('admin.purchase')}}" class="dropdown-item">{{__('lang.purchase')}}</a></li>
              <li><a href="{{route('admin.tree')}}" class="dropdown-item">{{__('lang.give_tree')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.stock')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.lost_product')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.other_expenses')}}</a></li>
            </ul>
          </li>

          <!--Condition-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.condition')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('admin.catalog')}}" class="dropdown-item">{{__('lang.products')}}</a></li>
              <li><a href="{{route('admin.customer')}}" class="dropdown-item">{{__('lang.customers')}}</a></li>
              <li><a href="{{route('admin.membertype')}}" class="dropdown-item">{{__('lang.members')}}</a></li>
            </ul>
          </li>

          <!--Employee-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.employee')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="{{route('admin.employee')}}" class="dropdown-item">{{__('lang.all_employee')}}</a></li>
              <li><a href="{{route('admin.payroll')}}" class="dropdown-item">{{__('lang.payroll')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.salary_type')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.employee_report')}}</a></li>
            </ul>
          </li>

          <!--Report-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.report')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="" class="dropdown-item">{{__('lang.reports')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.income_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.expenses_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.cost_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.stock_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.lost_product_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.debits_pay_report')}}</a></li>
              <li><a href="" class="dropdown-item">{{__('lang.debits_receive_report')}}</a></li>
            </ul>
          </li>
        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>

        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="">
            <i class="fas fa-language"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right p-0">
            <a class="nav-link" data-toggle="nav-item" href="{{url('localization/lo')}}">
              <i class="flag-icon flag-icon-la"></i> {{__('lang.lao')}}
            </a>
            <a class="nav-link" data-toggle="nav-item" href="{{url('localization/en')}}">
              <i class="flag-icon flag-icon-us"></i> {{__('lang.eng')}}
            </a>
          </div>
        </li>

        <!--Logout-->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
            <!--<span class="d-none d-md-inline">{{Auth::user()->email}}</span>-->
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
  
              <p>
                <p>{{__('lang.phone')}}: {{Auth::user()->phone}}</p>
                <p>{{__('lang.rolename')}}: {{Auth::user()->rolename->name}}</p>
              </p>
            </li>
            <!-- Menu Body 
            <li class="user-body">
              <div class="row">
                <div class="col-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>-->
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <livewire:admin.logout-component />
            </li>
          </ul>
        </li>

      </ul>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
    </div>
  </nav>