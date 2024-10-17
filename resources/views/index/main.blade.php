<div class="container mx-auto p-6 mt-10">
    <h1 class="text-xl text-white font-poppins text-center mb-10">KİTAP LİSTESİ</h1>
    <form method="GET" action="{{ route('books.search') }}" class="mb-4 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
        <div class="flex sm:items-center space-x-2">
            <label for="per_page" class="text-white opacity-50">Sayfada</label>
            <select id="per_page" name="per_page" onchange="this.form.submit()" class="bg-bg text-white font-poppins px-4 py-2 rounded font-bold">
                <option value="10" {{ request('per_page') == '10' ? 'selected' : '' }}>10</option>
                <option value="20" {{ request('per_page') == '20' ? 'selected' : '' }}>20</option>
                <option value="30" {{ request('per_page') == '30' ? 'selected' : '' }}>30</option>
            </select>
            <label for="per_page" class="text-white opacity-50">
                <p class="text-base truncate">kayıt göster</p>
            </label>
        </div>
        <div class="relative w-full min-w-max">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Kitap veya yazar ara"
                class="w-full pl-4 pr-14 py-2 rounded text-white bg-giris"
            />
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
            </span>
        </div>
    </form>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-giris text-white font-poppins font-bold text-xs sm:text-base">
                    <th class="border-b-2 border-giris px-4 py-2">No
                         <a href="{{ route('books.filter', array_merge(request()->query(), ['order_by' => 'id', 'sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}">
                            <i class="fa-solid fa-sort{{ request('order_by') === 'id' ? (request('sort') === 'asc' ? '-up' : '-down') : '' }}"></i>
                        </a>
                    </th>
                    <th class="border-b-2 border-giris px-4 py-2">Kitap İsmi</th>
                    <th class="border-b-2 border-giris px-4 py-2">Oda</th>
                    <th class="border-b-2 border-giris px-4 py-2">Raf</th>
                    <th class="border-b-2 border-giris px-4 py-2">Sıra</th>
                    <th class="border-b-2 border-giris px-4 py-2">Tür</th>
                    <th class="border-b-2 border-giris px-4 py-2">Yazar</th>
                    <th class="relative border-b-2 border-giris px-4 py-2">
                        Yayın Tarihi
                         <a href="{{ route('books.filter', array_merge(request()->query(), ['order_by' => 'publish_date', 'sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}">
                            <i class="fa-solid fa-sort{{ request('order_by') === 'publish_date' ? (request('sort') === 'asc' ? '-up' : '-down') : '' }}"></i>
                        </a>
                    </th>
                    <th class="border-b-2 border-giris px-4 py-2">İşlemler</th>
                </tr>
            </thead>
            <tbody class="clickable-rows text-sm">
                @forelse ($books as $index => $book)
                <tr class="{{ $index % 2 == 0 ? 'bg-background' : 'bg-bg' }} text-white text-xs sm:text-base font-poppins cursor-pointer" data-url="{{ route('books.show', $book->id) }}">
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->id }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->name }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->room }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->shelf }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->row }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->genre->name}}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2 line-clamp-1 truncate text-xs sm:text-base">{{ $book->author ? $book->author->first_name . ' ' . $book->author->last_name : 'N/A' }}</td>
                    <td class="clickable-row border-l-2 border-giris px-4 py-2">{{ $book->publish_date}}</td>
                    <td class="border-r-2 border-giris px-4 py-2 flex space-x-2 justify-center items-center">
                        <a href="{{ route('books.show', $book->id) }}" class="text-white p-2 border-l-2 px-3">
                            <i class="fa-solid fa-magnifying-glass opacity-70"></i>
                        </a>
                        <a href="{{ route('books.show', $book->id) }}" class="text-white p-2 px-3 border-l-2">
                            <i class="fa-solid fa-pencil opacity-70"></i>
                        </a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Bu kitabı silmek istediğinizden emin misiniz?');" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-2 border-l-2 px-3">
                                    <i class="fa-solid fa-trash opacity-70"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-2 text-center text-white font-bold font-poppins">Kayıtlı kitap bulunamadı</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
{{-- <div class="mt-4">
    {{ $books->appends(request()->query())->links('vendor.pagination.tailwind') }}
</div> --}}
<div class="relative mt-4 ml-4 mb-2 z-50">
    <label for="text" class="absolute text-white text-opacity-50 font-poppins bg-backgorund text-sm px-1 left-2 -top-1"> Adı</label>
</div>
<div class="mb-4 mt-4">
    <input type="text" class="ml-4 mt-1 border border-white-opacity-50 w-1/6 px-4 py-3 text-white bg-backgorund">
</div>
<div class="relative w-full h-20 mt-8 border-t-2 z-40">
        <img src="{{asset('images/logo.png')}}" alt="foot logo" class="flex justify-center w-20 h-20 bg-backgorund z-50 px-4 -mb-8 transform -translate-y-10 mx-auto ">
</div>

