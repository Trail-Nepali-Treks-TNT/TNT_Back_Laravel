<div class="card card-body card-body--alternate mb-0">

    <div id="package_faq_form_list">
        <table class="table table-bordered search-table v-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($packageFaqList as $index => $packageFaqSingle)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $packageFaqSingle->question }}</td>
                    <td>{{ $packageFaqSingle->answer }}</td>
                    <td>
                        <a href="javascript:void(0);" onclick='getPackageFaqForm("{{ $packageFaqSingle->id }}")'
                            style="background-color:#6610f2; border-radius: .3rem; padding: .13rem .6rem; margin-right: .4rem;">
                            <i class="fa-regular fa-pen-to-square" style="color: white;"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        No FAQ available yet.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div id="package_faq_form_container">
        @include('PackageFaq.package_faq_form')
    </div>
</div>