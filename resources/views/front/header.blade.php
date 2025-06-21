<header id="impx-header">
   <div>
      <div class="impx-menu-wrapper style2" data-uk-sticky="top: .impx-slide-container; animation: uk-animation-slide-top">
         <div id="mobile-nav" data-uk-offcanvas="mode: push; overlay: true">
            <div class="uk-offcanvas-bar">
               <ul class="uk-nav uk-nav-default">
                  <li class="uk-parent uk-active">
                     <a href="{{ url('/') }}">Home</a>
                  </li>
                  <li class="uk-parent">
                     <a href="{{ route('rooms') }}" class="uk-navbar-nav-subtitle">Rooms</a>
                  </li>
                  <li><a href="{{ route('restaurant') }}">Restaurant</a></li>
                  <li><a href="{{ route('ask-ai') }}">AI Search</a></li>
               </ul>
            </div>
         </div>
         <a href="#mobile-nav" class="uk-hidden@xl uk-hidden@l uk-hidden@m mobile-nav" data-uk-toggle="target: #mobile-nav"><i class="fa fa-bars"></i>Menu</a>
         <!-- Mobile Nav End -->
         <!-- Top Header -->
         <div class="impx-top-header style2">
            <div class="uk-container uk-container-expand">
               <div class="uk-grid">
                  <!-- header phone -->
                  <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                     <div class="impx-top-phone">
                        <p><i class="fa fa-phone"></i> Phone : +60164365793</p>
                     </div>
                  </div>
                  <!-- header phone end-->
                  <!-- header social media -->
                  <!-- <div class="uk-width-1-2@xl uk-width-1-2@l uk-width-1-2@m uk-width-1-1@s">
                     <div class="impx-top-social">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook-f"></i>Facebook</a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                        </ul>
                     </div>
                  </div> -->
                  <!-- header social media end -->
               </div>
            </div>
         </div>
         <!-- Top Header End -->
         <div class="uk-container uk-container-expand">
            <div data-uk-grid>
               <!-- Header Logo -->
               <div class="uk-width-auto">
                  <div class="impx-logo">
                     <a href="{{ url('/') }}">
                        <div class="logo" style="font-family: 'Arial', sans-serif; font-size: 36px; font-weight: 700; color: #333; letter-spacing: 2px; text-transform: uppercase; position: relative; display: inline-block;">
                           <span style="color: #31a9a9;">MILK</span><span style="color: #f8b195;">Y</span>
                           <div style="height: 4px; width: 100%; background: linear-gradient(90deg, #4a90e2, #f8b195); margin-top: 5px;"></div>
                        </div>
                     </a>
                  </div>
               </div>
               <!-- Header Logo End-->
               <!-- Header Navigation -->
               <div class="uk-width-expand uk-position-relative">
                  <nav class="uk-navbar-container uk-navbar-transparent uk-visible@s uk-visible@m" data-uk-navbar>
                     <div class="uk-navbar-right impx-navbar-right">
                        <ul class="uk-navbar-nav impx-nav style2">
                           <!-- Navigation Items -->
                           <li class="uk-parent uk-active">
                              <a href="{{url('/')}}" class="uk-navbar-nav-subtitle">
                                 <div>
                                    Home
                                    <div class="uk-navbar-subtitle">Welcome</div>
                                 </div>
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('rooms') }}" class="uk-navbar-nav-subtitle">
                                 <div>
                                    Rooms
                                    <div class="uk-navbar-subtitle">Our Best Suites</div>
                                 </div>
                              </a>
                              <!-- <div class="uk-navbar-dropdown uk-navbar-dropdown-width-4 impx-megamenu" data-uk-drop="boundary: .impx-navbar-right; boundary-align: true; pos: bottom-justify;">
                                 <div class="uk-navbar-dropdown-grid uk-child-width-1-4" data-uk-grid>
                                    <div>
                                       <ul class="uk-nav uk-navbar-dropdown-nav">
                                          <li class="uk-nav-header uk-text-bold">Rooms Page Style 1</li>
                                          <li>
                                             <a href="rooms1.html"><img src="images/rooms/room-menu-1.jpg" alt=""></a>
                                             <p class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">emper enim ita adsumit aliquid, quae dederit non</p>
                                             <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border" href="rooms1.html">Visit Page</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div>
                                       <ul class="uk-nav uk-navbar-dropdown-nav">
                                          <li class="uk-nav-header uk-text-bold">Rooms Page Style 2</li>
                                          <li>
                                             <a href="rooms2.html"><img src="images/rooms/room-menu-2.jpg" alt=""></a>
                                             <p class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">emper enim ita adsumit aliquid, quae dederit non</p>
                                             <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border" href="rooms2.html">Visit Page</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div>
                                       <ul class="uk-nav uk-navbar-dropdown-nav">
                                          <li class="uk-nav-header uk-text-bold">Rooms Page Style 3</li>
                                          <li>
                                             <a href="rooms3.html"><img src="images/rooms/room-menu-3.jpg" alt=""></a>
                                             <p class="uk-margin-small-bottom uk-margin-small-top impx-hidden-m">emper enim ita adsumit aliquid, quae dederit non</p>
                                             <a class="uk-button uk-button-default uk-button-small impx-button impx-button-outline aqua small small-border" href="rooms3.html">Visit Page</a>
                                          </li>
                                       </ul>
                                    </div>
                                    <div>
                                       <div>
                                          <ul class="uk-nav uk-navbar-dropdown-nav">
                                             <li class="uk-nav-header uk-margin-small-bottom uk-text-bold">Room Detail Page</li>
                                             <li>
                                                <div class="uk-grid-small" data-uk-grid>
                                                   <div class="uk-width-auto">
                                                      <i class="fa fa-check-square-o fa-05x circle impx-text-aqua border-aqua uk-margin-remove uk-visible@m"></i>
                                                   </div>
                                                   <div class="uk-width-expand">
                                                      <p class="uk-margin-remove uk-visible@s impx-hidden-m">Sin tantum modo ad indicia veteris</p>
                                                      <a href="room-detail.html">Room Detail 1 &raquo;</a>
                                                   </div>
                                                </div>
                                                <div class="uk-grid-small" data-uk-grid>
                                                   <div class="uk-width-auto">
                                                      <i class="fa fa-check-square-o fa-05x circle impx-text-aqua border-aqua uk-margin-remove uk-visible@m"></i>
                                                   </div>
                                                   <div class="uk-width-expand">
                                                      <p class="uk-margin-remove uk-visible@s impx-hidden-m">Sin tantum modo ad indicia veteris</p>
                                                      <a href="room-detail2.html" class="uk-margin-small-top">Room Detail 2 &raquo;</a>
                                                   </div>
                                                </div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div> -->
                           </li>
                           <li>
                              <a href="{{ route('restaurant') }}">
                                 <div>
                                    Restaurant
                                    <div class="uk-navbar-subtitle">In-house Restaurant</div>
                                 </div>
                              </a>
                           </li>
                           <li>
                              <a href="{{ route('ask-ai') }}" class="uk-navbar-nav-subtitle">
                                 <div>
                                    AI Search
                                    <div class="uk-navbar-subtitle">Reservation through AI</div>
                                 </div>
                              </a>
                           </li>
                           <li>
                              <a href="#" onclick="toggleSearchBar(event)">
                                 <i class="fa fa-search"></i>
                              </a>
                           </li>

                        </ul>
                        <!-- Navigation Items End -->
                     </div>
                  </nav>
               </div>
               <!-- Header Navigation End -->
               <!-- Promo Ribbon -->
               <div class="uk-width-auto uk-position-relative">
                  <div class="ribbon">
                     <i><span><s></s>30% <span>Off!</span><s></s></span></i>
                  </div>
               </div>
               <!-- Promo Ribbon End -->
               <div id="fullscreen-search" class="uk-position-fixed uk-position-top uk-position-z-index uk-background-muted uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-height-1-1" style="display: none; z-index: 9999;">
                  <div class="uk-container uk-container-small">
                     <form action="{{ route('search') }}" method="GET" class="uk-margin-bottom">
                           <input id="search-input" class="uk-input uk-width-1-1 uk-form-large" type="text" name="query" placeholder="Search rooms..." autocomplete="off">
                     </form>

                     {{-- Results container --}}
                     <div id="search-results" class="uk-margin-top"></div>

                     <button class="uk-button uk-button-danger uk-margin-top" onclick="toggleSearchBar(event)">Close</button>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </div>
</header>
