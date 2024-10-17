<div class="container mx-auto p-6">
    <h1 class="flex text-xl text-white font-poppins justify-center items-center mx-auto mb-10 mt-16 line-clamp-1">KİTAP DETAYI</h1>
    <table class="min-w-full divide-y divide-gray-200 rounded-lg bg-bg">
        <tbody id="book-details">
            @foreach($bookDetails as $key => $value)
             <tr class="border-b-2 border-backgorund">
                <td class="border-r-2 border-backgorund px-4 py-2 text-white opacity-50 font-semibold w-1/4">{{ $key }}</td>
                 <td class="px-4 py-2 text-white">
                     <span>{{ $value }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-end space-x-4 mt-4">
        <button id="delete-btn" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 border">
                SİL
         </button>
        <a href="{{ route('books.create') }}" class="bg-hover text-white px-4 py-2 rounded border">
                DÜZENLE
        </a>
    </div>
    <div id="delete-modal" class="fixed top-0 right-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
        <div class="p-10 rounded-lg shadow-lg z-50">
            <h2 class="bg-backgorund text-lg font-semibold p-4 text-white border-opacity-50">Silmek istediğinize emin misiniz?</h2>
            <div class="flex justify-center space-x-4 bg-giris p-3">
                <button id="cancel-btn-delete" class="bg-gray-500 text-white px-6 py-2 rounded">İPTAL</button>
                <form id="delete-form" action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded">EVET</button>
                </form>
            </div>
        </div>
    </div>
    @if(session('success'))
        <div class="bg-green-600 text-white px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
</div>

