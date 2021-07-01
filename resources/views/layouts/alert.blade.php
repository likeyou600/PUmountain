@if (Session::has('message'))
<div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;" role="alert"
    id="message">
    <p class="alerttext userfontfamily3">{{ session('message') }}</p>
</div>
@elseif($errors->count())
<div class="alert alert-success animate__animated animate__bounce alertsize" style="z-index: 5;" role="alert"
    id="message">
    <p class="alerttext userfontfamily3">@foreach ($errors->all() as $error){{ $error }} ; @endforeach</p>
</div>
@endif
<script type="text/javascript">
    window.setTimeout(function() {
        $('#message').alert('close');
    }, 3000);
</script>