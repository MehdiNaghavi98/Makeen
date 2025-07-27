
    document.addEventListener('DOMContentLoaded', function () {
    const alert = document.querySelector('.alert-success');
    if (alert) {
    setTimeout(() => {
    alert.classList.add('hide');
}, 3000);  // بعد از ۵ ثانیه کلاس hide اضافه میشه

    // اگر خواستی با کلیک هم سریع مخفی بشه:
    alert.addEventListener('click', () => {
    alert.classList.add('hide');
});
}
});
