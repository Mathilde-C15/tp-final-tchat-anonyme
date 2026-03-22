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