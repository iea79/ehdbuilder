(() => {
    const button = document.querySelector('.wpforms-submit');
    if (button) {
        button.innerHTML = `<span>${button.textContent}</span>`;
    }
})();
