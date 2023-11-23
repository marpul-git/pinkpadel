<div class="form-group">
    <label for="start_time">Hora de inicio</label>
    <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $section->start_time ?? null }}" />
</div>

<div class="form-group">
    <label for="end_time">Hora de fin</label>
    <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $section->end_time ?? null }}" />
</div>
