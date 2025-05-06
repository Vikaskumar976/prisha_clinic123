// clinic.js

// Function to run after DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('form');
  const successBox = document.createElement('div');

  successBox.className = 'success-box';
  successBox.style.cssText = `
    margin-top: 15px;
    padding: 12px;
    border-left: 5px solid #2ecc71;
    background: #eafaf1;
    color: #27ae60;
    font-weight: 500;
    display: none;
    border-radius: 5px;
    text-align: center;
  `;

  form.appendChild(successBox);

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    let isValid = true;
    const inputs = form.querySelectorAll('input[required], select[required]');
    inputs.forEach(input => {
      input.style.borderColor = '#ccc';
      if (!input.value.trim()) {
        input.style.borderColor = 'red';
        isValid = false;
      }
    });

    if (isValid) {
      successBox.innerText = '✅ Appointment submitted successfully!';
      successBox.style.display = 'block';
      form.reset();

      setTimeout(() => {
        successBox.style.display = 'none';
      }, 4000);
    }
  });
});
