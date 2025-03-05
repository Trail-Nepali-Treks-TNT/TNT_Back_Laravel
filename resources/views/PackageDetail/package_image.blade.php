<div class="card card-body card-body--alternate mb-0 row m-3">
    <div class="col-lg-12 m-2">

        <form enctype="multipart/form-data" method="post" id="packageImageUpoadForm">
            @csrf
            <label for="Image">Upload Image:</label>
            <div class="row image-container" id="packageImageList">
                @if(!empty($packageImages) && $packageImages->count())
                @foreach($packageImages as $packageImg)
                <div class="col-lg-2 col-md-4 text-center uploaded-image m-2">
                    <img src="{{ $packageImg->file_url }}" alt="Picture" class="img-responsive radius equal-size-image d-sm-table" />
                    <input name="DeleteImage[]" type="checkbox" id="delete-{{$packageImg->id}}" value="{{$packageImg->id}}" />
                    <label for="delete-{{$packageImg->id}}">Remove</label>
                    <br>
                </div>
                @endforeach
                @else
                <p class="text-muted">No images uploaded yet.</p>
                @endif
            </div>

            <div class="row mt-2">
                <div class="align-items-center flex-column">
                    <div id="packageImageContainer" class="dropzone">
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <button class="btn btn-primary" type="submit">
                    Save
                </button>
            </div>

        </form>

    </div>
</div>