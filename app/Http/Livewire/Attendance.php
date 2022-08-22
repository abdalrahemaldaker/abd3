<?php

namespace App\Http\Livewire;

use App\Models\Sclass;
use App\Models\Stage;
use Livewire\Component;

class Attendance extends Component
{
    public $stages;
    public $stageId;
    public $sclassId;
    public $sclasses;

    public function mount()
    {
        $this->stages= Stage::orderBy('name')->get();
        if ($this->stageId)
        {
            $this->sclasses=Sclass::where('stage_id',$this->stageId)->get();
        }
        else $this->sclasses =[];
    }

    public function updatedStageId()
    {
        if ($this->stageId)
        {
            $this->sclasses=Sclass::where('stage_id',$this->stageId)->get();
        }
    }

    public function render()
    {
        return view('livewire.attendance');
    }
}
