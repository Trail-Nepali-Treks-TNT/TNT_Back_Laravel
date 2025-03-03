<form id="itineraryAddUpdateForm" method="{{ isset($itinerary) ? 'PUT' : 'POST' }}">
    @csrf
    <input type="hidden" name="id" id="id" value="{{ isset($itinerary) ? $itinerary->id : 0 }}">
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="day" class="form-label">Day</label>
            <input type="text" class="form-control" name="day" id="day" value="{{ $itinerary->day ?? '' }}" required>
            <div class="text-danger error-message" id="day-error"></div> <!-- For custom error message -->
        </div>        
        <div class="mb-3 col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $itinerary->name ?? '' }}" required>
            <div class="text-danger error-message" id="name-error"></div> <!-- For custom error message -->
        </div>
    </div>    
    
    <div class="row">
        <div class="mb-3 col-md-6">
            <label for="latitude" class="form-label">latitude</label>
            <input type="text" class="form-control" name="latitude" id="latitude" value="{{ $itinerary->latitude ?? '' }}" required>
            <div class="text-danger error-message" id="latitude-error"></div> <!-- For custom error message -->
        </div>        
        <div class="mb-3 col-md-6">
            <label for="longitude" class="form-label">longitude</label>
            <input type="text" class="form-control" name="longitude" id="longitude" value="{{ $itinerary->longitude ?? '' }}" required>
            <div class="text-danger error-message" id="longitude-error"></div> <!-- For custom error message -->
        </div>
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" required>{{ $itinerary->description ?? '' }}</textarea>
        <div class="text-danger error-message" id="description-error"></div> <!-- For custom error message -->
    </div>

    <button id="submitItineraryForm" type="button" class="btn btn-primary">
        {{ isset($itinerary) ? 'Update Itinerary' : 'Save Itinerary' }}
    </button>
</form>