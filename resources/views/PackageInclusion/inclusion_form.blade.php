<form id="inclusionAddUpdateForm" method="{{ isset($inclusion) ? 'PUT' : 'POST' }}">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ isset($inclusion) ? $inclusion->id : 0 }}">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $inclusion->name ?? '' }}" required>
            <div class="text-danger error-message" id="name-error"></div> <!-- For custom error message -->
        </div>
        <div class="mb-3 col-md-6 mt-4 pt-2">
            <label for="is_included" class="form-label">Is Included?</label>
            <!-- Hidden input ensures a default value (0) is sent when the checkbox is unchecked -->
            <input type="hidden" name="is_included" value="0">
            <input type="checkbox" class="form-check-input" name="is_included" id="is_included" value="1"
                {{ old('is_included', $inclusion->is_included ?? false) ? 'checked' : '' }}>
        </div>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" required>{{ $inclusion->description ?? '' }}</textarea>
        <div class="text-danger error-message" id="description-error"></div> <!-- For custom error message -->
    </div>

    <button id="submitInclusionForm" type="button" class="btn btn-primary">
        {{ isset($inclusion) ? 'Update Inclusion' : 'Save Inclusion' }}
    </button>
</form>