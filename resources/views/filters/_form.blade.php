@csrf

<div>
    <label for="filter_name">Назва</label>
    <input
        type="text"
        id="filter_name"
        name="filter_name"
        value="{{ old('filter_name', $filter->filter_name ?? '') }}"
        maxlength="100"
        required
    >
    @error('filter_name')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div>
    <label for="filter_description">Опис</label>
    <textarea
        id="filter_description"
        name="filter_description"
        rows="4"
    >{{ old('filter_description', $filter->filter_description ?? '') }}</textarea>
    @error('filter_description')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
