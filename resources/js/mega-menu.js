const openModalButton = document.getElementById('open-modal');
const closeModalButton = document.getElementById('close-modal');
const modal = document.getElementById('menu-modal');

if (openModalButton) {
    openModalButton.addEventListener('click', function() {
        modal.classList.remove('hidden');
    });

    closeModalButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    });

    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
}
