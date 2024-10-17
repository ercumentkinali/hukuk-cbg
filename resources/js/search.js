document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[name="search"]');
    const tableBody = document.querySelector('tbody');

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value;
            fetch(`/search?search=${query}`)
                .then(response => response.json())
                .then(data => {
                    tableBody.innerHTML = '';
                    data.books.forEach(book => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="border-border px-4 py-2">${book.id}</td>
                            <td class="border-border px-4 py-2">${book.name}</td>
                            <td class="border-border px-4 py-2">${book.room}</td>
                            <td class="border-border px-4 py-2">${book.shelf}</td>
                            <td class="border-border px-4 py-2">${book.row}</td>
                            <td class="border-border px-4 py-2">${book.genre}</td>
                            <td class="border-border px-4 py-2">${book.author.name ?? 'N/A'}</td>
                            <td class="border-border px-4 py-2">${book.publish_date}</td>
                        `;
                        tableBody.appendChild(row);
                    });
                });
        });
    }
});
