<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Filament\Forms;
use Illuminate\Contracts\View\View;

use Illuminate\Support\Facades\Auth;


use Livewire\Component;

class Productos extends Component implements Forms\Contracts\HasForms
{



    use Forms\Concerns\InteractsWithForms;



    public $nombre = '';
    public $descripcion = '';
    public $user_id = '';


    public function render()
    {
        return view('livewire.productos');
    }

    public function mount(): void
    {
        $this->form->fill();
    }

    public function create(): void
    {
        $producto = Producto::create($this->form->getState());

        $this->form->model($producto)->saveRelationships();
    }

    protected function getFormModel(): string
    {
        return Producto::class;
    }


    public function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('nombre')->required(),
            Forms\Components\TextInput::make('descripcion'),
            Forms\Components\TextInput::make('user_id')->hidden(true)->default(
                Auth::id()
            ),
            // ...
        ];
    }


}
