<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;

class Beranda extends Component
{
    public $totalUser;
    public $totalProduk;
    public $totalTransaksi;
    public $totalStok;

    public function mount()
    {
        $this->getDataRealTime();
    }

    public function getDataRealTime()
    {
        $this->totalUser = User::count();
        $this->totalProduk = Produk::count();
        $this->totalTransaksi = Transaksi::count();
        $this->totalStok = Produk::sum('stok');
    }

    public function render()
    {
        // Refresh data setiap render untuk real-time
        $this->getDataRealTime();
        
        return view('livewire.beranda');
    }
}