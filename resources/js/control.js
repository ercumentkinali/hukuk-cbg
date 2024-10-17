setTimeout(function() {
            var flashMessages = document.getElementsByClassName('flash-message');
            for (var i = 0; i < flashMessages.length; i++) {
                flashMessages[i].style.transition = 'opacity 0.5s ease';
                flashMessages[i].style.opacity = '0';
                (function(msg) {
                    setTimeout(function() {
                        msg.remove();
                    }, 500);
                })(flashMessages[i]);
            }
        }, 2000);
document.addEventListener('DOMContentLoaded', function() {
    const tbody = document.querySelector('.clickable-rows');
    if (tbody) {
        tbody.querySelectorAll('.clickable-row').forEach(cell => {
            cell.addEventListener('click', function(event) {
                if (event.target.closest('form') || event.target.closest('button')) {
                    return;
                }
                const url = this.closest('tr').getAttribute('data-url');
                if (url) {
                    window.location.href = url;
                }
            });
        });
    }
});
const authorModal = document.getElementById('author-modal');
const genreModal = document.getElementById('genre-modal');
const addAuthorBtn = document.getElementById('add-author');
const addGenreBtn = document.getElementById('add-genre');
const cancelBtn = document.getElementById('cancel-btn');
const cancelBtngenre = document.getElementById('cancel-btn-genre');

if (addAuthorBtn && authorModal && cancelBtn) {
    addAuthorBtn.addEventListener('click', function () {
        authorModal.classList.remove('hidden');
    });

    cancelBtn.addEventListener('click', function () {
        authorModal.classList.add('hidden');
    });
}

if (addGenreBtn && genreModal && cancelBtngenre) {
    addGenreBtn.addEventListener('click', function () {
        genreModal.classList.remove('hidden');
    });

    cancelBtngenre.addEventListener('click', function () {
        genreModal.classList.add('hidden');
    });
}
const deleteBtn = document.getElementById('delete-btn');
const deleteModal = document.getElementById('delete-modal');
const cancelBtndelete = document.getElementById('cancel-btn-delete');

if (deleteBtn && deleteModal && cancelBtndelete) {
    deleteBtn.addEventListener('click', function () {
        deleteModal.classList.remove('hidden');
    });

    cancelBtndelete.addEventListener('click', function () {
            deleteModal.classList.add('hidden');
    });
}
document.addEventListener('DOMContentLoaded', function() {
    const logoutLink = document.getElementById('logout-link');
    if (logoutLink) {
        function shouldLogout() {
            return confirm("Çıkış yapmak istediğinize emin misiniz?");
        }
        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();
            if (shouldLogout()) {
                document.getElementById('logout-form').submit();
            }
        });
    }
});
const deleteBtnindex = document.getElementById('delete-btn-index');
const deleteModalindex = document.getElementById('delete-modal-index');
const cancelBtndeleteIndex = document.getElementById('cancel-btn-delete-index');

if (deleteBtnindex && deleteModalindex && cancelBtndeleteIndex) {
    deleteBtnindex.addEventListener('click', function () {
        deleteModalindex.classList.remove('hidden');
    });

    cancelBtndeleteIndex.addEventListener('click', function () {
            deleteModalindex.classList.add('hidden');
    });
}
