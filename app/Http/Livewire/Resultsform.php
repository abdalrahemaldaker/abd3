<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Sclass;
use App\Models\Stage;
use Livewire\Component;

class Resultsform extends Component
{
    public $stages;
    public $stageId;
    public $sclassId;
    public $sclasses;
    public $courseId;
    public $courses;
    public $examId;
    public $exams;

    public function mount()
    {
        $this->stages= Stage::orderBy('name')->get();
        if ($this->stageId)
        {
            $this->sclasses=Sclass::where('stage_id',$this->stageId)->get();
            $this->exams=Exam::where('stage_id',$this->stageId)->get();
        }
        else {$this->sclasses =[];
            $this->exams =[];}

        if ($this->sclassId)
            $this->courses=Course::where('sclass_id',$this->sclassId)->get();
        else
            $this->courses =[];
    }

    public function updatedStageId()
    {
        if ($this->stageId)
        {
            $this->sclasses=Sclass::where('stage_id',$this->stageId)->get();
            $this->exams=Exam::where('stage_id',$this->stageId)->get();
        }
    }
    public function updatedsclassId()
    {
        if ($this->sclassId)
        {
            $this->courses=Course::where('sclass_id',$this->sclassId)->get();

        }
    }

    public function render()
    {
        return view('livewire.resultsform');
    }
}
