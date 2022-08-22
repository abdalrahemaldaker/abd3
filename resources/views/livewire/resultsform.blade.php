
<div >
    <div class="form-group">
        <label for="stageId" class="form-label">Stage</label>
        <select wire:model="stageId" class="form-control" wire:change="$emit('updatedStageId')" name="" id="">
            <option value="">Select a Stage</option>
            @foreach ($stages as $stage)
                <option value="{{ $stage->id }}"

                    @if ($stage->id==$stageId)
                        selected
                @endif>{{ $stage->name }}</option>
            @endforeach
        </select>

    </div>
    <div class="form-group"></div>

    <label for="sclassId" class="form-label"> Class</label>
    <select wire:model="sclassId" class="form-control" name="sclass" id="">
        <option value="">Select a Class</option>
        @foreach ($sclasses as $sclass)
            <option value="{{ $sclass->id }}"

                @if ($sclass->id==$sclassId)
                selected
        @endif>{{ $sclass->name }}</option>
        @endforeach
    </select>
    <label for="courseId" class="form-label"> Course</label>
    <select wire:model="courseId" class="form-control" name="course" id="">
        <option value="">Select a Class</option>
        @foreach ($courses as $course)
            <option value="{{ $course->id }}"

                @if ($course->id==$courseId)
                selected
        @endif>{{ $course->name }}</option>
        @endforeach
    </select>

    <label for="examId" class="form-label">Exam</label>
    <select wire:model="examId" class="form-control" name="exam" id="">
        <option value="">Select an Exam</option>
        @foreach ($exams as $exam)
            <option value="{{ $exam->id }}"

                @if ($exam->id==$examId)
                selected
        @endif>{{ $exam->name }}</option>
        @endforeach
    </select>
</div>
