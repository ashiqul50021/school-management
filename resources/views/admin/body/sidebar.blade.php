<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Ashiq</b> school</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                <a href="/dashboard">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ (request()->segment(1) == 'user') ? 'active' : '' }} ">
                <a href="#">
                    <i data-feather="message-circle"></i>
                    <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
                    <li><a href="{{ route('user.create') }}"><i class="ti-more"></i>Add User</a></li>
                </ul>
            </li>

            <li class="treeview {{ (request()->segment(1) == 'profile') ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="mail"></i> <span>Profile Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile </a></li>
                   
                    
                </ul>
            </li>

            <li class="treeview {{ (request()->segment(1) == 'setups') ? 'active' : '' }} ">
                <a href="#">
                  <i data-feather="credit-card"></i> <span>Setup Management</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('student.class.view') }}"><i class="ti-more"></i>Student Class</a></li>
                  <li><a href="{{ route('student.year.view') }}"><i class="ti-more"></i>Student Year</a></li>
                  <li><a href="{{ route('student.group.view') }}"><i class="ti-more"></i>Student Group</a></li>
                  <li><a href="{{ route('student.shift.view') }}"><i class="ti-more"></i>Student Shift</a></li>
                  <li><a href="{{ route('fee.category.view') }}"><i class="ti-more"></i>Fee Category</a></li>
                  <li><a href="{{ route('fee.amount.view') }}"><i class="ti-more"></i>Fee Category Amount</a></li>
                  <li><a href="{{ route('exam.type.view') }}"><i class="ti-more"></i>Exam Type</a></li>
                  {{-- 
                  
                  
                  
                  
                  
                  <li><a href="{{ route('school.subject.view') }}"><i class="ti-more"></i>School Subject</a></li>
                  <li><a href="{{ route('assign.subject.view') }}"><i class="ti-more"></i>Assign Subject</a></li>
                  <li><a href="{{ route('designation.view') }}"><i class="ti-more"></i>Designation </a></li> --}}
       
       
                </ul>
              </li>

            

            <li>
                <a href="auth_login.html">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Settings"
            aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i
                class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i
                class="ti-lock"></i></a>
    </div>
</aside>