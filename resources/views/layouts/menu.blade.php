<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="/home" class="nav-link {{Request::is('home')?'active':''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    首页
                </p>
            </a>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a href="{{ route('trans') }}" class="nav-link {{Request::is('trans*')?'active':''}}">--}}
{{--                <i class="nav-icon fas fa-chart-bar"></i>--}}
{{--                <p>--}}
{{--                    转化--}}
{{--                </p>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="nav-item">
            <a href="{{ route('convs.index') }}" class="nav-link {{Request::is('convs*')?'active':''}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    明细
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('conv_type.index') }}" class="nav-link {{Request::is('conv_type*')?'active':''}}">
                <i class="nav-icon fas fa-comments"></i>
                <p>
                    转化类型
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('project.index') }}" class="nav-link {{Request::is('project*')?'active':''}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    项目
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('count.index') }}" class="nav-link {{Request::is('count*')?'active':''}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    ocpc账户
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="" class="nav-link {{Request::is('gh*')?'active':''}}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                    修改密码
                </p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
