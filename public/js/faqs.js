// ========================================================================
//  FAQS
//  Acordeón de preguntas frecuentes: al hacer clic en una pregunta se
//  expande o contrae su respuesta mediante la clase .active.
// ========================================================================

document.querySelectorAll('.faq-question').forEach(question => {
    question.addEventListener('click', () => {
        const faqItem = question.parentElement;
        faqItem.classList.toggle('active');
    });
});
