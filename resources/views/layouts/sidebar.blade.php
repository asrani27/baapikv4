
<section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ (request()->is('superadmin')) ? 'active' : '' }}"><a href="/superadmin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
    <li class="{{ (request()->is('superadmin/pasien*')) ? 'active' : '' }}"><a href="/superadmin/pasien"><i class="fa fa-users"></i> <span>Pasien</span></a></li>
    <li class="{{ (request()->is('superadmin/pendaftaran*')) ? 'active' : '' }}"><a href="/superadmin/pendaftaran"><i class="fa fa-user-plus"></i> <span>Pendaftaran</span></a></li>
    <li class="{{ (request()->is('superadmin/pelayanan*')) ? 'active' : '' }}"><a href="/superadmin/pelayanan"><i class="fa fa-stethoscope"></i> <span>Pelayanan</span>
      <span class="pull-right-container">
        {{-- @if (pelayananBaru() == 0)
            
        @else
        <small class="label pull-right bg-red">{{pelayananBaru()}}</small>
        @endif --}}
    </span>
    </a></li>
    <li class="{{ (request()->is('superadmin/rekam-medis*')) ? 'active' : '' }}"><a href="/superadmin/rekam-medis"><i class="fa fa-search-plus"></i> <span>Rekam Medis</span></a></li>
    {{-- <li class="{{ (request()->is('superadmin/manajemen-obat*')) ? 'active' : '' }} treeview">
      <a href="#">
        <i class="fa fa-medkit"></i> <span>Manajemen Obat</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ (request()->is('superadmin/manajemen-obat/obat')) ? 'active' : '' }}"><a href="/superadmin/manajemen-obat/obat"><i class="fa fa-circle-o"></i> Data Obat</a></li>
        <li class="{{ (request()->is('superadmin/manajemen-obat/masuk')) ? 'active' : '' }}"><a href="/superadmin/manajemen-obat/masuk"><i class="fa fa-circle-o"></i> Obat Masuk</a></li>
        <li class="{{ (request()->is('superadmin/manajemen-obat/keluar')) ? 'active' : '' }}"><a href="/superadmin/manajemen-obat/keluar"><i class="fa fa-circle-o"></i> Obat Keluar</a></li>
      </ul>
    </li>
    <li class="{{ (request()->is('superadmin/laporan*')) ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-clipboard"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (request()->is('superadmin/laporan/lb1')) ? 'active' : '' }}"><a href="/superadmin/laporan/lb1"><i class="fa fa-circle-o"></i> LB 1</a></li>
          <li class="{{ (request()->is('superadmin/laporan/lb2')) ? 'active' : '' }}"><a href="/superadmin/laporan/lb2"><i class="fa fa-circle-o"></i> LB 2</a></li>
          <li class="{{ (request()->is('superadmin/laporan/lb3')) ? 'active' : '' }}"><a href="/superadmin/laporan/lb3"><i class="fa fa-circle-o"></i> LB 3</a></li>
          <li class="{{ (request()->is('superadmin/laporan/lb4')) ? 'active' : '' }}"><a href="/superadmin/laporan/lb4"><i class="fa fa-circle-o"></i> LB 4</a></li>
        </ul>
    </li> --}}

    <li class="{{ (request()->is('superadmin/data*')) ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>Data Utama</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (request()->is('superadmin/data/diagnosa')) ? 'active' : '' }}"><a href="/superadmin/data/diagnosa"><i class="fa fa-circle-o"></i> Diagnosa</a></li>
          <li class="{{ (request()->is('superadmin/data/dokter')) ? 'active' : '' }}"><a href="/superadmin/data/dokter"><i class="fa fa-circle-o"></i> Dokter</a></li>
          <li class="{{ (request()->is('superadmin/data/kesadaran')) ? 'active' : '' }}"><a href="/superadmin/data/kesadaran"><i class="fa fa-circle-o"></i> Kesadaran</a></li>
          <li class="{{ (request()->is('superadmin/data/poli')) ? 'active' : '' }}"><a href="/superadmin/data/poli"><i class="fa fa-circle-o"></i> Ruang/Poli</a></li>
          <li class="{{ (request()->is('superadmin/data/provider')) ? 'active' : '' }}"><a href="/superadmin/data/provider"><i class="fa fa-circle-o"></i> Provider</a></li>
          <li class="{{ (request()->is('superadmin/data/status-pulang')) ? 'active' : '' }}"><a href="/superadmin/data/status-pulang"><i class="fa fa-circle-o"></i> status pulang</a></li>
          <li class="{{ (request()->is('superadmin/data/spesialis')) ? 'active' : '' }}"><a href="/superadmin/data/spesialis"><i class="fa fa-circle-o"></i> Spesialis</a></li>
          <li class="{{ (request()->is('superadmin/data/sarana')) ? 'active' : '' }}"><a href="/superadmin/data/sarana"><i class="fa fa-circle-o"></i> Sarana</a></li>
          <li class="{{ (request()->is('superadmin/data/khusus')) ? 'active' : '' }}"><a href="/superadmin/data/khusus"><i class="fa fa-circle-o"></i> Khusus</a></li>
          <li class="{{ (request()->is('superadmin/data/tindakan')) ? 'active' : '' }}"><a href="/superadmin/data/tindakan"><i class="fa fa-circle-o"></i> Tindakan</a></li>
        </ul>
    </li>
    <li class="{{ (request()->is('superadmin/setting*')) ? 'active' : '' }} treeview">
        <a href="#">
          <i class="fa fa-gears"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="{{ (request()->is('superadmin/setting/akun-bridging')) ? 'active' : '' }}"><a href="/superadmin/setting/akun-bridging"><i class="fa fa-circle-o"></i> Akun Bridging</a></li>
          <li class="{{ (request()->is('superadmin/setting/manajemen-user')) ? 'active' : '' }}"><a href="/superadmin/setting/manajemen-user"><i class="fa fa-circle-o"></i> Manajemen User</a></li>
          <li class="{{ (request()->is('superadmin/setting/gantipassword')) ? 'active' : '' }}"><a href="/superadmin/setting/gantipassword"><i class="fa fa-circle-o"></i> Ganti Password</a></li>
        </ul>
    </li>
    <li class="{{ (request()->is('superadmin/logbridging*')) ? 'active' : '' }}"><a href="/superadmin/logbridging"><i class="fa fa-history"></i> <span>Log Bridging</span></a></li>
    <li class="{{ (request()->is('superadmin/manualbook*')) ? 'active' : '' }}"><a href="/superadmin/manualbook"><i class="fa fa-book"></i> <span>Manual Book</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
</section>