document.getElementById('showFormBtn').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    var overlay = document.getElementById('overlay');
    formContainer.style.display = 'block';
    overlay.style.display = 'block';
    this.style.display = 'none'; // Butonu gizle
});

document.getElementById('overlay').addEventListener('click', function() {
    var formContainer = document.getElementById('formContainer');
    var showFormBtn = document.getElementById('showFormBtn');
    formContainer.style.display = 'none';
    this.style.display = 'none'; // Overlay'i gizle
    showFormBtn.style.display = 'block'; // Butonu göster
});