<nav class="bg-white shadow-sm mb-6">
    <div class="w-full px-6 py-5 flex justify-between items-center">

        <!-- Logo dan Nama -->
        <div class="flex items-center gap-3">
            <span class="text-3xl">🐾</span>

            <div>
                <h1 class="font-bold text-xl text-[#9C6644]">
                    PetshopKu
                </h1>
                <p class="text-sm text-gray-500">
                    Sistem Manajemen Produk
                </p>
            </div>
        </div>

        <div class="flex items-center gap-6">

    <a href="{{ route('products.index') }}"
       class="flex items-center gap-1 text-gray-700 hover:text-[#B08968]">
        <span class="material-icons text-sm">dashboard</span>
        Dashboard
    </a>

    <a href="#"
       class="flex items-center gap-1 text-gray-700 hover:text-[#B08968]">
        <span class="material-icons text-sm">shopping_cart</span>
        Transaksi
    </a>

    <a href="#"
       class="flex items-center gap-1 text-gray-700 hover:text-[#B08968]">
        <span class="material-icons text-sm">inventory_2</span>
        Produk
    </a>

</div>
    Halo, {{ Auth::user()->name }}
</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="bg-gradient-to-r from-[#E6C7B2] to-[#B08968] text-white px-5 py-2 rounded-lg hover:from-[#D8B4A0] hover:to-[#9C6644] transition duration-300 shadow">
                    Logout
                </button>
            </form>

        </div>

    </div>
</nav>