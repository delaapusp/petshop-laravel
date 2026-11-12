<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Item Petshop</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-5">

        <h1 class="text-2xl font-bold mb-5">Tabel Item Petshop</h1>

        <button
            type="button"
            onclick="toggle_modal()"
            class="bg-pink-500 text-white px-4 py-2 rounded hover:bg-pink-600">
            + Tambah Item
        </button>

        <table class="table-auto w-full mt-5 border-collapse border bg-white">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border p-2">Nama Item</th>
                    <th class="border p-2">Harga</th>
                    <th class="border p-2">Stock</th>
                    <th class="border p-2">Deskripsi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td class="border p-2">{{ $product->nama_barang }}</td>
                        <td class="border p-2 font-semibold text-green-600">
    Rp {{ number_format($product->harga, 0, ',', '.') }}
</td>
                        <td class="border p-2">{{ $product->stock }}</td>
                        <td class="border p-2">{{ $product->deskripsi }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="border p-2 text-center">
                            Belum ada data
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>

    <!-- Modal -->
    <div
        id="modal-tambah-item"
        class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

        <div class="bg-white p-6 rounded-xl shadow-lg w-96">

            <h2 class="text-lg font-bold mb-4">
                Tambah Item Baru
            </h2>

            <form action="{{ route('products.store') }}" method="POST">
                @csrf

                <label class="block mb-1">Nama Barang</label>
                <input
                    type="text"
                    name="nama_barang"
                    class="w-full border p-2 mb-3 rounded"
                    required>

                <label class="block mb-1">Harga</label>
                <input
                    type="number"
                    name="harga"
                    class="w-full border p-2 mb-3 rounded"
                    required>

                <label class="block mb-1">Stock</label>
                <input
                    type="number"
                    name="stock"
                    class="w-full border p-2 mb-3 rounded"
                    required>

                <label class="block mb-1">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    class="w-full border p-2 mb-3 rounded"
                    required></textarea>

                <div class="flex justify-end gap-3">
                    <button
                        type="button"
                        onclick="toggle_modal()"
                        class="text-gray-600">
                        Batal
                    </button>

                    <button
                        type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>

            </form>

        </div>

    </div>

    <script>
        function toggle_modal() {
            const modal = document.getElementById('modal-tambah-item');

            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            } else {
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        }
    </script>

</body>
</html>