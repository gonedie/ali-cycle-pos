            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('/admin/type-merk') }}">Type Merks</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/products') }}">Products</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-wrench fa-fw"></i> Inventorie<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                              <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                              <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                              <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                              <a href="typography.html">Typography</a>
                            </li>
                            <li>
                              <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                              <a href="grid.html">Grid</a>
                            </li>
                          </ul>
                          <!-- /.nav-second-level -->
                        </li>
                        <li>
                          <a href="#"><i class="fa fa-sitemap fa-fw"></i> Transactions<span class="fa arrow"></span></a>
                          <ul class="nav nav-second-level">
                            <li>
                              {{ link_to_route('cart.index', trans('nav_menu.draft_list'), [], ['class' => 'strong text-primary']) }}
                            </li>
                            <li>
                              <a href="{{ url('/admin/transactions') }}">List Transactions</a>
                            </li>
                          </ul>
                          <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{ url('/admin/supplier') }}"><i class="fa fa-table fa-fw"></i> Supllier</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Manage Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="blank.html">Blank Page</a>
                                </li>
                                <li>
                                    <a href="login.html">Login Page</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
