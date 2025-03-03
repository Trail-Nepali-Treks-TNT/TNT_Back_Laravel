<div class="row m-3">
    <div class="col-lg-12 m-2">

        <form enctype="multipart/form-data" method="post" id="packageImageUpoadForm">
            <label for="Image">Upload Image:</label>
            <div class="row image-container" id="packageImageList">
                @forelse($packageImages as $packageImg)
                {
                <div class="col-lg-2 col-md-4 text-center uploaded-image m-2">
                    <img src="{{{{ $packageImg->file_url }}}}" alt="Picture" class="img-responsive radius equal-size-image d-sm-table" />
                    <input name="DeleteImage" type="checkbox" id="{{$packageImg->id}}" value="{{$packageImg->id}}" />
                    <label for="DeleteImage-{{$packageImg->id}}">Remove</label>
                    <br>
                </div>
                }
            </div>
            <div class="row mt-2">
                <div class="align-items-center flex-column">
                    <div id="packageImageContainer" class="dropzone">
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <button class="button h-50 px-24 dark-1 bg-blue-1 text-white mt-3" type="submit">
                    Save Changes <div class="icon-arrow-top-right ml-15"></div>
                </button>
            </div>

        </form>

    </div>

</div>