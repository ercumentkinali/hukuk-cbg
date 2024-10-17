<div class="container mx-auto p-6 mt-10">
    <h1 class="text-xl text-white font-poppins mb-4 mt-4 text-center justify-center">KİTAP EKLE</h1>
    <form action="{{ route('books.store') }}" method="POST" class="sm:px-96 md:px-40">
        @csrf
        <div class="bg-backgorund p-6 rounded-lg shadow-md">
            <div class="relative mb-6 z-50">
                <label for="name" class="absolute text-white text-opacity-50 font-poppins left-4 top-3 px-2 bg-backgorund text-sm ">Kitap Adı</label>
            </div>
            <div class="relative mb-4">
                <input type="text" id="name" name="name" class="block w-full px-4 py-3 border border-white-opacity-50 text-white bg-transparent">
            </div>
            <div class="relative mb-4">
                <div class="relative mb-6 z-50">
                    <label for="name" class="absolute text-white text-opacity-50 font-poppins left-4 -top-1 px-2 bg-backgorund text-sm ">Yazar</label>
                </div>
                <div class="flex items-center">
                    <select id="author_id" name="author_id" class="mt-1 block w-full px-4 py-3 border bg-backgorund bg-transparent border-white-opacity-50 text-white">
                        <option value="" style="background-color: #011642">Seçiniz</option>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" class="bg-transparent" style="background-color: #011642">{{ $author->first_name }} {{$author->last_name}}</option>
                        @endforeach
                    </select>
                    <button type="button" id="add-author" class="mt-1 bg-backgorund border-opacity-75 border-white-opacity-50 border text-white px-4 py-3 hover:bg-black">Ekle</button>
                </div>
            </div>
            <div class="mb-4">
                <div class="relative mb-6 z-50">
                    <label for="genre" class="absolute text-white text-opacity-50 font-poppins left-4 -top-1 px-2 bg-backgorund text-sm ">Kitap Türü</label>
                </div>
                <div class="flex items-center">
                    <select id="genre_id" name="genre_id" class="mt-1 block w-full px-4 py-3 border border-white-opacity-50 bg-backgorund bg-transparent text-white">
                        <option value="" class="opacity-50" style="background-color: #011642">Seçiniz</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}" style="background-color: #011642">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    <button type="button" id="add-genre" class="mt-1 bg-backgorund text-white px-4 py-3 border-white-opacity-50 border hover:bg-black">Ekle</button>
                </div>
            </div>
            <div class="relative mb-6 z-50">
                <label for="name" class="absolute text-white text-opacity-50 font-poppins left-4 -top-3 px-4 py-2 bg-backgorund text-sm ">Yayın Tarihi</label>
            </div>
            <div class="mb-4">
                <input type="date" id="publish_date" name="publish_date" class="mt-1 block w-full px-4 py-3 border border-white-opacity-50 bg-backgorund bg-transparent text-white">
            </div>
            <div class="relative w-full py-5">
                <div class="border-white-opacity-50 border border-dashed"></div>
            </div>
            <div class="relative mb-6 z-50">
                <label for="room" class="absolute text-white text-opacity-50 font-poppins left-4 top-3.5 px-2 bg-backgorund text-sm ">Bulunduğu Oda</label>
            </div>
            <div class="mb-4">
                <input type="text" id="room" name="room" class="mt-1 block w-full px-4 py-3 bg-backgorund text-white border border-white-opacity-50">
            </div>
            <div class="relative mb-6 z-50">
                <label for="shelf" class="absolute text-white text-opacity-50 font-poppins left-4 -top-0.5 px-2 bg-backgorund text-sm ">Bulunduğu Raf</label>
            </div>
            <div class="mb-4">
                <input type="text" id="shelf" name="shelf" class="mt-1 block w-full px-4 py-3 border border-white-opacity-50 bg-backgorund text-white" >
            </div>
            <div class="relative mb-6 z-50">
                <label for="row" class="absolute text-white text-opacity-50 font-poppins left-4 -top-0.5 px-2 bg-backgorund text-sm ">Bulunduğu Sıra</label>
            </div>
            <div class="mb-4">
                <input type="text" id="row" name="row" class="mt-1 block w-full px-4 py-3 border border-white-opacity-50 text-white bg-backgorund">
            </div>
            <div class="flex justify-end mt-6">
                <a href="{{ route('books.index') }}" class="bg-giris text-white px-8 py-2 rounded mr-4">
                    İPTAL
                </a>
                <button type="submit" class="bg-hover text-white px-4 py-2 rounded font-bold">
                    KAYDET
                </button>
            </div>
        </div>
    </form>
</div>

