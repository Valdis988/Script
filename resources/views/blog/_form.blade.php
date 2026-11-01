<div class="form-row">
    <label for="title">Заголовок</label>
    <input
        type="text"
        id="title"
        name="title"
        value="{{ old('title', $blog->title ?? '') }}"
    >
    @error('title')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-row">
    <label for="description">Короткий опис</label>
    <textarea id="description" name="description" rows="3">{{ old('description', $blog->description ?? '') }}</textarea>
    @error('description')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-row">
    <label for="text">Текст</label>
    <textarea id="text" name="text" rows="10">{{ old('text', $blog->text ?? '') }}</textarea>
    @error('text')
    <p class="error">{{ $message }}</p>
    @enderror
</div>

<div class="form-row">
    <label for="category_id">Категорія</label>
    <select id="category_id" name="category_id">
        <option value="">— Без категорії —</option>
        @foreach ($categories as $id => $name)
            <option
                value="{{ $id }}"
                @selected(old('category_id', $blog->category_id ?? '') == $id)
            >
                {{ $name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
    <p class="error">{{ $message }}</p>
    @enderror
</div>
