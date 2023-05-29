function showModalDelete() {
    var modal = document.querySelector('.modal-delete');
    modal.style.display = 'block';
}

var deleteButtons = document.querySelectorAll('.delete-btn');
deleteButtons.forEach(function(button) {
    button.addEventListener('click', showModalDelete);
});
