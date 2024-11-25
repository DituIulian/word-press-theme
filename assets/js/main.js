document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('load', function () {
        // Selectează preloader-ul și conținutul principal
        const preloader = document.querySelector('.preloader');
        const mainContent = document.querySelector('.main-content');
        
        // Ascunde preloader-ul și afișează conținutul principal
        if (preloader) {
            preloader.classList.add('hidden');
        }
        if (mainContent) {
            mainContent.style.opacity = '1';
        }
    });
});




document.addEventListener('DOMContentLoaded', function () {
    const movieLengthElement = document.getElementById('movie-length');
    const toggleButton = document.getElementById('toggle-format');
    let isMinutesFormat = true; // Variabila pentru a reține formatul curent

    toggleButton.addEventListener('click', function () {
        const runtime = parseInt(movieLengthElement.dataset.runtime, 10); // Obține valoarea în minute
        if (isMinutesFormat) {
            // Convertim minutele în ore și minute
            const hours = Math.floor(runtime / 60);
            const minutes = runtime % 60;
             movieLengthElement.innerHTML = `<strong>Runtime:</strong> ${hours} hours ${minutes} minutes`;
        } else {
            // Afișăm doar minutele
                 movieLengthElement.innerHTML = `<strong>Runtime:</strong> ${runtime} minutes`;
        }
        isMinutesFormat = !isMinutesFormat; // Comutăm formatul
    });
});
