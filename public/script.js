const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
    container.classList.add('active');
})

loginBtn.addEventListener('click', () => {
    container.classList.remove('active');
})

document.addEventListener('DOMContentLoaded', function () {
    const errorBox = document.getElementById('custom-error-box');
    if (errorBox) {
        setTimeout(() => {
            errorBox.style.opacity = '0';
            setTimeout(() => {
                errorBox.style.display = 'none';
            }, 500); // صبر کن تا fade-out تموم شه
        }, 7000); // 7 ثانیه
    }
});
document.addEventListener('DOMContentLoaded', function () {
    const successBox = document.getElementById('custom-success-box');
    if (successBox) {
        setTimeout(() => {
            successBox.style.opacity = '0';
            setTimeout(() => {
                successBox.style.display = 'none';
            }, 500); // زمان fade-out
        }, 7000); // نمایش برای ۷ ثانیه
    }
});


