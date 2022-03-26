<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ทั่วไป</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/patient">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                ข้อมูลคนไข้
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                จัดการข้อความเตือนคนไข้
                            </a>
                            @if(Auth::guard('medic')->user()->admin)
                            <div class="sb-sidenav-menu-heading">แอดมิน</div>
                            <a class="nav-link" href="/usermanagement">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                จัดการข้อมูลผู้ใช้
                            </a>
                            @endif

    </nav>
</div>
