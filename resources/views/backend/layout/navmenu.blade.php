<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard.index')}}" class="brand-link">
      <img src="{{asset('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{__('lang.admin')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="{{__('lang.search')}}" aria-label="{{__('lang.search')}}">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('dashboard.index')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                {{__('lang.dashboard')}}
              </p>
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->

          @if(Auth::user()->rolename->name == 'office')

          <li class="nav-item {{ Request::path() == 'import_doc'|| Request::path() == 'export_doc'|| Request::path() == 'local_doc'||Request::path() == 'doc_type'||Request::path() == 'storage_file'||Request::path() == 'external_parts' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{__('lang.documents')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('import_doc.index')}}" class="nav-link {{ (request()->routeIs('import_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.import_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('export_doc.index')}}" class="nav-link {{ (request()->routeIs('export_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.export_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('local_doc.index')}}" class="nav-link {{ (request()->routeIs('local_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.local_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doc_type.index')}}" class="nav-link {{ (request()->routeIs('doc_type.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.doc_type')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('storage_file.index')}}" class="nav-link {{ (request()->routeIs('storage_file.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.storage_file')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('external_parts.index')}}" class="nav-link {{ (request()->routeIs('external_parts.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.external_parts')}}</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item {{ Request::path() == 'employee' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                {{__('lang.employee')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.index')}}" class="nav-link {{ (request()->routeIs('employee.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.employee')}}</p>
                </a>
              </li>
            </ul>
          </li>

          @elseif (Auth::user()->rolename->name == 'accounting')

          <li class="nav-item {{ Request::path() == 'transection'|| Request::path() == 'settingacc'||Request::path() == 'branch'||Request::path() == 'statusacc'||Request::path() == 'currency' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                {{__('lang.account')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('transection.index')}}" class="nav-link {{ (request()->routeIs('transection.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.transection')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settingacc.index')}}" class="nav-link {{ (request()->routeIs('settingacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.settingacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('branch.index')}}" class="nav-link {{ (request()->routeIs('branch.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.branch')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('statusacc.index')}}" class="nav-link {{ (request()->routeIs('statusacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.statusacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('currency.index')}}" class="nav-link {{ (request()->routeIs('currency.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.currency')}}</p>
                </a>
              </li>
            </ul>
          </li>

          @elseif (Auth::user()->rolename->name == 'manager')

          <li class="nav-item {{ Request::path() == 'import_doc'|| Request::path() == 'export_doc'|| Request::path() == 'local_doc'||Request::path() == 'doc_type'||Request::path() == 'storage_file'||Request::path() == 'external_parts' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{__('lang.documents')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('import_doc.index')}}" class="nav-link {{ (request()->routeIs('import_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.import_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('export_doc.index')}}" class="nav-link {{ (request()->routeIs('export_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.export_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('local_doc.index')}}" class="nav-link {{ (request()->routeIs('local_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.local_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doc_type.index')}}" class="nav-link {{ (request()->routeIs('doc_type.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.doc_type')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('storage_file.index')}}" class="nav-link {{ (request()->routeIs('storage_file.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.storage_file')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('external_parts.index')}}" class="nav-link {{ (request()->routeIs('external_parts.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.external_parts')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::path() == 'transection'|| Request::path() == 'settingacc'||Request::path() == 'branch'||Request::path() == 'statusacc'||Request::path() == 'currency' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                {{__('lang.account')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('transection.index')}}" class="nav-link {{ (request()->routeIs('transection.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.transection')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settingacc.index')}}" class="nav-link {{ (request()->routeIs('settingacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.settingacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('branch.index')}}" class="nav-link {{ (request()->routeIs('branch.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.branch')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('statusacc.index')}}" class="nav-link {{ (request()->routeIs('statusacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.statusacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('currency.index')}}" class="nav-link {{ (request()->routeIs('currency.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.currency')}}</p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item {{ Request::path() == 'employee'||Request::path() == 'salary'||Request::path() == 'payroll' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>{{__('lang.employee')}}<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.index')}}" class="nav-link {{ (request()->routeIs('employee.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.employee')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payroll.index')}}" class="nav-link {{ (request()->routeIs('payroll.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.payroll')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('salary.index')}}" class="nav-link {{ (request()->routeIs('salary.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.salary')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::path() == 'product'|| Request::path() == 'catalog'|| Request::path() == 'slide'|| Request::path() == 'service' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>{{__('lang.product')}}<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{ (request()->routeIs('product.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.product')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('catalog.index')}}" class="nav-link {{ (request()->routeIs('catalog.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.catalog')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slide.index')}}" class="nav-link {{ (request()->routeIs('slide.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.slide')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service.index')}}" class="nav-link {{ (request()->routeIs('service.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.service')}}</p>
                </a>
              </li>
            </ul>
          </li>
          
          @elseif (Auth::user()->rolename->name == 'admin')

          <li class="nav-item {{ Request::path() == 'import_doc'|| Request::path() == 'export_doc'|| Request::path() == 'local_doc'||Request::path() == 'doc_type'||Request::path() == 'storage_file'||Request::path() == 'external_parts' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                {{__('lang.documents')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('import_doc.index')}}" class="nav-link {{ (request()->routeIs('import_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.import_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('export_doc.index')}}" class="nav-link {{ (request()->routeIs('export_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.export_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('local_doc.index')}}" class="nav-link {{ (request()->routeIs('local_doc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.local_doc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('doc_type.index')}}" class="nav-link {{ (request()->routeIs('doc_type.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.doc_type')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('storage_file.index')}}" class="nav-link {{ (request()->routeIs('storage_file.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.storage_file')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('external_parts.index')}}" class="nav-link {{ (request()->routeIs('external_parts.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.external_parts')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::path() == 'transection'|| Request::path() == 'settingacc'||Request::path() == 'branch'||Request::path() == 'statusacc'||Request::path() == 'currency' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                {{__('lang.account')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('transection.index')}}" class="nav-link {{ (request()->routeIs('transection.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.transection')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('settingacc.index')}}" class="nav-link {{ (request()->routeIs('settingacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.settingacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('branch.index')}}" class="nav-link {{ (request()->routeIs('branch.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.branch')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('statusacc.index')}}" class="nav-link {{ (request()->routeIs('statusacc.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.statusacc')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('currency.index')}}" class="nav-link {{ (request()->routeIs('currency.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.currency')}}</p>
                </a>
              </li>
            </ul>
          </li>
          

          <li class="nav-item {{ Request::path() == 'employee'||Request::path() == 'salary'||Request::path() == 'payroll' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>{{__('lang.employee')}}<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('employee.index')}}" class="nav-link {{ (request()->routeIs('employee.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.employee')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('payroll.index')}}" class="nav-link {{ (request()->routeIs('payroll.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.payroll')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('salary.index')}}" class="nav-link {{ (request()->routeIs('salary.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.salary')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{ Request::path() == 'product'|| Request::path() == 'catalog'|| Request::path() == 'slide'|| Request::path() == 'service' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>{{__('lang.product')}}<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('product.index')}}" class="nav-link {{ (request()->routeIs('product.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.product')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('catalog.index')}}" class="nav-link {{ (request()->routeIs('catalog.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.catalog')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('slide.index')}}" class="nav-link {{ (request()->routeIs('slide.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.slide')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('service.index')}}" class="nav-link {{ (request()->routeIs('service.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.service')}}</p>
                </a>
              </li>
            </ul>
          </li>

          <!--Settings-->
          <li class="nav-item {{ Request::path() == 'depart'|| Request::path() =='province'|| Request::path() =='district'|| Request::path() =='village'|| Request::path() =='marries'|| Request::path() =='position'|| Request::path() =='role'|| Request::path() =='user' ? 'menu-open' : '' }}">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                {{__('lang.settings')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('depart.index')}}" class="nav-link {{ (request()->routeIs('depart.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.depart')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('province.index')}}" class="nav-link {{ (request()->routeIs('province.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.province')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('district.index')}}" class="nav-link {{ (request()->routeIs('district.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.district')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('village.index')}}" class="nav-link {{ (request()->routeIs('village.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.village')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('marries.index')}}" class="nav-link {{ (request()->routeIs('marries.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.marriesstatus')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('position.index')}}" class="nav-link {{ (request()->routeIs('position.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.positionname')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link {{ (request()->routeIs('role.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.role')}}</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{ (request()->routeIs('user.index')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>{{__('lang.user')}}</p>
                </a>
              </li>
            </ul>
          </li>

          @endif

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>