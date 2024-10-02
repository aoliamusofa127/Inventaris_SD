@extends('layout.template')
@section('content')
    <h1 class="text-center text-3xl mt-5 mb-5">Barang</h1>
    <!-- alert-->
    <div class="mt-3 mb-3">
        @if (session('message'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <span class="font-medium">{{ session('message') }}</span>
            </div>
        @endif
        @if ($errors->has('errors'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-medium">{{ $errors->first('errors') }}</span>
            </div>
        @endif
    </div>
    <!-- end-alert-->
    <button type="button" data-modal-target="modal-tambah" data-modal-toggle="modal-tambah"
        class="text-white mt-3 mb-5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center me-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
        Tambah
    </button>
    <a href="show_pdf"
        class="text-white mt-3 mb-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Print
    </a>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama barang
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penerbit
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tahun
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kondisi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($data as $val)
                    @foreach ($val->JoinToKategori as $kategori)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $i++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $kategori->nama_kategori }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->nama_barang }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->penerbit }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->tahun_pelajaran }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->jumlah }}
                            </td>
                            <td class="px-6 py-4">
                                Rp. {{ number_format($val->harga, 0) }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->tanggal }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->kondisi }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $val->keterangan }}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" data-modal-target="modal-edit{{ $val->id_barang }}"
                                    data-modal-toggle="modal-edit{{ $val->id_barang }}"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">
                                    Edit
                                </button>
                                <button type="button" data-modal-target="modal-hapus{{ $val->id_barang }}"
                                    data-modal-toggle="modal-hapus{{ $val->id_barang }}"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- modal tamabah  data -->
    <div id="modal-tambah" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Tambah data
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="modal-tambah">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="addbarang" method="POST">
                        @csrf
                        <div>
                            <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kategori barang
                            </label>
                            <select id="kategori" name="id_kategori"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih kategori --</option>
                                @foreach ($data_kategori as $row)
                                    <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="nama-barang" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Nama barang
                            </label>
                            <input type="text" name="nama_barang" id="nama-barang"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="nama barang" required />
                        </div>
                        <div>
                            <label for="penerbit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Penerbit <p class="text-red-700">("boleh kosong jika inventaris bukan buku")</p>
                            </label>
                            <input type="text" name="penerbit" id="penerbit"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="nama penerbit buku" />
                        </div>
                        <div>
                            <label for="tahun-pelajaran"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tahun pelajaran <p class="text-red-700">("boleh kosong jika inventaris bukan buku")</p>
                            </label>
                            <input type="text" name="tahun_pelajaran" id="tahun-pelajaran"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="tahun pelajaran" />
                        </div>
                        <div>
                            <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Jumlah
                            </label>
                            <input type="number" name="jumlah" id="jumlah"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="jumlah" required />
                        </div>
                        <div>
                            <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Harga
                            </label>
                            <input type="number" name="harga" id="harga"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="harga" required />
                        </div>
                        <div>
                            <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Tanggal pembelian
                            </label>
                            <input type="date" name="tanggal" id="ta
                            nggal"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="tanggal" required />
                        </div>
                        <div>
                            <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Kondisi
                            </label>
                            <select id="kondisi" name="kondisi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>-- pilih kondisi --</option>
                                <option value="rusak berat">Rusak Berat</option>
                                <option value="rusak sedang">Rusak Sedang</option>
                                <option value="bagus">Bagus</option>
                            </select>
                        </div>
                        <div>
                            <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Keterangan
                            </label>
                            <textarea id="keterangan" rows="4" name="keterangan"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="keterangan barang">
                            </textarea>
                        </div>

                        <button data-modal-hide="modal-tambah" type="button"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Tidak
                        </button>
                        <button type="submit"
                            class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal tambah  data -->

    @foreach ($data as $val)
        @foreach ($val->JoinToKategori as $row)
            <!-- modal edit  data -->
            <div id="modal-edit{{ $val->id_barang }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Edit data
                            </h3>
                            <button type="button"
                                class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="modal-edit{{ $val->id_barang }}">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-4 md:p-5">
                            <form class="space-y-4" action="updatebarang" method="POST">
                                @csrf
                                <input type="hidden" name="id_barang" value="{{ $val->id_barang }}">
                                <div>
                                    <label for="kategori"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Kategori barang
                                    </label>
                                    <select id="kategori" name="id_kategori"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $val->id_kategori }}">{{ $row->nama_kategori }}</option>
                                        @foreach ($data_kategori as $row)
                                            <option value="{{ $row->id_kategori }}">{{ $row->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="nama-barang"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Nama barang
                                    </label>
                                    <input type="text" name="nama_barang" value="{{ $val->nama_barang }}"
                                        id="nama-barang"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="nama barang" required />
                                </div>
                                <div>
                                    <label for="penerbit"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Penerbit
                                        <p class="text-red-700">("boleh kosong jika inventaris bukan buku")</p>
                                    </label>
                                    <input type="text" name="penerbit" value="{{ $val->penerbit }}" id="penerbit"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="nama penerbit buku" />
                                </div>
                                <div>
                                    <label for="tahun-pelajaran"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tahun pelajaran
                                        <p class="text-red-700">("boleh kosong jika inventaris bukan buku")</p>
                                    </label>
                                    <input type="text" name="tahun_pelajaran" value="{{ $val->tahun_pelajaran }}"
                                        id="tahun-pelajaran"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="tahun pelajaran" />
                                </div>
                                <div>
                                    <label for="jumlah"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Jumlah
                                    </label>
                                    <input type="number" name="jumlah" value="{{ $val->jumlah }}" id="jumlah"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="jumlah" required />
                                </div>
                                <div>
                                    <label for="harga"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Harga
                                    </label>
                                    <input type="number" name="harga" value="{{ $val->harga }}" id="harga"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="harga" required />
                                </div>
                                <div>
                                    <label for="tanggal"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Tanggal pembelian
                                    </label>
                                    <input type="date" name="tanggal" value="{{ $val->tanggal }}" id="tanggal"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        required />
                                </div>
                                <div>
                                    <label for="kondisi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Kondisi
                                    </label>
                                    <select id="kondisi" name="kondisi"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="{{ $val->kondisi }}">{{ $val->kondisi }}</option>
                                        <option value="rusak berat">Rusak Berat</option>
                                        <option value="rusak sedang">Rusak Sedang</option>
                                        <option value="bagus">Bagus</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="keterangan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                        Keterangan
                                    </label>
                                    <textarea id="keterangan" rows="4" name="keterangan"
                                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="keterangan barang">{{ $val->keterangan }}
                                </textarea>
                                </div>

                                <button data-modal-hide="modal-edit{{ $val->id_barang }}" type="button"
                                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Tidak
                                </button>
                                <button type="submit"
                                    class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                    Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal edit  data -->

            <!-- modal hapus-->
            <div id="modal-hapus{{ $val->id_barang }}" tabindex="-1"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="modal-hapus{{ $val->id_barang }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Yakin ingin menghapus
                                data
                                ini?
                            </h3>
                            <a href="/deletebarang/{{ $val->id_barang }}"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Ya
                            </a>
                            <button data-modal-hide="modal-hapus{{ $val->id_barang }}" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                Tidak
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end modal hapus-->
        @endforeach
    @endforeach
@endsection
