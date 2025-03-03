<div class="card card-body card-body--alternate mb-0">

    <div id="itinerary_form_list">
        <table class="table table-bordered search-table v-middle">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packageItineraries as $itinerarySingle)
                <tr>
                    <td>{{ $itinerarySingle->day }}</td>
                    <td>{{ $itinerarySingle->name }}</td>
                    <td>{{ $itinerarySingle->latitude }}</td>
                    <td>{{ $itinerarySingle->longitude }}</td>
                    <td>
                        <a href="javascript:void(0);" onclick='getItineraryForm("{{ $itinerarySingle->id }}")'
                            style="background-color:#6610f2; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                            <i class="fa-regular fa-pen-to-square" style="color: white;"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        No itinerary available yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="itinerary_form_container">
        @include('PackageItinerary.itinerary_form')
    </div>
</div>