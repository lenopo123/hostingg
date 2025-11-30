<?php

namespace App\Livewire;

use App\Models\Produk as ModelProduk;
use Livewire\Component;

class Produk extends Component
{
    // Properti Publik (data binding Livewire)
    public $pilihanMenu = 'lihat';
    public $nama;
    public $kode;
    public $harga;
    public $stok;
    public $produkTerpilih;

    // Fungsi untuk memilih produk yang akan di-edit
    public function pilihEdit($id)
    {
        // Temukan produk berdasarkan ID dan isi properti dengan data produk
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        $this->nama           = $this->produkTerpilih->nama;
        $this->kode           = $this->produkTerpilih->kode;
        $this->harga          = $this->produkTerpilih->harga;
        $this->stok           = $this->produkTerpilih->stok;
        // Ubah tampilan ke mode 'edit'
        $this->pilihanMenu    = 'edit';
    }

    // Fungsi untuk memilih produk yang akan di-hapus
    public function pilihHapus($id)
    {
        // Temukan produk berdasarkan ID
        $this->produkTerpilih = ModelProduk::findOrFail($id);
        // Ubah tampilan ke mode 'hapus'
        $this->pilihanMenu    = 'hapus';
    }

    // Fungsi untuk menghapus produk
    public function hapus()
    {
        // Hapus produk yang sudah dipilih
        $this->produkTerpilih->delete();
        // Reset properti dan kembali ke tampilan 'lihat'
        $this->reset();
    }

    // Fungsi untuk membatalkan aksi (seperti hapus)
    public function batal()
    {
        // Reset properti dan kembali ke tampilan 'lihat'
        $this->reset();
    }

    // Fungsi untuk menyimpan produk baru
    public function simpan()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required',
            'kode' => ['required', 'unique:produks,kode'], // Validasi unik untuk kolom 'kode' di tabel 'produks'
            'harga' => 'required',
            'stok' => 'required',
        ], [
            // Pesan error kustom
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode sudah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        // Buat instance model baru dan simpan data
        $simpan       = new ModelProduk();
        $simpan->nama = $this->nama;
        $simpan->kode = $this->kode;
        $simpan->stok = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        // Reset properti input spesifik setelah simpan
        $this->reset('nama', 'kode', 'stok', 'harga');
        // Ubah tampilan ke mode 'lihat'
        $this->pilihanMenu = 'lihat';
    }

    // Fungsi untuk menyimpan perubahan pada produk yang di-edit
    public function simpanEdit()
    {
        // Validasi input
        $this->validate([
            'nama' => 'required',
            // Validasi unik untuk kolom 'kode', mengabaikan ID produk yang sedang di-edit
            'kode' => ['required', 'unique:produks,kode,'.$this->produkTerpilih->id],
            'harga' => 'required',
            'stok' => 'required',
        ], [
            // Pesan error kustom
            'nama.required' => 'Nama Harus Diisi',
            'kode.required' => 'Kode Harus Diisi',
            'kode.unique' => 'Kode sudah digunakan',
            'harga.required' => 'Harga Harus Diisi',
            'stok.required' => 'Stok Harus Diisi',
        ]);

        // Gunakan produk yang sudah dipilih sebagai instance untuk di-update
        $simpan        = $this->produkTerpilih;
        $simpan->nama  = $this->nama;
        $simpan->kode  = $this->kode;
        $simpan->stok  = $this->stok;
        $simpan->harga = $this->harga;
        $simpan->save();

        // Reset semua properti setelah edit
        $this->reset();
        // Ubah tampilan ke mode 'lihat'
        $this->pilihanMenu = 'lihat';
    }

    // Fungsi untuk mengubah properti pilihanMenu (digunakan oleh tombol di view)
    public function pilihMenu($menu)
    {
        $this->pilihanMenu = $menu;
    }

    // Fungsi render yang menampilkan view Livewire dan mengirim data semua produk
    public function render()
    {
        return view('livewire.produk')->with([
            'SemuaProduk' => ModelProduk::all()
        ]);
    }
}