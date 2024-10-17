<div id="genre-modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 hidden z-50 justify-center items-center">
    <div class="fixed top-1/4 w-3/4 sm:w-1/3 left-12 sm:left-1/3 bg-backgorund p-6 rounded-lg shadow-lg">
        <h2 class="text-white text-lg mb-4 flex justify-center items-center">KİTAP TÜRÜ EKLE</h2>
        <form action="{{ route('genres.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-white">İsim</label>
                <input type="text" id="name" name="name" class="mt-1 block w-full px-3 py-2 bg-gray-700 border border-gray-300 text-white rounded">
            </div>
            <div class="flex justify-between">
                <button type="button" id="cancel-btn-genre" class="bg-gray-500 text-white px-4 py-2 rounded">İPTAL</button>
                <button type="submit" id="save-btn-genre" class="bg-yellow-600 text-white px-4 py-2 rounded">KAYDET</button>
            </div>
        </form>
    </div>
</div>
@if(session('success'))
        <div class="flash-message fixed top-4 left-1/2 transform -translate-x-1/2 bg-green-600 text-white px-4 py-2 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
@endif
