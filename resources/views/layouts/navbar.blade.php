<nav class="navbar navbar-expand-sm navbar-bg navbar-light ">
    {{-- navbar-expand-sm --}}


    <input type="image" src="{{ asset('picture/material/pu.jpg') }}" onclick="location.href='/PUmountain'"
        class="puimg">


    <img src="/PUmountain/picture/material/PUL.png" alt="" class="PUtitle" onclick="location.href='/PUmountain'">
    {{-- <p class="PUtitle">靜宜大學登山社</p> --}}
    @guest
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" id="navbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    {{-- 登入登出 --}}
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent" style="z-index: 99;"
        aria-labelledby="navbar">
        <div class="navbar-nav setting1 ">
            <div class="column text-center">
                <a class="navbar-brand userfontfamily2 userbutton" href="{{route('login')}}">社員登入</a>
                <a class="navbar-brand userfontfamily2 userbutton" href="{{route('register')}}">社員註冊</a>
            </div>
        </div>
    </div>
    @endguest

    @auth
    {{-- 用戶菜單 --}}
    <div class="navbar-nav setting1  navpic" style="z-index: 99;">
        <div class="column text-center">
            <div class="nav-item dropdown">

                <a class="nav-link " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false" style="color: black;margin-right: 10px; display: contents;">
                    <img src="{{asset("uploads/userpic/".Auth::user()->picture)}}" class="navuserpic">
                    <i class="fas fa-angle-down fa-2x" style="vertical-align: middle;"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end animate__animated animate__bounceIn animate__faster custumdrop"
                    aria-labelledby="navbarDropdown" style="min-width: 6.5rem; text-align:center">
                    <a class="dropdown-item" href="{{route('profile')}}">儀表板</a>
                    <div class="dropdown-divider"></div>
                    @if(Auth::user()->is_admin==1)
                    <a class="dropdown-item" href="{{route('admin.page')}}">管理模式</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href=" {{route('admin.bulletin.newckedit')}}">新增公告</a>
                    <div class="dropdown-divider"></div>
                    @endif
                    <a class="dropdown-item" href="{{route('borrow.article',array('mat'))}}">器材借用</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('borrow.cart')}}">借物車</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('borrow.myorder',array('all'))}}">借用情況</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('auth.logout')}}">登出</a>
                </div>
            </div>
        </div>
    </div>

    @endauth
</nav>