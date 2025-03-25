<div class="card card-body card-body--alternate mb-0">

    <div id="itinerary_form_list">
        <table class="table table-bordered search-table v-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Included</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packageInclusions as $index => $incSingle)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $incSingle->name }}</td>
                    <td>{{ $incSingle->is_included ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="javascript:void(0);" onclick='getInclusionForm("{{ $incSingle->id }}")'
                            style="background-color:#6610f2; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                            <i class="fa-regular fa-pen-to-square" style="color: white;"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        No inlusions available yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="inclusion_form_container">
        @include('PackageInclusion.inclusion_form')
    </div>
</div>