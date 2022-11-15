<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tarea as ModelTarea;

class Tarea extends Component
{
public $hola="hola comp";
public ModelTarea $tarea;
public $nombre, $descripcion;
public $tareas;

public function mount(){

    $this->tareas = ModelTarea::get();
    $this->tarea = new ModelTarea();

}

    public function render()
    {
        return view('livewire.tarea');
    }



    protected $rules = [
        'tarea.nombre' => 'required|min:6',
        'tarea.descripcion' => 'required|max:200',
    ];


    public function save(){

        $this->validate();
        //dd($this->tarea);

        $this->tarea->save();

        $this->mount();
        session()->flash('mensaje', 'Tarea Guardada');

      /*    $tareaNueva = ModelTarea::create([
            'nombre' => $this->tarea->nombre,
            'descripcion' => $this->tarea->descripcion,
        ]);*/
    }
        public function editar($id){
            //dd($id);

$this->tarea=ModelTarea::find($id);



            }


public function borrar($id){
$borrarTarea = ModelTarea::find($id)->delete();
$this->mount();
session()->flash('mensaje','Tarea Eliminada');
}
//metodo para validar en tiempo real
public function updatedTareaNombre(){
    $this->validate();
}

}
