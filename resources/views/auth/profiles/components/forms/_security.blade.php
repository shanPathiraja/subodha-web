<div class="row">
    <div class="col-lg-4">
        <div class="mb-6">
            <h4 class="font-bold text-gray-800">
                Security
            </h4>

            <p class="text-sm text-gray-600 max-w-sm">
                Take care while you handle these settings. These actions will cause permanent loss of data.
            </p>
        </div>
    </div>

    <div class="col-lg-8">
        <div>
            <div class="bg-white pb-5">
                <h5 class="font-bold text-gray-800 mb-3">
                    Delete your account
                </h5>

                <p class="text-sm text-gray-600 mb-6">
                    Once you delete your account, you will lose all data associated with it.
                </p>

                <button class="btn bg-red-200 text-red-800 shadow-none" type="button" data-toggle="modal" data-target="#deleteModal{{ $user->username }}">Delete account</button>
            </div>
        </div>
    </div>
</div>
