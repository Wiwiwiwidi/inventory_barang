<aside class="main-sidebar sidebar-dark-info">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <!-- <img src="{{asset('gambar/logo-baru-kemhan-dok-istimewa_11.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <br/>
      <span class="brand-text font-weight-dark">BALITBANG KEMHAN RI</span>
      <br/>
    </a>
    
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <!-- menampilkan nama admin/user -->
        <div class="info">
        <a href="#" class="d-block">{{auth()->user()->name}}
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
              <a href="/beranda" class="nav-link {{ e($__env->yieldContent('menu'))== 'dashboard' ? 'active' : '' }}">
                <i class="fas fa-home"></i>
                <p>HOME</p>
            </a>
        </li>
          <li class="nav-item menu-open">
            <a href="/beranda" class="nav-link active">
              <p>
                DATA MASTER
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/kategori" class="nav-link {{ e($__env->yieldContent('submenu'))== 'kategori' ? 'active' : '' }}">
                  <i class="fas fa-tasks"></i>
                  <p> Data Kategori</p>
                </a>
              </li>
          </ul>

          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/rak" class="nav-link  {{ e($__env->yieldContent('submenu'))== 'rak' ? 'active' : '' }}">
                  <i class="fas fa-suitcase"></i>
                  <p> Data Rak</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/gudang" class="nav-link  {{ e($__env->yieldContent('submenu'))== 'gudang' ? 'active' : '' }}">
                  <i class="fas fa-boxes"></i>
                  <p> Data Gudang</p>
                </a>
              </li>
            </ul>

          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pemasok" class="nav-link  {{ e($__env->yieldContent('submenu'))== 'pemasok' ? 'active' : '' }}">
                  <i class="fas fa-address-book"></i>
                  <p> Data Pemasok</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/karyawan" class="nav-link  {{ e($__env->yieldContent('submenu'))== 'karyawan' ? 'active' : '' }}">
                  <i class="fas fa-address-book"></i>
                  <p> Data Karyawan</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/stok_barang" class="nav-link {{ e($__env->yieldContent('submenu'))== 'stok_barang' ? 'active' : '' }}">
                  <i class="fas fa-box-open"></i>
                  <p>Data Barang</p>
                </a>
              </li>
          </ul>
      </li>

      <li class="nav-item menu-open">
            <a href="/beranda" class="nav-link active">
              <i class="nav-icon warning"></i>
              <p>
                TRANSAKSI
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
      
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/barang_masuk" class="nav-link {{ e($__env->yieldContent('menu'))== 'barang_masuk' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-primary"></i>
                  <p>Barang Masuk</p>
                </a>
              </li>
          </ul>

          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/barang_keluar" class="nav-link {{ e($__env->yieldContent('menu'))== 'barang_keluar' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>Barang keluar</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon warning"></i>
              <p>
                LAPORAN 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cetak-barang_masuk-form" class="nav-link {{ e($__env->yieldContent('submenu'))== 'cetak-barang_masuk-form' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-warning"></i>
                  <p>Cetak Barang Masuk</p>
                </a>
              </li>
          </ul>
          <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/cetak-barang_keluar-form" class="nav-link {{ e($__env->yieldContent('submenu'))== 'cetak-barang_keluar-form' ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon text-purple"></i>
                  <p>Cetak Barang Keluar</p>
                </a>
              </li>
          </ul>
      </li>

      <li class="nav-item menu-open">
          <a href="{{route('logout')}}" onclick="return confirm('Yakin ingin Keluar?')" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
                <p>Keluar</p>
          </a>
      </li>
      </ul> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>