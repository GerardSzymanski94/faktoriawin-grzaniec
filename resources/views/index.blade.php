<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Grzaniec zimowy</title>
    <meta
        name="description"
        content="Konkurs rozgrzej się śliwką w czekoladzie!"
    />
    <meta name="theme-color" content="#732182" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}" />
    <meta name="robots" content="noindex" />
</head>
<body>
<header>
    <div class="header-bg"></div>
    <div class="spacer-xl header-flex">
        <div class="header-left">
            <div class="header-logo">
                <a href="/"
                ><img
                        src="{{ asset("assets/img/logo.webp") }}"
                        width="127"
                        height="116"
                        alt="Faktoria Win"
                    /></a>
            </div>
            <div class="header-name"><h1>Grzaniec zimowy</h1></div>
        </div>
        <nav class="header-nav">
            <ul>
                <li><a href="#konkurs">Konkurs</a></li>
                <li><a href="#nagrody">Nagrody</a></li>
                <li><a href="#cotrzebazrobic">Co trzeba zrobić</a></li>
                <li><a href="#formularz">Formularz</a></li>
                <li><a href="#listazwyciezcow">Lista zwycięzców</a></li>
                <li><a href="#regulamin">Regulamin</a></li>
                <li><a href="#kontakt">Kontakt</a></li>
            </ul>
        </nav>
        <button class="header-hamburger" aria-label="Menu">
            <svg
                aria-hidden="true"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
            >
                <rect width="18" height="1.5" fill="red" ry="0.75" x="3" y="6.25" />
                <rect
                    width="18"
                    height="1.5"
                    fill="red"
                    ry="0.75"
                    x="3"
                    y="11.25"
                />
                <rect
                    width="18"
                    height="1.5"
                    fill="red"
                    ry="0.75"
                    x="3"
                    y="16.25"
                />
            </svg>
        </button>
    </div>
</header>
<main class="spacer-xl">
    <div class="konkurs konkurs-flex" id="konkurs">
        <div class="konkurs-1">
            <img
                src="assets/img/konkurs-1.webp"
                alt="Konkurs rozgrzej się śliwką w czekoladzie"
                width="370"
                height="377"
            />
            <a href="#formularz">Biorę udział</a>
        </div>
        <div class="konkurs-2">
            <img
                src="assets/img/konkurs-2.webp"
                alt="Grzaniec zimowy"
                width="269"
                height="478"
            />
        </div>
        <div class="konkurs-3">
            <div>
                <p>
                    unikalny kubek<br />
                    z grafiką
                </p>
                <img
                    src="assets/img/konkurs-3a.webp"
                    alt="Unikalny kubek i ciepła czapka zimowa"
                    width="507"
                    height="491"
                />
                <p>
                    ciepła zimowa<br />
                    czapka
                </p>
            </div>
        </div>
    </div>
</main>
<div class="spacer-lg">
    <div class="nagrody" id="nagrody">
        <h2>Nagrody</h2>
        <p class="nagrody-desc">
            Kiedy śliwka w czekoladzie wpadła na grzańca zimowego, zrobiło się
            gorąco. Rozgrzej się i Ty!
        </p>
        <div class="nagrody-flex">
            <div>
                <img
                    src="assets/img/nagrody-1.webp"
                    alt="Unikalny kubek z grafiką"
                    width="438"
                    height="321"
                />
                <p class="nagrody-desc2">unikalny kubek z grafiką</p>
                <img
                    src="assets/img/nagrody-3.webp"
                    alt="Porysunki"
                    width="178"
                    height="64"
                    class="nagrody-img"
                />
                <div class="nagrody-rect">
                    <p>Listopad</p>
                    <p>Zestaw kubek i czapka</p>
                    <div><span>x 100</span></div>
                </div>
            </div>
            <div>
                <img
                    src="assets/img/nagrody-2.webp"
                    alt="Ciepła zimowa czapka"
                    width="438"
                    height="321"
                />
                <p class="nagrody-desc2">ciepła zimowa czapka</p>
                <div class="nagrody-placeholder"></div>
                <div class="nagrody-rect nagrody-rect2">
                    <p>Grudzień</p>
                    <p>Zestaw kubek i czapka</p>
                    <div><span>x 100</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="spacer-md">
    <div class="co" id="cotrzebazrobic">
        <h2>Co trzeba zrobić</h2>
        <div class="co-flex">
            <div class="co-text">
                <p>
                    Kup dowolny
                    <span
                    >Grzaniec zimowy,<br />
                Klasyczny</span
                    >
                    lub
                    <span>Śliwka w czekoladzie.</span>
                </p>
                <span class="co-text--line"></span>
                <p>Napisz, jak Cię rozgrzał.</p>
                <span class="co-text--line"></span>
                <p>Prześlij zdjęcie paragonu.</p>
                <span class="co-text--line"></span>
                <p class="co-text--lg">I WYGRAJ!</p>
                <p class="co-text--sm">Czas trwania konkursu: 1.11-31.12.2023 r.</p>
            </div>
            <div>
                <img
                    src="assets/img/co.webp"
                    alt="Grzaniec zimowy"
                    width="318"
                    height="500"
                />
            </div>
        </div>
    </div>
