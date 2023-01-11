<div class="page">
    <header class="page-head">
      <div class="rd-navbar-wrap">
        <nav class="rd-navbar rd-navbar-default" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
          <div class="rd-navbar-inner">
            <div class="rd-navbar-aside-wrap">
              <div class="rd-navbar-aside">
                <div class="rd-navbar-aside-toggle" data-rd-navbar-toggle=".rd-navbar-aside"><span></span></div>
                <div class="rd-navbar-aside-content">
                  <ul class="rd-navbar-aside-group list-units">
                    <li>
                      <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary material-icons-phone"></span></div>
                        <div class="unit-body"><a class="link-dusty-gray" href="tel:#">+959 400 58 4721</a></div>
                      </div>
                    </li>
                    <li>
                      <div class="unit unit-horizontal unit-spacing-xs align-items-center">
                        <div class="unit-left"><span class="novi-icon icon icon-xxs icon-primary fa-envelope-o"></span></div>
                        <div class="unit-body"><a class="link-dusty-gray" href="mailto:#">yanant.myanmar@gmail.com</a></div>
                      </div>
                    </li>
                  </ul>
                  <div class="rd-navbar-aside-group">
                    <ul class="list-inline list-inline-reset">
                      <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-facebook" href="#"></a></li>
                      <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-twitter" href="#"></a></li>
                      <li><a class="novi-icon icon icon-circle icon-nobel-filled icon-xxs-smaller fa fa-google-plus" href="#"></a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="rd-navbar-group">
              <div class="rd-navbar-panel">
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <a class="rd-navbar-brand brand" href="{{route('frontend.home')}}"><img src="images/logo.jpg" alt="" width="50" height="50"/></a>
              </div>
              <div>
                <p style="color: black! imporant;">Yanant Myanmar</p>
              </div>
              <div class="rd-navbar-nav-wrap">
                <div class="rd-navbar-nav-inner">
                  <div class="rd-navbar-btn-wrap"><a class="button button-smaller button-primary-outline" href="#">Appointment</a></div>
                  <ul class="rd-navbar-nav">
                    <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{route('frontend.home')}}">Home</a>
                    </li>
                    <li class="{{ (request()->is('about-us')) ? 'active' : '' }}"><a href="{{route('frontend.about')}}">About Us</a>
                    </li>
                    <li><a href="typography.html">Typography</a>
                    </li>
                    <li><a href="typography.html">Products</a>
                    </li>
                    <li><a href="contact-us.html">Contacts</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
