<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div class="app-sidebar-menu">
            <div class="h-100" data-simplebar>
                <div id="sidebar-menu">

                    <div class="logo-box">
                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="" height="24">
                            </span>
                        </a>
                        <a href="{{ route('dashboard') }}" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="" height="24">
                            </span>
                        </a>
                    </div>

                    <ul id="side-menu">
                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i data-feather="home"></i>
                                <span> Dashboard </span>

                            </a>
                        </li>

                        <li>
                            <a href="#sidebarAccountant" data-bs-toggle="collapse">
                                <i data-feather="home"></i>
                                <span> Menu </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAccountant">
                                <ul class="nav-second-level">
                                    <li><a href="{{ route('employees.index') }}">Employees</a></li>

                                    {{-- Products --}}

                                    <li><a href="{{ route('products.index') }}">Products</a></li>

                                    {{-- Reservoirs --}}
                                    <li><a href="{{ route('reservoirs.index') }}">Reservoirs</a></li>
                                    {{-- Drivers --}}
                                    <li><a href="{{ route('drivers.index') }}">Drivers</a></li>
                                    {{-- Companies --}}
                                    <li><a href="{{ route('companies.index') }}">Companies</a></li>
                                    {{-- Imports --}}
                                    <li><a href="{{ route('imports.index') }}">Imports</a></li>
                                    {{-- Customers --}}
                                    <li><a href="{{ route('customers.index') }}">Customers</a></li>
                                    {{-- Sales --}}
                                    <li><a href="{{ route('sales.index') }}">Sales</a></li>
                                    {{-- Lends --}}
                                    <li><a href="{{ route('lends.index') }}">Lends</a></li>
                                    {{-- Payments --}}
                                    <li><a href="{{ route('payments.index') }}">Payments</a></li>
                                    {{-- Cheques --}}
                                    <li><a href="{{ route('cheques.index') }}">Cheques</a></li>
                                    {{-- Expenses --}}
                                    <li><a href="{{ route('expenses.index') }}">Expenses</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
            </div>
        </div>

        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
