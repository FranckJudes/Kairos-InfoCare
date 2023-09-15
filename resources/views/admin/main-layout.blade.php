<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin - Dashboard</title>
  <link rel="stylesheet" href="{{asset('assets/Toastr/toastr.min.css')}}">
  <!-- General CSS Files -->
  {{-- Ajouter les liens --}}
  @yield('HeadLink')
  {{--  --}}
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user"> 

            <img alt="choisir la langue" src="{{ App::getLocale() == 'en' ? asset('assets/bundles/flag-icon-css/flags/4x3/gb.svg') : asset('assets/bundles/flag-icon-css/flags/4x3/fr.svg') }}" class="user-img-radious-style user-icon">
            <span class="d-sm-none d-lg-inline-block"></span></a>
          <div class="dropdown-menu dropdown-menu-right pullDown">
            <a href="{{url('locale/en')}}" class="dropdown-item has-icon" id="lang-en"> <img class="img-fluid" src="{{asset('assets/bundles/flag-icon-css/flags/4x3/gb.svg')}}" alt="United Kingdom Flag" style="width: 30px; height:30px">&nbsp;{{__('main.anglais')}}
           <a href="{{url('locale/fr')}}" class="dropdown-item has-icon" id="lang-fr"> <img class="img-fluid" src="{{asset('assets/bundles/flag-icon-css/flags/4x3/fr.svg')}}" style="width: 30px; height:30px" alt="France Flag">&nbsp;{{__('main.francais')}}</a>
        </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"  class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('assets/img/user.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
             <a href="#" class="dropdown-item has-icon"><i class="material-icons">settings</i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{url('login')}}" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('assets/img/logo.png')}}"  class="header-logo" /> <span
                class="logo-name">Otika</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="{{url('/dashboard')}}" class="nav-link"><span><i class="material-icons">home</i>{{__('main.acceuil')}}</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i class="material-icons">perm_contact_calendar</i><span>Agenda</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ url('agenda')}}"><i class="fas fa-calendar-alt"></i>{{__('main.agenda')}}</a></li>
              </ul>
            </li>
          </li>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown">
              <i class="material-icons">person</i><span>{{__('main.patients')}}</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url('patient')}}">{{__('main.patients')}}</a></li>
            </ul>
          </li>
            {{--  --}}
              <li class="menu-header">Administration</li>
            {{--  --}}
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i class="material-icons">security</i>
              <span>{{__('main.securite')}}</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url ('GroupeUtilisateur')}}"><i class="material-icons">group</i>{{__('main.GroupeUtilisateur')}}</a></li>
              <li><a class="nav-link" href="{{ url ('Utilisateur')}}"><i class="material-icons">person</i> {{__('main.utilisateur')}}</a></li>
              <li><a class="nav-link" href="{{ url ('/')}}"><i class="material-icons">history</i>{{__('main.historique')}}</a></li>


            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                data-feather="shopping-bag"></i><span>{{__('main.configuration')}}</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ url ('entites')}}">{{__('main.entites')}}</a></li>
              <li><a class="nav-link" href="{{ url ('classement')}}"><i class="material-icons">equalizer</i>{{__('main.PlandeClassement')}}</a></li>

            </ul>
          </li>
            <li class="menu-header">{{__('main.parametres')}}</li>
            <li>
              <a class="nav-link" href="{{url('/settings')}}"><i class="material-icons">settings</i><span>{{__('main.parametres')}} </span></a>
            </li>
                    
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
               @yield('content')
          </div>
        </section>
        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="#">Kairos &copy; Copyright</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script src="{{asset('assets/Toastr/jquery.min.js')}}"></script>
  <script src="{{asset('assets/Toastr/toastr.min.js')}}"></script>
  {!! Toastr::message() !!}
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>  
    {{-- Ajouter les liens --}}
    @yield('FootLink')
    {{--  --}}
    `

</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>