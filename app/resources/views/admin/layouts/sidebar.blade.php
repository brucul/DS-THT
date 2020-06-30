<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.gejala') }}" aria-expanded="false"><i class="mdi mdi-book-plus"></i><span class="hide-menu"> Data Gejala </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple"></i><span class="hide-menu"> Data Penyakit </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item"><a href="{{ route('admin.penyakit') }}" class="sidebar-link"><i class="mdi mdi-book-minus"></i><span class="hide-menu"> Data Penyakit </span></a></li>
                        <li class="sidebar-item"><a href="{{ route('admin.info.list') }}" class="sidebar-link"><i class="mdi mdi-book-minus"></i><span class="hide-menu"> Info Penyakit </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.pasien') }}" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> Data Pasien </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu">Rules </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="{{ route('admin.ds-rules') }}" class="sidebar-link"><i class="mdi mdi-vector-circle"></i><span class="hide-menu"> Dempster-Shafer </span></a></li>
                        <!-- <li class="sidebar-item"><a href="{{ route('admin.fc-rules') }}" class="sidebar-link"><i class="mdi mdi-sitemap"></i><span class="hide-menu"> Forward Chaining </span></a></li> -->
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>