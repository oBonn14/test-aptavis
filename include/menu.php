<ul class="app-menu">
  <li class="menu-separator">
    <hr>
  </li>
  <li<?php if ($_GET['hal'] == 'main') {
        echo ' class="active"';
      } ?>>
    <a href="?hal=main">
      <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
      <span class="menu-text">Dashboard</span>
    </a>
    </li>

    <ul class="app-menu">
      <li class="menu-separator">
        <hr>
      </li>
      <li<?php if ($_GET['hal'] == 'klub') {
            echo ' class="active"';
          } ?>>
        <a href="?hal=klub">
          <i class="menu-icon zmdi zmdi-balance zmdi-hc-lg"></i>
          <span class="menu-text">Klub</span>
        </a>
        </li>
        <ul class="app-menu">
          <li class="menu-separator">
            <hr>
          </li>
          <li<?php if ($_GET['hal'] == 'klasemen') {
                echo ' class="active"';
              } ?>>
            <a href="?hal=klasemen">
              <i class="menu-icon zmdi zmdi-accounts-list zmdi-hc-lg"></i>
              <span class="menu-text">Klasemen</span>
            </a>
            </li>
        </ul><!-- .app-menu -->