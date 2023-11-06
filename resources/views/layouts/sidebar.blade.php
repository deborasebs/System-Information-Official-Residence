<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>

          @if(Auth::user()->level == 'admin')
          <li class="nav-item {{ setActive(['rumah*', 'inventaris*','penghuni*', 'user*']) }}">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ setShow(['rumah*','inventaris*', 'penghuni*', 'user*']) }}" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['rumah*']) }}" href="{{route('rumah.index')}}">Data Rumah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['inventaris*']) }}" href="{{route('inventaris.index')}}">Data Inventaris</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ setActive(['penghuni*']) }}" href="{{route('penghuni.index')}}">Data Penghuni</a>
                </li>
                
                 <li class="nav-item">
                  <a class="nav-link {{ setActive(['user*']) }}" href="{{route('user.index')}}">Data User</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          <li class="nav-item {{ setActive(['permohonanrumah*']) }}">
            <a class="nav-link" href="{{route('permohonanrumah.index')}}">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Permohonan Rumah</span>
            </a>
          </li>
          <!-- <li class="nav-item {{ setActive(['permohonaninventaris*']) }}">
            <a class="nav-link" href="{{route('permohonaninventaris.index')}}">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title">Permohonan Inventaris</span>
            </a>
          </li>
          <li class="nav-item {{ setActive(['transaksi*']) }}">
            <a class="nav-link" href="{{route('transaksi.index')}}">
              <i class="menu-icon mdi mdi-file"></i>
              <span class="menu-title">Menu Plotting</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/trs')}}">Laporan Rumah</a>
                </li>
                <!--
                <li class="nav-item">
                  <a class="nav-link" href="">Laporan Anggota</a>
                </li>
                -->
                 <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/buku')}}">Laporan Inventaris</a>
                </li>
              </ul>
            </div>
          </li>        
        </ul>