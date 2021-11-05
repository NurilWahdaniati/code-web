<?php

namespace App\Http\Livewire;

use App\Models\Deteksi;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public $tanggal = [], $tinggi = [];
    public function render()
    {
        $gambar = Array();
        $deteksis = Deteksi::all();
        foreach ($deteksis as $deteksi) {
            $gambar["".$deteksi->created_at.""]= $deteksi->file;
        }

        return view('livewire.index', [
            'tanggals' => Deteksi::all(),
            'images' => $gambar,
            'tinggis' => Deteksi::pluck('tinggi')->all(),
        ]);
    }
    public function setDateAttribute($value)
    {
        $date = (new Carbon($value))->format('d/m/y');
        return $date;
    }
}
