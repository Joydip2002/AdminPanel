  <!-- Navbar Starts -->
  <nav class="navbar topnavbar navbar-expand-lg py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                    <i class="fa-solid fa-square-xmark fs-4 me-3" id="Crossbtn" style="visibility: hidden;"></i>
                     
                </div>
                      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse"
                          data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                          aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon" ></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav mx-auto gap-4 mb-lg-0">
                              <li class="position-relative">
                                  <input type="search"  placeholder="Search for anything..." class="searchbox">
                                  <i class="fa-solid fa-magnifying-glass searchicon  position-absolute" style="right: 10px; top: 15px;"></i>
                              </li>
                              <li class="nav-item mt-2 position-relative">
                                  <span>
                                    <i id="sun" onclick="light()" class="fa-solid fa-sun "></i>
                                    <i class="fa-solid fa-moon" id="moon" onclick="moon()" style="visibility: hidden;"></i>
                                  </span>
                              </li>
                              <li class="nav-item mt-2 position-relative">
                                  <span>
                                    <i class="fa-solid fa-expand" id="expend" onclick="expend()"></i>
                                    <i class="fa-solid fa-compress " id="collapsee" style="visibility: hidden;"></i>
                                  </span>
                              </li>
                              <li class="nav-item dropdown rounded">
                                  <a class="nav-link dropdown-toggle dropdown" href="#" role="button" data-bs-toggle="dropdown"
                                      aria-expanded="false" id="dropdownmenu">
                                      Dropdown
                                  </a>
                                  <ul class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li>
                                          <hr class="dropdown-divider">
                                      </li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item mt-2">
                                  <i class="fa-solid gearicon fa-gear" id="gear" onclick="openNavr()"></i>
                              </li>
                          </ul>
                      </div>
            </nav>
            <!-- Navbar Ends -->