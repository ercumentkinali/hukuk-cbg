<header class="relative w-full h-20 border-b">
    <div class="w-full h-full flex justify-between z-30">
        <div class="left flex top-0 left-0 ">
            <div class="mega-menu">
                <img src="{{ asset('images/mega-menu.png') }}" id="open-modal" alt="Menu Image" class="w-5 h-5 m-8 cursor-pointer">
            </div>
            <div id="menu-modal" class="fixed inset-0 z-[60] hidden bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-backgorund p-6 rounded-lg shadow-lg w-96 z-60 flex flex-col justify-center items-center">
                    <div class="relative flex items-center justify-center w-12 h-12 -mt-8">
                        <img src="{{ asset('images/exit.png') }}" alt="x icon" id="close-modal" class="cursor-pointer w-4 h-4">
                    </div>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="flex w-2/6 h-auto mt-5 bg-backgorund p-6">
                    <ul class="text-white font-poppins text-lg">
                        <li class="mb-3">
                            <a href="{{ route('books.index') }}" class="block hover:text-gray-300 border-b border-white-opacity-50 pb-2">KİTAP LİSTESİ</a>
                        </li>
                        <li class="mb-3">
                            <a href="{{ route('books.create') }}" class="block hover:text-gray-300 border-b border-white-opacity-50 pb-2">KİTAP EKLE</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="hover:text-gray-300">ÇIKIŞ YAP</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="absolute inset-0 m-auto w-36 z-40 px-4 mt-12 flex justify-center items-center">
            <a href="{{ route('books.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-auto mt-5 bg-backgorund p-6">
            </a>

        </div>

        <div class="absolute inset-x-0 bottom-0 h-4 bg-backgorund z-20"></div>

        <div class="right flex right-0 top-0">
            <a href="#" id="logout-link">
                <img src="{{ asset('images/logout.png') }}" alt="Logout Image" class="w-5 h-5 m-8">
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</header>

