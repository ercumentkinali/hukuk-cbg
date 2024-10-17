    <main class="relative bottom-0 left-0 m-auto w-full h-full flex flex-col items-center justify-center">
        <img src="{{ asset('images/logo.png') }}" alt="logo" class="z-30 bg-backgorund -mb-12">
        <div class="flex flex-col items-center justify-center z-20 border border-dashed p-4 border-hover border-opacity-30">
            <h2 class="text-white mt-10 mb-2 font-poppins">KÜTÜPHANE</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mt-4 font-poppins">
                    <label for="email" class="sr-only">E-posta</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="E-posta"
                        required
                        autofocus
                        class="w-full p-3 border border-gray-300"
                    >
                </div>
                <div class="mt-2 font-poppins">
                    <label for="password" class="sr-only">Şifre</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Şifre"
                        required
                        class="w-full p-3 border border-gray-300"
                    >
                </div>
                <div class="mt-2">
                    <button type="submit" class="w-full p-3 bg-giris hover:bg-hover text-white font-bold font-poppins">GİRİŞ</button>
                </div>
                <div class="mt-2">
                    <p class="flex text-white font-poppins opacity-50 justify-center items-center">Beni Hatırla</p>
                </div>
            </form>
        </div>
        <div class="information opacity-50 text-sm mt-10">
            <p class="text-white font-poppins">E posta ve şifre ile sisteme giriş yapabilirsiniz</p>
        </div>
    </main>

