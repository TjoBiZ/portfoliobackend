<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-300">
                    {{ __("You're logged in!") }}
                </div>


                <div class="p-6 text-neutral-300">

                    @role('superadmin')
                    <p>This text can see user from Superadmin group</p>
                    @endrole


                    @hasrole('superadmin')
                    <p>This text can see user from ONLY Superadmin group, not any other group.</p>
                    @endhasrole

                    @role('user')
                    <p>This text can see user from User group</p>
                    @endrole

                    @hasrole('user')
                    <p>This text can see user from ONLY User group, not any other group.</p>
                    @endhasrole

                </div>




            </div>
        </div>
    </div>
</x-app-layout>