</div>
<div class="spacer-md"  id="formularz">
    <form id="application" class="formularz">
        <h2>Formularz</h2>
        <!-- Klasy do włączenia wiadomości po wysłaniu formularza (dla poniższego diva):
        formularz-message--success-active
        formularz-message--error-active -->
        <div class="formularz-container" id="form_container">
            <div class="formularz-message formularz-message--success">
                <div class="formularz-message--icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#FFFFFF"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 12.75l6 6 9-13.5"
                        />
                    </svg>
                </div>
                <h3>Dziękujemy za zgłoszenie!</h3>
                <p id="message_success">
                    Twoje zgłoszenie zostało wysłane prawidłowo. Dziękujemy za udział w konkursie!
                </p>
                <button type="button" id="button_success">Ok</button>
            </div>
            <div class="formularz-message formularz-message--error">
                <div class="formularz-message--icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#FFFFFF"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>
                <h3>Nie udało się wysłać zgłoszenia!</h3>
                <p id="message_error">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                    euismod efficitur odio placerat ultricies. Vestibulum eleifend,
                    nulla sed molestie cursus, sapien massa posuere lectus, sit amet
                    scelerisque nisi ligula at justo. Pellentesque sit amet auctor
                    ipsum. Cras congue sodales turpis, quis tristique quam.
                </p>
                <button type="button" id="button_error">Spróbuj ponownie</button>
            </div>
            <div class="formularz-fields">
                <div>
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" />
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <div>
                    <label for="bill_number">Numer dowodu zakupu</label>
                    <input type="text" name="bill_number" id="bill_number" />
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <div>
                    <label for="bill_date">Data dokonania zakupu</label>
                    <input type="date" name="bill_date" id="bill_date" min="2023-11-01"/>
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <div>
                    <label for="answer"
                    >Dokończ zdanie<span
                        >Napisz „Jak rozgrzał Cię Grzaniec Zimowy”.</span
                        ></label
                    >
                    <textarea name="answer" id="answer" rows="3"></textarea>
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <div class="input-file">
                    <label>
                        Dodaj paragon
                        <input name="bill_photo" type="file" accept=".jpg, .jpeg" id="paragon" />
                    </label>
                </div>
                <span class="input-file--message"></span>
                <!-- <span class="text-danger text-danger--file"
                  >To pole jest wymagane!</span
                > -->
                <div class="input-checkbox">
                    <label>
                        <input type="checkbox" id="zgoda" name="aggrement" />
                        <span class="checkmark"></span>
                        <span class="input-content"
                        >Oświadczam, że zapoznałem(-am) się z REGULAMINEM i akceptuję
                  wszystkie zawarte w nim warunki, w tym potwierdzam, iż znane
                  są mi informacje dotyczące przetwarzania moich danych
                  osobowych.</span
                        >
                    </label>
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <button class="formularz-submit" type="submit" id="application_submit">Wyślij</button>
            </div>
        </div>
    </form>
</div>
@if(($winners1 && $winners1->count() > 0) || ($winners2 && $winners2->count() > 0))

<div class="spacer-md">
    <div class="zwyciezcy" id="listazwyciezcow">
        <h2>Zwycięzcy</h2>
        <div class="zwyciezcy-rect">
            <div class="zwyciezcy-list">
                <h3>Nagrody listopad</h3>
                <p><span>100 x</span> zestaw kubek i czapka</p>
                <ul>
                    @foreach($winners1 as $w)
                        <li>{{ $w->name }} {{ substr($w->lastname, 0, 1) }}***</li>
                    @endforeach

                </ul>
            </div>
            <div class="zwyciezcy-list">
                <h3>Nagrody grudzień</h3>
                <p><span>100 x</span> zestaw kubek i czapka</p>
                <ul>
                    @foreach($winners2 as $w)
                        <li>{{ $w->name }} {{ substr($w->lastname, 0, 1) }}***</li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

@endif
<div class="spacer-md">
    <form id="contact_form" class="formularz kontakt">
        <h2>Kontakt</h2>
        <!-- Klasy do włączenia wiadomości po wysłaniu formularza (dla poniższego diva):
        formularz-message--success-active
        formularz-message--error-active -->
        <div class="formularz-container" id="contact_form_container">
            <div class="formularz-message formularz-message--success">
                <div class="formularz-message--icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#FFFFFF"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 12.75l6 6 9-13.5"
                        />
                    </svg>
                </div>
                <h3>Wiadomość wysłana pomyślnie!</h3>
                <p id="contact_message_success">
                    Twoje pytanie zostało wysłane!
                </p>
                <button type="button" id="contact_button_success">Ok</button>
            </div>
            <div class="formularz-message formularz-message--error">
                <div class="formularz-message--icon">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="#FFFFFF"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </div>
                <h3>Nie udało się wysłać wiadomości!</h3>
                <p id="contact_message_error">

                </p>
                <button type="button" id="contact_button_error">Spróbuj ponownie</button>
            </div>
            <div class="formularz-fields">
                <div>
                    <label for="email2">E-mail</label>
                    <input type="email" name="email" id="email2" />
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <div>
                    <label for="message">Treść</label>
                    <textarea name="message" id="message" rows="3"></textarea>
                    <!-- <span class="text-danger">To pole jest wymagane!</span> -->
                </div>
                <p class="kontakt-info">
                    Administratorem Twoich danych osobowych jest Eurocash S.A.
                    (klauzula informacyjna).
                </p>
                <button class="formularz-submit" type="submit" id="contact_form_submit">Wyślij</button>
            </div>
        </div>
    </form>
</div>
<script src="{{ asset("js/ui.js") }}" defer></script>
</body>
</html>
