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
    const movieRuntime = document.getElementById('movie-runtime');
    const toggleButton = document.getElementById('toggle-format');
    let isMinutesFormat = true; // Variabila pentru a reține formatul curent

    toggleButton.addEventListener('click', function () {
        const runtime = parseInt(movieRuntime.dataset.runtime, 10); // Obține valoarea în minute
        if (isMinutesFormat) {
            // Convertim minutele în ore și minute
            const hours = Math.floor(runtime / 60);
            const minutes = runtime % 60;
             movieRuntime.innerHTML = `<strong>Runtime:</strong> ${hours} hours ${minutes} minutes`;
        } else {
            // Afișăm doar minutele
                 movieRuntime.innerHTML = `<strong>Runtime:</strong> ${runtime} minutes`;
        }
        isMinutesFormat = !isMinutesFormat; // Comutăm formatul
    });
});


// let count = 0;
// const timer = setInterval(function() {
//   count++;
//   console.log(count);
//   if (count === 60) {
//     clearInterval(timer);
//     alert("Time's up!");
//   }
// }, 1000);

// document.addEventListener("click", function () {

document.addEventListener("DOMContentLoaded", function () {
    const onlineTime = document.getElementById("online-time");
    let count = 0;

    setInterval(function () {
        count += 1;
        onlineTime.textContent = count;
        if (count === 60) {
              alert ("Timpul petrecut pe aceasta pagina a trecut de 1 minut. Daca aveti nevoie de ajutor va rugam sa intrati pe pagina de Contact");
          }         
    }, 1000);
});
