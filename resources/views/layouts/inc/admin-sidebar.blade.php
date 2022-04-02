<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ทั่วไป</div>
                            <a class="nav-link" href="/dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-clinic-medical"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="/patient">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-medical"></i></div>
                                ข้อมูลคนไข้
                            </a>
                            <a class="nav-link" href="/notipatient">
                                <div class="sb-nav-link-icon"><i class="fas fa-heartbeat"></i></div>
                                จัดการข้อความเตือนคนไข้
                            </a>
                            
                            @if(Auth::user()->admin)
                            <div class="sb-sidenav-menu-heading">แอดมิน</div>
                            <a class="nav-link" href="/usermanagement">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-md"></i></div>
                                จัดการข้อมูลผู้ใช้
                            </a>
                            <a class="nav-link" href="/hospital">
                                <div class="sb-nav-link-icon"><i class="fas fa-hospital"></i></div>
                                จัดการข้อมูลโรงพยาบาล
                            </a>
                            <a class="nav-link" href="/disease">
                                <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></i></div>
                                จัดการข้อมูลโรค
                            </a>
                            <a class="nav-link" href="/medicine">
                                <div class="sb-nav-link-icon"><i class="fas fa-capsules"></i></div>
                                จัดการข้อมูลยา
                            </a>
                            @endif

    </nav>
</div>
