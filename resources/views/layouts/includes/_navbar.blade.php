<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-semi-dark navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mobile-menu d-lg-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa fa-list font-large-1"></i></a></li>
        <li class="nav-item mr-auto"><a class="navbar-brand" href="">
          <!-- <img class="brand-logo" alt="stack admin logo" src=""> -->
            <h2 class="brand-text">Nekosuki</h2></a></li>
        <li class="nav-item d-none d-lg-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="fa fa-toggle-on icon-toggle-right font-medium-3 white" data-ticon="icon-toggle-right"></i></a></li>
        <li class="nav-item d-lg-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
      </ul>
    </div>
    <div class="navbar-container content">
      <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="icon-frame"></i></a></li>
          <!-- Untuk Input search Coming Soon! >_!-->
        </ul>
        <ul class="nav navbar-nav float-right">
          <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="icon-bell"></i><span class="badge badge-pill badge-danger badge-up">1</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
              <li class="dropdown-menu-header">
                <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifikasi</span><span class="notification-tag badge badge-danger float-right m-0">1 Baru</span></h6>
              </li>
              <li class="scrollable-container media-list"><a href="javascript:void(0)">
                  <div class="media">
                    <div class="media-left align-self-center"><i class="icon-envelope icon-bg-circle bg-cyan"></i></div>
                    <div class="media-body">
                      <h6 class="media-heading">You have new order!</h6>
                      <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                        <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                    </div>
                  </div></a>
              <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Lihat Semua Notifikasi</a></li>
            </ul>
          </li> -->
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <span class="user-name" style="margin-top: 10px;">{{ auth()->user()->nama }}</span></a>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="{{ route('ganti.ks', auth()->user()->id) }}"><i class="icon-lock"></i> Ganti Kata Sandi</a>
              <div class="dropdown-divider"></div><a class="dropdown-item" href="{{ route('keluar') }}"><i class="icon-power"></i> Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>