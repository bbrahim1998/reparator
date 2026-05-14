document.querySelectorAll('.service-card').forEach((card) => {
    const minusBtn = card.querySelector('.qty-minus');
    const plusBtn = card.querySelector('.qty-plus');
    const qtyValue = card.querySelector('.qty-value');
    const addBtn = card.querySelector('.add-to-cart-btn');
    let quantity = 1;

    if (minusBtn) {
        minusBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (quantity > 1) {
                quantity--;
                qtyValue.textContent = quantity;
                minusBtn.disabled = quantity === 1;
            }
        });
    }

    if (plusBtn) {
        plusBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            if (quantity < 10) {
                quantity++;
                qtyValue.textContent = quantity;
                minusBtn.disabled = false;
            }
        });
    }

    if (addBtn) {
        addBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const serviceName = card.getAttribute('data-service') || 'Servicio';
            addBtn.classList.add('bg-green-400');
            addBtn.textContent = '✓ Añadido';
            setTimeout(() => {
                addBtn.classList.remove('bg-green-400');
                addBtn.textContent = 'Añadir al carrito';
            }, 2000);
        });
    }

    card.addEventListener('click', () => {
        const serviceName = card.getAttribute('data-service') || 'Servicio';
        alert(`🔧 Información sobre ${serviceName}. ¿En qué podemos ayudarte?`);
    });
});
