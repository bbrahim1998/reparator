const contactForm = document.getElementById('contactForm');

if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        const nombre = document.getElementById('nombre').value;
        const apellidos = document.getElementById('apellidos').value;
        const correo = document.getElementById('correo').value;
        const telefono = document.getElementById('telefono').value;
        const consulta = document.getElementById('consulta').value;
        
        if (!nombre || !apellidos || !correo || !consulta) {
            alert('⚠️ Por favor, completa todos los campos obligatorios.');
            return;
        }
        
        if (!correo.includes('@')) {
            alert('⚠️ Por favor, introduce un correo electrónico válido.');
            return;
        }
        
        alert(`✅ ¡Gracias ${nombre}!\n\nHemos recibido tu consulta. Nos pondremos en contacto contigo lo antes posible.\n\n📧 Respuesta enviada a: ${correo}\n📞 Teléfono: ${telefono || 'No proporcionado'}`);
        
        contactForm.reset();
    });
}
