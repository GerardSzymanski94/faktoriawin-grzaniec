<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grzaniec zimowy</title>
    <meta
        name="description"
        content="Konkurs rozgrzej się śliwką w czekoladzie!"
    />
    <link rel="stylesheet" href="https://use.typekit.net/kpz3xig.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.min.css') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>

<section class="form-winners-wrapper">

    @if($register->status == 1)

        <h1 class="heading">Formularz:</h1>

        <form class="form form-winners" action="{{ route('register.store-winner-form') }}" method="post">
            @csrf

            <div class="form__groups">

                <div class="form__group">
                    <label class="form__label">Imię:</label>
                    <input class="form__input" type="text" name="name" placeholder="Imię" value="{{ $register->name }}" required>
                </div>

                <div class="form__group">
                    <label class="form__label">Nazwisko:</label>
                    <input class="form__input" type="text" name="lastname" placeholder="Nazwisko"
                           value="{{ $register->lastname }}" required>
                </div>

                <div class="form__group">
                    <label class="form__label">Adres e-mail podany w zgłoszeniu:</label>
                    <input class="form__input" type="email" name="email" placeholder="E-mail" value="{{ $register->email }}"
                           disabled>
                </div>

                    <div class="form__group">
                        <label class="form__label">Adres korespondencyjny:</label>
                        <input class="form__input" type="text" name="street"
                               placeholder="Ulica numer domu/numer mieszkania"
                               value="{{ old('street') }}" required>
                    </div>

                    <div class="form__group">
                        <label class="form__label">Kod pocztowy:</label>
                        <input class="form__input" type="text" name="zip_code" placeholder="Kod pocztowy"
                               value="{{ old('zip_code') }}" required>
                    </div>

                    <div class="form__group">
                        <label class="form__label">Miejscowość:</label>
                        <input class="form__input" type="text" name="city" placeholder="Miejscowość"
                               value="{{ old('city') }}" required>
                    </div>

                    <div class="form__group">
                        <label class="form__label">Numer telefonu:</label>
                        <input class="form__input" type="text" name="phone" placeholder="Numer telefonu" value=""
                               required>
                    </div>

                    <div class="form__group form__group--checkbox">

                        <label class="form__checkbox-label">
                            <input class="form__checkbox-input" type="checkbox" name="application-form-accept-rule-1" value="accepted" required>
                            Oświadczam, że mam ukończone 18 lat.
                        </label>

<!--                        <label class="form__checkbox-label">
                            <input class="form__checkbox-input" type="checkbox" name="application-form-accept-rule-2" value="accepted" required>
                            <span>Oświadczam, że <a
                                    href="{{ asset('assets/documents/Regulamin_Poczuj letnie orzeźwienie w NETTO_final.pdf') }}"
                                    target="_blank">Regulamin</a> Konkursu "Poczuj letnie orzeźwienie" jest mi znany i akceptuję jego treść.
                           </span>
                        </label>

                        <label class="form__checkbox-label">
                            <input class="form__checkbox-input" type="checkbox" name="application-form-accept-rule-3" value="accepted" required>
                            <span>Oświadczam, że spełniam warunki przewidziane w <a
                                    href="{{ asset('assets/documents/Regulamin_Poczuj letnie orzeźwienie w NETTO_final.pdf') }}"
                                    target="_blank">Regulaminie</a> Konkursu.</span>
                        </label>

                        <label class="form__checkbox-label">
                            <input class="form__checkbox-input" type="checkbox" name="application-form-accept-rule-4" value="accepted" required>
                            <span>Oświadczam, iż zostałem/am poinformowany/a o zasadach przetwarzania moich danych osobowych, określonych <a
                                    href="{{ asset('assets/documents/Regulamin_Poczuj letnie orzeźwienie w NETTO_final.pdf') }}"
                                    target="_blank">Regulaminem</a> Konkursu "Poczuj letnie orzeźwienie".</span>
                        </label>-->

                    </div>

            </div>

            <input name="code" type="hidden" value="{{ $register->code }}">

            <button class="form__button" type="submit">
                <img src="{{ asset('assets/images/przyciski/przycisk-wyslij-formularz.png') }}"/>
            </button>

        </form>

    @else
        <div class="form-success-info">
            <h3 class="form-success-info__title">Dziękujemy za wypełnienie formularza.</h3>
            <p>W najbliższym czasie zweryfikujemy Twoje dane oraz dostarczony oryginał paragonu.</p>
            <p>O wynikach weryfikacji poinformujemy Cię drogą mailową.</p>
        </div>
    @endif

</section>

</body>

</html>


