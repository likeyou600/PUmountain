<div class="loadingup" id="loadingup"></div>
<div id="loading">
    <img src="{{ asset('loading.gif') }}" class="img-responsive" />
    <div class="process">
        <p class="loadpsize">讀取中，請稍後</p>
    </div>
</div>
<script>
    function do_click() {
            document.getElementById("loading").style.display = "block";
            document.getElementById("loadingup").style.display = "block";
        }
</script>