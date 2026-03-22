function loadVideo(el) {
    el.innerHTML = `
        <iframe
            src="https://www.youtube.com/embed/Aq5WXmQQooo?autoplay=1"
            title="YouTube video player"
            allow="autoplay; encrypted-media"
            allowfullscreen>
        </iframe>
    `;
}

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.overlay');
    const openButton = document.querySelector('.create');
    const closeButton = document.querySelector('.cancel');

    openButton.addEventListener('click', (event) => {
        event.preventDefault();
        modal.classList.add('active');
    });

    closeButton.addEventListener('click', () => {
        modal.classList.remove('active');
    });
});