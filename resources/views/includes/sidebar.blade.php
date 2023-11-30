<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3" style="width: 300px">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h5 class="text-primary"></i>Library Management System</h5>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{\Illuminate\Support\Facades\Auth::user()->name}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Constants\UserTypeConstant::ADMIN)
                <a href="{{route('admin.books.index')}}" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark me-2"></i>Books</a>
                <a href="{{route('admin.customers.index')}}" class="nav-item nav-link"><i class="bi bi-person-plus"></i>Customers</a>
            @endif



            @if(\Illuminate\Support\Facades\Auth::user()->user_type == \App\Constants\UserTypeConstant::CUSTOMER)
                <a href="{{route('rent.index')}}" class="nav-item nav-link"><i
                            class="bi bi-journal-bookmark me-2"></i>Available Books</a>
            @endif
        </div>
    </nav>
</div>
<!-- Sidebar End -->

<!-- Content Start -->
<div class="content">