@if (Route::is('login'))
<lottie-player src="{{asset("/assets/logo/logo-login.json")}}"  background="#4ad9b5" speed="1" style="width: 200px; height: 200px" direction="1" mode="normal" loop autoplay>
</lottie-player>
@else
<lottie-player src="{{asset("/assets/logo/Register.json")}}"  background="#4ad9b5" speed="1" style="width: 200px; height: 200px" direction="1" mode="normal" loop autoplay>
</lottie-player>
@endif
