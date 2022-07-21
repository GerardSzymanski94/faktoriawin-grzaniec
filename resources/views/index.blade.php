<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/ico" href="assets/img/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    <link rel="stylesheet" href="css/main.css"/>
    <!-- <link rel="stylesheet" href="css/slick.css" /> -->
    <link rel="stylesheet" href="assets/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/vendor/slick/slick.css">
    <link rel="stylesheet" href="js/airdatepicker/css/datepicker.css" type="text/css"/>
</head>
<body>
@if(session('success'))
    <div class="alert alert-success">Udało się</div>
@endif
@if(session('save-error'))
    <div class="alert alert-danger">Nie udało się zapisać</div>
@endif
@if(session('captcha-error'))
    <div class="alert alert-danger">Zaznacz pole Captcha</div>
@endif
@if(session('bill-error'))
    <div class="alert alert-danger">Paragon już użyty</div>
@endif
@if($errors->any())
    <div class="alert alert-danger">Uzupełnij wszystkie pola</div>
@endif


<form action="{{ route('register.store') }}" method="post">
    @csrf
    Data: <input name="bill_date" type="datetime-local" value="{{ old('bill_date') }}"><br>
    Numer: <input name="bill_number" type="text" value="{{ old('bill_number') }}"><br>
    Email: <input name="email" type="email" value="{{ old('email') }}"><br>
    <div class="h-captcha" name="captcha"
         data-sitekey="90777a29-d501-4e65-a2ba-81af5303ca77"></div>
    <br>
    <input type="submit">
</form>


<br>
<p>kontakt</p>
@if(session('contact'))
    <div class="alert alert-success">Udało się</div>
@endif
@if(session('contact-error'))
    <div class="alert alert-danger">Nie udało się wysłać maila</div>
@endif
<form action="{{ route('mail.contact') }}" method="post">
    @csrf
    Treść: <textarea name="message">{{ old('message') }}</textarea><br>
    Email: <input name="email" type="email" value="{{ old('email') }}"><br>
    <input type="submit">
</form>
<!-- START Bootstrap-Cookie-Alert -->
<div class="alert text-center cookiealert" role="alert">
    <b>W ramach naszej strony stosujemy wyłącznie niezbędne pliki cookies, aby świadczyć usługi na najwyższym poziomie.
        Dalsze korzystanie z witryny bez zmiany ustawień dotyczących cookies oznacza, że zgadzasz się na ich użycie.
        Więcej szczegółów znajdziesz w naszej<a href="pdf/polityka-prywatnosci.pdf" target="_blank"> Polityce
            Prywatności</a></b>

    <button type="button" class="btn btn-primary btn-sm acceptcookies">
        Akceptuje
    </button>
</div>

<script src="https://hcaptcha.com/1/api.js" async defer></script>

<script src="js/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></scrip
+

t> -->
<script src="assets/vendor/slick/slick.min.js"></script>
<script src="js/airdatepicker/js/datepicker.min.js"></script>
<!-- Include Polish language -->
<script src="js/airdatepicker/i18n/datepicker.pl.js"></script>
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>
<script src="js/script.js"></script>
</body>


</html>


