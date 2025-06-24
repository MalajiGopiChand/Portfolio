document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contact-form');
    const formMessage = document.getElementById('form-message');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        formMessage.textContent = '';
        formMessage.className = 'text-sm mt-2';

        const formData = new FormData(form);

        fetch('php/submit_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                formMessage.textContent = data.message;
                formMessage.classList.add('text-green-500');
                form.reset();
            } else {
                formMessage.textContent = data.message;
                formMessage.classList.add('text-red-500');
                if (data.errors) {
                    for (const [field, error] of Object.entries(data.errors)) {
                        formMessage.textContent += `\n${error}`;
                    }
                }
            }
        })
        .catch(() => {
            formMessage.textContent = "Something went wrong. Please try again.";
            formMessage.classList.add('text-red-500');
        });
    });
});