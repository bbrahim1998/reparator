const socialLinks = {
    facebook: 'https://facebook.com/reparator',
    instagram: 'https://instagram.com/reparator_es',
    twitter: 'https://x.com/reparator'
};

document.querySelectorAll('.social-card').forEach(card => {
    const social = card.getAttribute('data-social');
    card.addEventListener('click', () => {
        if (socialLinks[social]) {
            window.open(socialLinks[social], '_blank');
        } else {
            alert(`📱 Síguenos en ${social.toUpperCase()} para conocer todas nuestras novedades y promociones.`);
        }
    });
});
