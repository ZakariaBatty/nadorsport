  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
          <!-- Menu -->
          <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
              <div class="app-brand demo">
                  <a href="<?php echo BASE_URL; ?>" class="app-brand-link">
                      <span class="app-brand-logo demo">
                          <img src="assets/img/LogoNadirSport .png" alt="" class="img-fluid" style="width: 47%; padding: 13px">
                      </span>
                  </a>

                  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                      <i class="bx bx-chevron-left bx-sm align-middle"></i>
                  </a>
              </div>

              <div class="menu-inner-shadow"></div>

              <ul class="menu-inner py-1">
                  <!-- Dashboard -->
                  <li class="menu-item active">
                      <a href="<?php echo BASE_URL; ?>c-panel" class="menu-link">
                          <i class="menu-icon tf-icons bx bx-home-circle"></i>
                          <div data-i18n="Analytics">Admin panel</div>
                      </a>
                  </li>

                  <!-- Layouts -->
                  <li class="menu-header small text-uppercase">
                      <span class="menu-header-text">Settings</span>
                  </li>
                  <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                          <i class="menu-icon tf-icons bx bx-dock-top"></i>
                          <div data-i18n="Account Settings">Account Settings</div>
                      </a>
                      <ul class="menu-sub">
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>account" class="menu-link">
                                  <div data-i18n="Account">Account</div>
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="?Account=true" class="menu-link">
                                  <div data-i18n="Notifications">Change password</div>
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="?Account=true" class="menu-link">
                                  <div data-i18n="Connections">Connections</div>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-header small text-uppercase">
                      <span class="menu-header-text">Terrain</span>
                  </li>
                  <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                          <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                          <div data-i18n="Authentications">Terrain</div>
                      </a>
                      <ul class="menu-sub">
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>ajouter-terrain" class="menu-link">
                                  <div data-i18n="Basic">Ajouter</div>
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>reservation" class="menu-link">
                                  <div data-i18n="Basic">Réservation</div>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-header small text-uppercase">
                      <span class="menu-header-text">client</span>
                  </li>
                  <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                          <i class="menu-icon tf-icons bx bx-user"></i>
                          <div data-i18n="Authentications">les client</div>
                      </a>
                      <ul class="menu-sub">
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>clients" class="menu-link">
                                  <div data-i18n="Basic">les clients</div>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="menu-header small text-uppercase">
                      <span class="menu-header-text">Pages</span>
                  </li>
                  <li class="menu-item">
                      <a href="javascript:void(0);" class="menu-link menu-toggle">
                          <i class="menu-icon tf-icons bx bx-page"></i>
                          <div data-i18n="Authentications">pages site web</div>
                      </a>
                      <ul class="menu-sub">
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>" class="menu-link" target="_blank">
                                  <div data-i18n="Basic">Acceuil</div>
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>#booking_calendar" class="menu-link" target="_blank">
                                  <div data-i18n="Basic">Calendrier</div>
                              </a>
                          </li>
                          <li class="menu-item">
                              <a href="<?php echo BASE_URL; ?>contact" class="menu-link" target="_blank">
                                  <div data-i18n="Basic">Contact</div>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </aside>
          <!-- / Menu -->
          <!-- Layout container -->
          <div class="layout-page">
              <!-- Navbar -->
              <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                          <i class="bx bx-menu bx-sm"></i>
                      </a>
                  </div>

                  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                      <ul class="navbar-nav flex-row align-items-center ms-auto">
                          <!-- Place this tag where you want the button to render. -->
                          <!-- User -->
                          <li class="nav-item navbar-dropdown dropdown-user dropdown">
                              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                  <div class="avatar avatar-online">
                                      <img src="assets/img/LogoNadirSport 1.png" alt class="w-px-40 h-auto rounded-circle" />
                                  </div>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                      <a class="dropdown-item" href="#">
                                          <div class="d-flex">
                                              <div class="flex-shrink-0 me-3">
                                                  <div class="avatar avatar-online">
                                                      <img src="assets/img/LogoNadirSport 1.png" alt class="w-px-40 h-auto rounded-circle" />
                                                  </div>
                                              </div>
                                              <div class="flex-grow-1">
                                                  <span class="fw-semibold d-block">nador sport</span>
                                                  <small class="text-muted">Admin</small>
                                              </div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <div class="dropdown-divider"></div>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="#">
                                          <i class="bx bx-user me-2"></i>
                                          <span class="align-middle">My Account</span>
                                      </a>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="#">
                                          <i class="bx bx-cog me-2"></i>
                                          <span class="align-middle">Settings</span>
                                      </a>
                                  </li>
                                  <li>
                                      <div class="dropdown-divider"></div>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="auth-login-basic.html">
                                          <i class="bx bx-power-off me-2"></i>
                                          <span class="align-middle">Déconnecte</span>
                                      </a>
                                  </li>
                              </ul>
                          </li>
                          <!--/ User -->
                      </ul>
                  </div>
              </nav>
              <!-- star Content-->