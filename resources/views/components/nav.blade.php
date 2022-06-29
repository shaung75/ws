<nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
  <ul class="app-menu list-unstyled accordion" id="menu-accordion">
    <li class="nav-item">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a class="nav-link active" href="/">
        <span class="nav-icon">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-house-door"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"
            />
            <path
              fill-rule="evenodd"
              d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"
            />
          </svg>
        </span>
        <span class="nav-link-text">Dashboard</span> </a
      ><!--//nav-link-->
    </li>
    <!--//nav-item-->
    <li class="nav-item has-submenu">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a
        class="nav-link submenu-toggle"
        href="#"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-clients"
        aria-expanded="false"
        aria-controls="submenu-clients"
      >
        <span class="nav-icon">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-people"
            viewBox="0 0 16 16"
          >
            <path
              d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"
            />
          </svg>
        </span>
        <span class="nav-link-text">Clients</span>
        <span class="submenu-arrow">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-chevron-down"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            />
          </svg> </span
        ><!--//submenu-arrow--> </a
      ><!--//nav-link-->
      <div
        id="submenu-clients"
        class="collapse submenu submenu-clients"
        data-bs-parent="#menu-accordion"
      >
        <ul class="submenu-list list-unstyled">
          <li class="submenu-item">
            <a class="submenu-link" href="/clients">List clients</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/clients/create">Add client</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item has-submenu">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a
        class="nav-link submenu-toggle"
        href="#"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-pianos"
        aria-expanded="false"
        aria-controls="submenu-pianos"
      >
        <span class="nav-icon">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-bar-chart"
            viewBox="0 0 16 16"
          >
            <path
              d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z"
            />
          </svg>
        </span>
        <span class="nav-link-text">Pianos</span>
        <span class="submenu-arrow">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-chevron-down"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            />
          </svg> </span
        ><!--//submenu-arrow--> </a
      ><!--//nav-link-->
      <div
        id="submenu-pianos"
        class="collapse submenu submenu-pianos"
        data-bs-parent="#menu-accordion"
      >
        <ul class="submenu-list list-unstyled">
          <li class="submenu-item">
            <a class="submenu-link" href="/pianos">List pianos (All)</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/pianos/assigned">List pianos (Assigned)</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/pianos/unassigned">List pianos (Unassigned)</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/manufacturers">Manufacturers</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/pianos/create"><strong>Add piano</strong></a>
          </li>          
        </ul>
      </div>
    </li>
    <!--//nav-item-->
    <li class="nav-item has-submenu">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a
        class="nav-link submenu-toggle"
        href="#"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-services"
        aria-expanded="false"
        aria-controls="submenu-services"
      >
        <span class="nav-icon">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
            <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
          </svg>
        </span>
        <span class="nav-link-text">Services</span>
        <span class="submenu-arrow">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-chevron-down"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            />
          </svg> </span
        ><!--//submenu-arrow--> </a
      ><!--//nav-link-->
      <div
        id="submenu-services"
        class="collapse submenu submenu-services"
        data-bs-parent="#menu-accordion"
      >
        <ul class="submenu-list list-unstyled">
          <li class="submenu-item">
            <a class="submenu-link" href="/services">List services</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/types">Service types</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/services/create">Add service</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item has-submenu">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a
        class="nav-link submenu-toggle"
        href="#"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-appointments"
        aria-expanded="false"
        aria-controls="submenu-appointments"
      >
        <span class="nav-icon">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
					  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
					  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
					</svg>
        </span>
        <span class="nav-link-text">Appointments</span>
        <span class="submenu-arrow">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-chevron-down"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            />
          </svg> </span
        ><!--//submenu-arrow--> </a
      ><!--//nav-link-->
      <div
        id="submenu-appointments"
        class="collapse submenu submenu-appointments"
        data-bs-parent="#menu-accordion"
      >
        <ul class="submenu-list list-unstyled">
          <li class="submenu-item">
            <a class="submenu-link" href="/appointments">List appointments</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/appointments">Add appointment</a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item has-submenu">
      <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
      <a
        class="nav-link submenu-toggle"
        href="#"
        data-bs-toggle="collapse"
        data-bs-target="#submenu-invoices"
        aria-expanded="false"
        aria-controls="submenu-invoices"
      >
        <span class="nav-icon">
          <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
					  <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
					  <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
					</svg>
        </span>
        <span class="nav-link-text">Invoices</span>
        <span class="submenu-arrow">
          <svg
            width="1em"
            height="1em"
            viewBox="0 0 16 16"
            class="bi bi-chevron-down"
            fill="currentColor"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              fill-rule="evenodd"
              d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"
            />
          </svg> </span
        ><!--//submenu-arrow--> </a
      ><!--//nav-link-->
      <div
        id="submenu-invoices"
        class="collapse submenu submenu-invoices"
        data-bs-parent="#menu-accordion"
      >
        <ul class="submenu-list list-unstyled">
          <li class="submenu-item">
            <a class="submenu-link" href="/invoices">List invoices</a>
          </li>
          <li class="submenu-item">
            <a class="submenu-link" href="/invoices/add">Add invoice</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
  <!--//app-menu-->
</nav>
<!--//app-nav-->
