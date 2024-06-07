<div id="header">

  <div class="header-top">
    <div class="sub-header-top">
      <div class="left-title">
        <h4>Website designed by Manh Cuong</h4>
      </div>
      <div class="list-header">
        <ul>
          <li><a href=""> Help & FAQs</a></li>
          <li><a href=""> My Account</a></li>
          <li><a href=""> EN</a></li>
          <li><a href=""> USD</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="sub-nav" id="nav" style="background: transparent; padding: 16px 0px 26px; box-shadow: none;">
    <div class="nav">
      <div class="photo-logo">
        <a href="{{ url('') }}"><img src="{{ asset('assets/client/src/img/logo.webp') }}" style="cursor: pointer;" alt="" /></a>
      </div>
      <!-- dùng thẻ nav -->
      <nav>
        <div class="list-menu">
          <ul>
            <li><a href="{{ url('') }}" id="home"> Trang chủ</a></li>
            <li><a href="{{ url('product') }}">Danh sách sản phẩm</a></li>
            <li><a href="#">Giới thiệu</a></li>
            <li><a href="{{ url('contact') }}">Liên hệ</a></li>
          </ul>
        </div>
      </nav>
      <div class="list-icon" id="list-icon">
        <div class="icons search" id="iconSearch">
          <input type="text" id="input_search" placeholder="New Product..?">
          <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div class="icons cart">
          <i class="fa-solid fa-cart-shopping"></i>
        </div>
        <div class="icons heart">
          @if (!isset($_SESSION['user']))
          <a class="btn btn-primary" href="{{ url('login') }}">Login</a>
          @endif

          @if (isset($_SESSION['user']))
          <a class="btn btn-primary" href="{{ url('logout') }}">Logout</a>
          @endif
        </div>
        <div class="toggle">
          <i class='bx bx-sun'></i>
        </div>
      </div>
    </div>
  </div>

  <div class="background">
    <img src="{{ asset('assets/client/src/img/slide1.webp') }}" alt="">
  </div>
</div>