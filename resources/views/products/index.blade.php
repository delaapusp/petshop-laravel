<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Item Petshop</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body class="bg-gray-100">
    @include('navbar')

    <div class="container mx-auto p-5">

        <h1 class="text-2xl font-bold mb-5">Tabel Item Petshop</h1>

        <button
            type="button"
            onclick="toggle_modal()"
            class="bg-gradient-to-r from-[#E6C7B2] to-[#B08968] text-white px-5 py-2 rounded-lg hover:from-[#D8B4A0] hover:to-[#9C6644] transition duration-300 shadow">
            + Tambah Item
        </button>

        <table class="table-auto w-full mt-5 border-collapse border bg-white">
    <thead>
        <tr class="bg-[#DDB892] text-[#5C4033]">
            <th class="border p-2">Nama Item</th>
            <th class="border p-2">Harga</th>
            <th class="border p-2">Stock</th>
            <th class="border p-2">Deskripsi</th>
            <th class="border p-2">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($products as $product)
        <tr>
            <td class="border p-2">{{ $product->nama_barang }}</td>

            <td class="border p-2 font-semibold text-green-600">
                Rp {{ number_format($product->harga,0,',','.') }}
            </td>

            <td class="border p-2">{{ $product->stock }}</td>

            <td class="border p-2">{{ $product->deskripsi }}</td>

            <td class="border p-2 text-center">
                <div class="flex justify-center gap-4">

                    <!-- Tombol Edit -->
                    <button
    type="button"
    onclick='toggle_edit(@json($product))'
    class="text-green-500">
    <span class="material-icons">edit</span>
</button>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('products.destroy',$product->id) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Yakin ingin menghapus data ini?')"
                            class="text-red-600">
                            <span class="material-icons">delete</span>
                        </button>
                    </form>

                </div>
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="5" class="border p-2 text-center">
                Belum ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
<!-- Modal Tambah -->
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
<!-- Modal Edit -->
<div
    id="modal-edit-item"
    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center">

    <div class="bg-white p-6 rounded-xl shadow-lg w-96">

        <h2 class="text-lg font-bold mb-4">
            Edit Item
        </h2>

        <form id="form-edit" method="POST">
            @csrf
            @method('PUT')

            <label class="block mb-1">Nama Barang</label>
            <input
                id="edit_nama_barang"
                type="text"
                name="nama_barang"
                class="w-full border p-2 mb-3 rounded"
                required>

            <label class="block mb-1">Harga</label>
            <input
                id="edit_harga"
                type="number"
                name="harga"
                class="w-full border p-2 mb-3 rounded"
                required>

            <label class="block mb-1">Stock</label>
            <input
                id="edit_stock"
                type="number"
                name="stock"
                class="w-full border p-2 mb-3 rounded"
                required>

            <label class="block mb-1">Deskripsi</label>
            <textarea
                id="edit_deskripsi"
                name="deskripsi"
                class="w-full border p-2 mb-3 rounded"
                required></textarea>

            <div class="flex justify-end gap-3">

                <button
                    type="button"
                    onclick="close_edit()"
                    class="text-gray-600">
                    Batal
                </button>

                <button
                    type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded">
                    Update
                </button>

            </div>
        </form>

    </div>
</div>

<script>
function toggle_modal() {
    const modal = document.getElementById('modal-tambah-item');

    modal.classList.toggle('hidden');
    modal.classList.toggle('flex');
    }

function toggle_edit(item) {

    console.log(item);

    const modal = document.getElementById('modal-edit-item');

    document.getElementById('form-edit').action =
        '/products/' + item.id;

    document.getElementById('edit_nama_barang').value =
        item.nama_barang;

    document.getElementById('edit_harga').value =
        item.harga;

    document.getElementById('edit_stock').value =
        item.stock;

    document.getElementById('edit_deskripsi').value =
        item.deskripsi;

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function close_edit() {
    const modal = document.getElementById('modal-edit-item');

    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>

</body>
</html>