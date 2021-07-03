<nav class="navbar navbar-expand-sm navbar-bg navbar-light ">
    {{-- navbar-expand-sm --}}


    <input type="image" src="{{ asset('picture/material/pu.jpg') }}"
        onclick="location.href='/PUmountain'" class="puimg">


    <p class="PUtitle">靜宜大學登山社</p>

    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    @auth
        {{-- 用戶菜單 --}}
     
        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
            

            <div class="navbar-nav setting1 ">
                <div class="column text-center">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            style="color: black;margin-right: 10px;">
                            <img src="{{asset("uploads/userpic/".Auth::user()->picture)}}"
                                style="border-radius: 50%; width: 32px; height: 32px;">
                            {{Auth::user()->nickname }}
                        </a>
                        <div class="dropdown-menu animate__animated animate__bounceIn animate__faster "
                            aria-labelledby="navbarDropdown" style="min-width: 6.5rem;">
                            <a class="dropdown-item" href="{{route('profile')}}">儀表板</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('borrow.article',array('mat'))}}">器材借用</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('borrow.cart')}}">借物車</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('borrow.myorder')}}">借用情況</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('auth.logout')}}">登出</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endauth
    @guest
        {{-- 登入登出 --}}
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="navbar-nav setting1 ">
                <div class="column text-center">


                    <a class="navbar-brand userfontfamily2" href="{{route('login')}}" style="background-color: darkseagreen;
                    border-radius: 20px;">社員登入</a>

                    <a class="navbar-brand userfontfamily2" href="{{route('register')}}" style="background-color: darkseagreen;
                    border-radius: 20px;">社員註冊</a>


                </div>
            </div>
        </div>
        @endguest
</nav>
