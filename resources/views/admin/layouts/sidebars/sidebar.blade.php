<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('themes/default/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'GUI') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @can('view-dashboard')
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                @endcan
                @can('view-users')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=" nav-icon fas fa-th"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-users')
                                <li class="nav-item">
                                    <a href="{{ route('admin.users.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Users</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-roles')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Roles</p>
                                    </a>
                                </li>
                            @endcan
                            @can('view-permissions')
                                <li class="nav-item">
                                    <a href="{{ route('admin.permissions.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Permissions</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @if(in_array('posts',$commonContent['system_modules']))
                    @can('view-posts')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>
                                    Posts
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.posts.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Posts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.posts.new') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Post</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                @endif

                @if(in_array('memberships',$commonContent['system_modules']))
                    @can('view-memberships')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>
                                    Memberships
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.memberships.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Memberships</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.memberships.new') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>New Membership</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endcan
                @endif

                @if(in_array('testimonials',$commonContent['system_modules']))
                    @can('view-testimonials')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-comments"></i>
                                <p>
                                    Testimonials
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create-testimonials')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.testimonials.new') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Testimonial</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-testimonials')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.testimonials.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Testimonials</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                @endif

                @if(in_array('services',$commonContent['system_modules']))
                    @can('view-services')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-puzzle-piece"></i>
                                <p>
                                    Services
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create-services')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.services.new') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Service</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-services')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.services.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Services</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan

                @endif


                @if(in_array('categories',$commonContent['system_modules']))
                    @can('view-director-board')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>
                                Staff Members
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view-director-board')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.director_board.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Staff Members</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('create-director-board')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.director_board.new') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Staff Member</p>
                                        </a>
                                    </li>
                                @endcan
                               
                            </ul>
                        </li>
                    @endcan
                @endif

                @if(in_array('categories',$commonContent['system_modules']))
                    @can('view-categories')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>
                                    Categories
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('create-categories')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.new') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Category</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-categories')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Categories</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                @endif

                @if(in_array('inquiries',$commonContent['system_modules']))
                    @can('view-inquiries')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>
                                    Inquiries
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                {{--@can('create-categories')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.categories.new') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>New Category</p>
                                        </a>
                                    </li>
                                @endcan--}}
                                @can('view-inquiries')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.inquiries.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Inquiries</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                @endif


                @if(in_array('gallery_images',$commonContent['system_modules']))
                    @can('view-gallery-images')

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class=" nav-icon fas fa-th"></i>
                                <p>Gallery
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                @can('view-gallery-images')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.gallery-images.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>All Gallery Images</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                @can('view-component-manager')
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=" nav-icon fas fa-th"></i>
                            <p>
                                Component Manager
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-pages')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.pages.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pages</p>
                                        </a>
                                    </li>
                            @endcan
                            @can('view-components')
                                <li class="nav-item">
                                    <a href="{{ route('admin.components.all') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Components</p>
                                    </a>
                                </li>
                            @endcan
                                @can('view-elements')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.elements.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Elements</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view-parameters')
                                    <li class="nav-item">
                                        <a href="{{ route('admin.parameters.all') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Parameters</p>
                                        </a>
                                    </li>
                                @endcan


                            </ul>
                        </li>
                    @endcan

                @endif
                @can('view-configurations')

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class=" nav-icon fas fa-th"></i>
                            <p>Configurations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('view-configurations')
                                <li class="nav-item">
                                    <a href="{{route('admin.configurations.all')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>System Configurations</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>

                        <ul class="nav nav-treeview">
                            @can('view-modules')
                                <li class="nav-item">
                                    <a href="{{route('admin.system-modules.all')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>System Modules</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan



            </ul>



        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
