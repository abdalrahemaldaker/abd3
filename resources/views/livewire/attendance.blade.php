<div >
    <div class="form-group">
        <label for="stageId" class="form-label">Country</label>
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
</div>
