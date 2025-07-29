document.addEventListener("DOMContentLoaded", function() {
    var menuBar = document.getElementById("menu-bar");
    var label = document.querySelector('label[for="menu-bar"]');
    var navMenu = document.querySelector('.menu');

    // Crear botón de cerrar (X) solo si no existe
    var closeBtn = document.getElementById('close-menu-btn');
    if (!closeBtn) {
        closeBtn = document.createElement('span');
        closeBtn.textContent = '✕';
        closeBtn.setAttribute('id', 'close-menu-btn');
        navMenu.appendChild(closeBtn);
    }

    function toggleCloseBtn() {
        if (menuBar.checked && window.innerWidth < 1024) {
            closeBtn.style.display = 'block';
            navMenu.style.zIndex = 9999;
        } else {
            closeBtn.style.display = 'none';
            navMenu.style.zIndex = '';
        }
    }

    closeBtn.addEventListener('click', function() {
        menuBar.checked = false;
        toggleCloseBtn();
    });

    if (label && menuBar) {
        label.addEventListener("click", function() {
            setTimeout(toggleCloseBtn, 10);
        });
    }

    if (menuBar) {
        menuBar.addEventListener('change', toggleCloseBtn);
    }

    window.addEventListener('resize', toggleCloseBtn);

    // Inicializar estado al cargar
    toggleCloseBtn();
});