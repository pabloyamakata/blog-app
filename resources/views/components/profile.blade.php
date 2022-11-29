<div class="overflow-hidden bg-white shadow sm:rounded-lg">
    <div class="px-4 py-5 sm:px-6">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Your Profile</h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal information</p>
    </div>
       
    <div class="border-t border-gray-200">
        <dl>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Username</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ auth()->user()->name }}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Email address</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ auth()->user()->email }}</dd>
            </div>
            <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                <dt class="text-sm font-medium text-gray-500">Roles</dt>
                <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    @if(auth()->user()->getRoleNames()->count() == 1)
                        {{ auth()->user()->getRoleNames()[0] }}
                    @elseif(auth()->user()->getRoleNames()->count() > 1)
                        {{ auth()->user()->getRoleNames()->implode(', ') }}
                    @else
                        {{ 'None' }}
                    @endif
                </dd>
            </div>
        </dl>
    </div>
</div>
