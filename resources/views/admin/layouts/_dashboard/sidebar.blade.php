<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="index.html" class="app-brand-link">
      <span class="app-brand-logo demo">

      </span>
      <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">Kost<br>kostan</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>



  <ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item">
      <a href="" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Analytics">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Konten</span>
    </li>
    @can('delete-blog-posts')
    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-carousel"></i>
        <div data-i18n="Layouts">Slider</div>
      </a>
      <ul class="menu-sub ">
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
    @endcan

    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx bx-globe"></i>
        <div data-i18n="Layouts">Rumah</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="{{route('house.index')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="{{route('house.create')}}" class="menu-link">
            <div data-i18n="Without navbar">Tambah</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx bx-globe"></i>
        <div data-i18n="Layouts">Kamar</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="{{route('room.all')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Tambah</div>
          </a>
        </li>
      </ul>
    </li>


    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bxs-compass"></i>
        <div data-i18n="Layouts">Daftar Penghuni</div>
      </a>
      <ul class="menu-sub ">
        <li class="menu-item ">
          <a href="{{route('customer.index')}}" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Tambah</div>
          </a>
        </li>
      </ul>
    </li>

    {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-globe"></i>
        <div data-i18n="Layouts">Destinasi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
    <div data-i18n="Without menu">List</div>
    </a>
    </li>
    <li class="menu-item">
      <a href="" class="menu-link">
        <div data-i18n="Without navbar">Create</div>
      </a>
    </li>
  </ul>
  </li> --}}
    {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-globe"></i>
        <div data-i18n="Layouts">Negara</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
  <div data-i18n="Without menu">List</div>
  </a>
  </li>
  <li class="menu-item">
    <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
    </a>
  </li>
  </ul>
  </li>--}}

    {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bxs-business"></i>
        <div data-i18n="Layouts">Kota</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
  <div data-i18n="Without menu">List</div>
  </a>
  </li>
  <li class="menu-item">
    <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
    </a>
  </li>
  </ul>
  </li> --}}



    <li class="menu-item   ">

      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="<aside id=" layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
              <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">T'Bliss</span>
              </a>

              <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
              </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">

              @can('delete-blog-posts')
              <li class="menu-item   ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bx-carousel"></i>
                  <div data-i18n="Layouts">Slider</div>
                </a>
                <ul class="menu-sub ">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>
                </ul>
              </li>
              @endcan

              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bx bx-globe"></i>
                  <div data-i18n="Layouts">Trip</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bxs-compass"></i>
                  <div data-i18n="Layouts">Destinasi</div>
                </a>
                <ul class="menu-sub ">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>
                </ul>
              </li>

              {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-globe"></i>
        <div data-i18n="Layouts">Destinasi</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
    <div data-i18n="Without menu">List</div>
    </a>
    </li>
    <li class="menu-item">
      <a href="" class="menu-link">
        <div data-i18n="Without navbar">Create</div>
      </a>
    </li>
  </ul>
  </li> --}}
              {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bx-globe"></i>
        <div data-i18n="Layouts">Negara</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
  <div data-i18n="Without menu">List</div>
  </a>
  </li>
  <li class="menu-item">
    <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
    </a>
  </li>
  </ul>
  </li>--}}

              {{--<li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon bx bxs-business"></i>
        <div data-i18n="Layouts">Kota</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
  <div data-i18n="Without menu">List</div>
  </a>
  </li>
  <li class="menu-item">
    <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
    </a>
  </li>
  </ul>
  </li> --}}



              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bx-diamond"></i>
                  <div data-i18n="Layouts">Hidden Gems/Aktivitas</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>
                </ul>
              </li>


              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bx-hash"></i>
                  <div data-i18n="Layouts">Hashtag</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>
                </ul>
              </li>

              {{-- <li class="menu-item ">
  <a href="javascript:void(0);" class="menu-link menu-toggle">
    <i class="menu-icon bx bx-news"></i>
    <div data-i18n="Layouts">News</div>
  </a>
  <ul class="menu-sub">
    <li class="menu-item ">
      <a href="" class="menu-link">
        <div data-i18n="Without menu">List</div>
      </a>
    </li>
    <li class="menu-item ">
      <a href="" class="menu-link">
        <div data-i18n="Without navbar">Create</div>
      </a>
    </li>
  </ul>
  </li> --}}


              <li class="menu-header small text-uppercase">
                <span class="menu-header-text">User</span>
              </li>
              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon bx bx bx-globe"></i>
                  <div data-i18n="Layouts">Payment</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>
                  {{--
        <li class="menu-item">
          <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
      </a>
  </li>
  --}}
                </ul>
              </li>

              {{--
    <li class="menu-item ">
      <a href="" class="menu-link">
  <i class="menu-icon tf-icons bx bx-group"></i>
  <div data-i18n="Tables">User</div>
  </a>
  </li>
  --}}
              {{--
    <li class="menu-header small text-uppercase"><span class="menu-header-text">Settings</span></li>
    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Layouts">Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
  
    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bxs-category"></i>
        <div data-i18n="Layouts">Categories</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
  <div data-i18n="Without menu">List</div>
  </a>
  </li>
  <li class="menu-item">
    <a href="" class="menu-link">
      <div data-i18n="Without navbar">Create</div>
    </a>
  </li>
  </ul>
  </li>

  <li class="menu-item  ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bxl-tiktok"></i>
      <div data-i18n="Layouts">Sosmed</div>
    </a>
    <ul class="menu-sub">
      <li class="menu-item ">
        <a href="" class="menu-link">
          <div data-i18n="Without menu">List</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="" class="menu-link">
          <div data-i18n="Without navbar">Create</div>
        </a>
      </li>
    </ul>
  </li>
  --}}

              <li class="menu-item  ">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <i class="menu-icon tf-icons bx bx-group"></i>
                  <div data-i18n="Layouts">User</div>
                </a>
                <ul class="menu-sub">
                  <li class="menu-item ">
                    <a href="" class="menu-link">
                      <div data-i18n="Without menu">List</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="" class="menu-link">
                      <div data-i18n="Without navbar">Create</div>
                    </a>
                  </li>

                </ul>
              </li>


              <li class="menu-header small text-uppercase"><span class="menu-header-text">Email</span></li>

              {{--
    <li class="menu-item  ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-news"></i>
        <div data-i18n="Layouts">Template</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item ">
          <a href="" class="menu-link">
            <div data-i18n="Without menu">List</div>
          </a>
        </li>
        <li class="menu-item">
          <a href="" class="menu-link">
            <div data-i18n="Without navbar">Create</div>
          </a>
        </li>
      </ul>
    </li>
    --}}

            </ul>
</aside>
<!-- / Menu -->
<!-- Overlay -->


<!-- / Menu -->
<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>