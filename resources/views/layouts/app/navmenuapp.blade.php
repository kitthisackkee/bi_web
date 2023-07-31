<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container-fluid">
      <a href="{{route('dashboard.index')}}" class="navbar-brand">
        <img src="{{asset('images/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Left navbar links -->
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">

          <!--Modules-->
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="{{route('dashboard.index')}}" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.modules')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">

              <!-- Module Website-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_website')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('post.index')}}" class="dropdown-item">{{__('blog.post')}}</a></li>
                  <li><a href="{{route('page.index')}}" class="dropdown-item">{{__('lang.page')}}</a></li>
                  <li><a href="{{route('slide.index')}}" class="dropdown-item">{{__('lang.slide')}}</a></li>
                  <li><a href="{{route('service.index')}}" class="dropdown-item">{{__('blog.service')}}</a></li>
                  <li><a href="{{route('solution_type.index')}}" class="dropdown-item">{{__('blog.solution_type')}}</a></li>
                  <li><a href="{{route('message.index')}}" class="dropdown-item">{{__('blog.message')}}</a></li>
                </ul>
              </li>

              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_student')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('user_for_student.index')}}" class="dropdown-item">{{__('lang.student')}}</a></li>
                  <!-- <li><a href="{{route('user_for_student.index')}}" class="dropdown-item">{{__('lang.user_student')}}</a></li> -->
                </ul>
              </li>
              
              <!-- Module Documents-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_document')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('import_doc.index')}}" class="dropdown-item">{{__('lang.import_doc')}}</a></li>
                  <li><a href="{{route('export_doc.index')}}" class="dropdown-item">{{__('lang.export_doc')}}</a></li>
                  <li><a href="{{route('local_doc.index')}}" class="dropdown-item">{{__('lang.local_doc')}}</a></li>
                  <li><a href="{{route('book.index')}}" class="dropdown-item">{{__('lang.books')}}</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a href="{{route('doc_type.index')}}" class="dropdown-item">{{__('lang.doc_type')}}</a></li>
                  <li><a href="{{route('storage_file.index')}}" class="dropdown-item">{{__('lang.storage_file')}}</a></li>
                  <li><a href="{{route('external_parts.index')}}" class="dropdown-item">{{__('lang.external_parts')}}</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a href="{{route('term.index')}}" class="dropdown-item">{{__('lang.term')}}</a></li>
                  <li><a href="{{route('booktype.index')}}" class="dropdown-item">{{__('lang.book_type')}}</a></li>
                  <li><a href="{{route('classroom.index')}}" class="dropdown-item">{{__('lang.class_room')}}</a></li>
                </ul>
              </li>

              <!-- Module Account
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_account')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('transection.index')}}" class="dropdown-item">{{__('lang.transection')}}</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a href="{{route('settingacc.index')}}" class="dropdown-item">{{__('lang.settingacc')}}</a></li>
                  <li><a href="{{route('branch.index')}}" class="dropdown-item">{{__('lang.branch')}}</a></li>
                  <li><a href="{{route('statusacc.index')}}" class="dropdown-item">{{__('lang.statusacc')}}</a></li>
                  <li><a href="{{route('currency.index')}}" class="dropdown-item">{{__('lang.currency')}}</a></li>
                </ul>
              </li>-->
              
              <!-- Module Employee
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_employee')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('employee.index')}}" class="dropdown-item">{{__('lang.employee')}}</a></li>
                  <li><a href="{{route('payroll.index')}}" class="dropdown-item">{{__('lang.payroll')}}</a></li>
                  <li><a href="{{route('salary.index')}}" class="dropdown-item">{{__('lang.salary')}}</a></li>
                </ul>
              </li>-->

              <!-- Module Setting-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_setting')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('depart.index')}}" class="dropdown-item">{{__('lang.depart')}}</a></li>
                  <li><a href="{{route('province.index')}}" class="dropdown-item">{{__('lang.province')}}</a></li>
                  <li><a href="{{route('district.index')}}" class="dropdown-item">{{__('lang.district')}}</a></li>
                  <li><a href="{{route('village.index')}}" class="dropdown-item">{{__('lang.village')}}</a></li>
                  <!--<li><a href="{{route('marries.index')}}" class="dropdown-item">{{__('lang.marriesstatus')}}</a></li>
                  <li><a href="{{route('position.index')}}" class="dropdown-item">{{__('lang.position')}}</a></li>
                  <li class="dropdown-divider"></li>-->
                </ul>
              </li>

              <!-- Module System-->
              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">{{__('lang.module_system')}}</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li><a href="{{route('branch.index')}}" class="dropdown-item">{{__('lang.branch')}}</a></li>
                  <li><a href="{{route('role.index')}}" class="dropdown-item">{{__('lang.role')}}</a></li>
                  <li><a href="{{route('user.index')}}" class="dropdown-item">{{__('lang.user')}}</a></li>
                  <li class="dropdown-divider"></li>
                </ul>
              </li>
            </ul>
          </li>
            <!--
          <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">{{__('lang.dashboard')}}</a>
          </li>-->

          <!--Report
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false" class="nav-link dropdown-toggle">{{__('lang.report')}}</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="" class="dropdown-item">{{__('lang.allreport')}}</a></li>
            </ul>
          </li>-->

        </ul>

      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

        <!-- Notifications Dropdown Menu 
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
        </li>-->

        <!-- Language Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="nav-item" href="{{url('localization/lo')}}">
            <i class="flag-icon flag-icon-la"></i>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" data-toggle="nav-item" href="{{url('localization/en')}}">
            <i class="flag-icon flag-icon-us"></i>
          </a>
        </li>

        <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('admin/dist/img/avatar5.png')}}" class="user-image img-circle elevation-2" alt="User Image">
          <span class="d-none d-md-inline"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{asset('admin/dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">

            <p>{{__('lang.phone')}}: {{Auth::user()->phone}}</p>
            <p>{{Auth::user()->name}}</p>
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
            </div>
          </li>-->
          <!-- Menu Footer-->
          <li class="user-footer">
            <a href="{{route('user.edit', Auth::user()->id)}}" class="btn btn-default btn-flat">{{__('lang.profile')}}</a>
            <a href="{{route('logout')}}" class="btn btn-default btn-flat float-right">{{__('lang.signout')}}</a>
          </li>
        </ul>
      </li>

      </ul>
    </div>
  </nav>