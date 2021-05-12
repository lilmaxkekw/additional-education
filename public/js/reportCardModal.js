const modal = document.querySelector('.main-modal');
const closeButton = document.querySelectorAll('.modal-close');

const modalClose = () => {
    modal.classList.remove('fadeIn');
    modal.classList.add('fadeOut');
    setTimeout(() => {
        modal.style.display = 'none';
    }, 500);

    $('#number_hours').removeClass('border border-red-400');
    $('#name_section').removeClass('border border-red-400');
    $('#description_section').removeClass('border border-red-400');
    $('#date_section').removeClass('border border-red-400');

    $('#number_hours_error').addClass('hidden');
    $('#name_section_error').addClass('hidden');
    $('#description_section_error').addClass('hidden');
    $('#date_section_error').addClass('hidden');
}

const openModal = () => {
    modal.classList.remove('fadeOut');
    modal.classList.add('fadeIn');
    modal.style.display = 'flex';
}

for (let i = 0; i < closeButton.length; i++) {

    const elements = closeButton[i];

    elements.onclick = (e) => modalClose();

    modal.style.display = 'none';

    window.onclick = function (event) {
        if (event.target == modal) modalClose();
    }
}
