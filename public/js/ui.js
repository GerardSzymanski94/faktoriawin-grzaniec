const init = () => {
  const multipleListeners = (e, target, fn) => {
    const clicked = e.target.closest(target);
    if (!clicked) return;
    fn();
  };

  const handleDropdownMenu = () => {
    const header = document.querySelector("header");
    const hamburger = document.querySelector(".header-hamburger");

    const toggleHamburger = () =>
      header.setAttribute(
        "aria-pressed",
        header.matches("[aria-pressed=true]") ? false : true
      );

    hamburger.addEventListener("click", toggleHamburger);

    header.addEventListener("click", (e) =>
      multipleListeners(e, ".header-nav a", toggleHamburger)
    );
  };

  // -------------------------
  handleDropdownMenu();

    const applicationForm = document.getElementById('application');
    const successButton = document.getElementById('button_success');
    const errorButton = document.getElementById('button_error');

    const button = document.getElementById('application_submit');
    const formDiv = document.getElementById('form_container');
    successButton.addEventListener('click', function (event){
        formDiv.classList.remove('formularz-message--success-active');
        formDiv.classList.remove('formularz-message--error-active');
    });
    errorButton.addEventListener('click', function (event){
        formDiv.classList.remove('formularz-message--success-active');
        formDiv.classList.remove('formularz-message--error-active');
    });

    applicationForm.addEventListener('submit', function(event) {
        event.preventDefault();


        button.setAttribute('disabled', "");
        button.classList.add('spinner');


        // Pobierz dane z formularza.
        var formData = new FormData(this);

        // Wyślij dane na serwer za pomocą Fetch.
        fetch('/api/store', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if(data.status == "OK"){
                    formDiv.classList.add('formularz-message--success-active');
                    applicationForm.reset();
                }else if(data.status == "ERROR"){
                    document.getElementById('message_error').innerHTML = data.message;
                    formDiv.classList.add('formularz-message--error-active');
                }
                // Obsłuż odpowiedź serwera, na przykład wyświetl komunikat.
                console.log('Odpowiedź serwera:', data);

                button.removeAttribute('disabled', "");
                button.classList.remove('spinner');
            })
            .catch(error => {
                // Obsłuż błąd w przypadku niepowodzenia żądania.
                console.error('Błąd:', error);
                document.getElementById('message_error').innerHTML = "Wystąpił problem z wysłaniem zgłoszenia. Spróbuj ponownie.";
                formDiv.classList.add('formularz-message--error-active');
                button.removeAttribute('disabled', "");
                button.classList.remove('spinner');
            });
    });


    const contactForm = document.getElementById('contact_form');
    const contactSuccessButton = document.getElementById('contact_button_success');
    const contactErrorButton = document.getElementById('contact_button_error');

    const contactFormDiv = document.getElementById('contact_form_container');

    const contactButton = document.getElementById('contact_form_submit');

    contactSuccessButton.addEventListener('click', function (event){
        contactFormDiv.classList.remove('formularz-message--success-active');
        contactFormDiv.classList.remove('formularz-message--error-active');
    });
    contactErrorButton.addEventListener('click', function (event){
        contactFormDiv.classList.remove('formularz-message--success-active');
        contactFormDiv.classList.remove('formularz-message--error-active');
    });

    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();


        contactButton.setAttribute('disabled', "");
        contactButton.classList.add('spinner');


        // Pobierz dane z formularza.
        var formData = new FormData(this);

        // Wyślij dane na serwer za pomocą Fetch.
        fetch('/api/contact', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if(data.status == "OK"){
                    contactFormDiv.classList.add('formularz-message--success-active');
                    contactForm.reset();
                }else if(data.status == "ERROR"){
                    document.getElementById('contact_message_error').innerHTML = data.message;
                    contactFormDiv.classList.add('formularz-message--error-active');
                }
                // Obsłuż odpowiedź serwera, na przykład wyświetl komunikat.
                console.log('Odpowiedź serwera:', data);

                contactButton.removeAttribute('disabled', "");
                contactButton.classList.remove('spinner');
            })
            .catch(error => {
                // Obsłuż błąd w przypadku niepowodzenia żądania.
                console.error('Błąd:', error);
                document.getElementById('contact_message_error').innerHTML = "Wystąpił problem z wysłaniem zgłoszenia. Spróbuj ponownie.";
                contactFormDiv.classList.add('formularz-message--error-active');
                contactButton.removeAttribute('disabled', "");
                contactButton.classList.remove('spinner');
            });
    });



};

// INIT JS
init();
