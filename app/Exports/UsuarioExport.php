<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UsuarioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $id;
    
    public function __construct($id)
    {
        $this->id = $id;
    }

    public function view(): View
    {
        return view('exports.usuarioname', [
            'usuario' => User::where('id', $this->id)->get()
        ]);
    }
}
