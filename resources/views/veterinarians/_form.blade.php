<div class="form-group">
    <label for="name">ПІБ</label>
    <input id="name" name="name" type="text"
           value="{{ old('name', $veterinarian->name ?? '') }}">
    @error('name') <p class="error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="position">Посада</label>
    <input id="position" name="position" type="text"
           value="{{ old('position', $veterinarian->position ?? '') }}">
    @error('position') <p class="error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="specialization">Спеціалізація</label>
    <input id="specialization" name="specialization" type="text"
           value="{{ old('specialization', $veterinarian->specialization ?? '') }}">
    @error('specialization') <p class="error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="experience_years">Досвід (років)</label>
    <input id="experience_years" name="experience_years" type="number" min="0" max="60"
           value="{{ old('experience_years', $veterinarian->experience_years ?? 0) }}">
    @error('experience_years') <p class="error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="phone">Телефон</label>
    <input id="phone" name="phone" type="text"
           value="{{ old('phone', $veterinarian->phone ?? '') }}">
    @error('phone') <p class="error">{{ $message }}</p> @enderror
</div>
