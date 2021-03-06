<!DOCTYPE html>
<html lang="zh-TW">

<head>
   
    @include('PUmountain.layouts.head')
    <title>靜宜大學登山社</title>
    <script>
        function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
    </script>
</head>
<div class="loadingup" id="loadingup"></div>
    <div id="loading" style="display:none">
        <img src="{{ asset('loading.gif') }}" class="img-responsive">
    </div>
<body class="bodyimg" style="height: 770px;">
    <div class="PUcontainer ">
        <header class="PUnavheader">
            
            @include('PUmountain.layouts.navbar')

        </header>

        <div class=' PUprofile container'>
            <div class="row justify-content-center align-items-center">
                <div class="col align-self-center">

                    <div class="card border-w-6 " id="usercardstyle" style="    background-color: darkseagreen;">

                        <div class="card-header opwhite">
                            <p class="userfontfamily2 loginsize">活動照片</p>
                        </div>
                        
                        <div class="card-body opwhite">
                            <div class="row">
                                <div class="col-sm-3 col-6 text-center">
                                    <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1_WfUF77GXiWS8UhoYCOeuo4P3DyJX_Fy?usp=sharing'"
                                        value="1081-合歡北峰">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1mHdHTQryFzD2Acxg0m8gZnkZ09NwwCl6?usp=sharing'"
                                        value="1081-松羅湖">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/149j0eemUfQgoenOWHH-GTaZNf0fb9C2-?usp=sharing'"
                                        value="1081-奇萊南華">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/14RlynCDOIwKGRs66AMkWNTGr9ZC3b5zr?usp=sharing'"
                                        value="1082-眠月線">
                                </div>
                                <div class="col-sm-3 col-6 text-center">
                                    <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1XoKA2MJ3ej51kV6OVWreZ0fqEQwoZox5?usp=sharing'"
                                        value="1082-加羅湖">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1gzr7v5SmnV0XwBlUe8b2e0-V0q6rWppO?usp=sharing'"
                                        value="1082-合歡西峰下華崗">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1vxa9gpMGhquvnI1tlVr2Db646xlacVhT?usp=sharing'"
                                        value="1091-東卯山">   
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1K6MXjzcf82C-Uy0fStV848dh9wLnF36e?usp=sharing'"
                                        value="1091-郡大山">  
                                </div>

                                <div class="col-sm-3 col-6 text-center">
                                    <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1CdjGrc2SsBKKY8l0g11u91-dVmlzi-nY?usp=sharing'"
                                        value="1091-水漾森林">    
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/13E_kHIHjJynsloW1hQIJA34tcOgSNDkh?usp=sharing'"
                                        value="1091-畢祿山">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1ieinnC5YDroJ5BfFiuUnwaXqOQbkyIL9?usp=sharing'"
                                        value="1092-加里山">   
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href='https://drive.google.com/drive/folders/1Qrw1bBpAmgVp7J5IZji2VbUSI5tW-b0U?usp=sharing'"
                                        value="1092-閂山">                                                                    
                                </div>
                                
                                <div class="col-sm-3 col-6 text-center">
                                    <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href=''"
                                        value="1092-">    
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href=''"
                                        value="1092-">
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href=''"
                                        value="1092-">   
                                        <input type="button"
                                        class="profile_button_margin userfontfamily3 normalsize btn butt PUuserbutt boxshadow btn-lg  logincolor"
                                        onclick="do_click();location.href=''"
                                        value="1092-">                                                                    
                                </div>
                            </div>
                           
                        
                        </div>
                    </div>

                </div>
            </div>
        </div>
       
    </div>



    
</body>

</html>
