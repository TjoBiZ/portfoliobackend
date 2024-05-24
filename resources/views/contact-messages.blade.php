<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-100 leading-tight">
            {{ __('Contact messages') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-black overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-neutral-300">

                    @role('superadmin')
                    <p>This text can see user from Superadmin group</p>
                    @endrole

                    @role('user')
                    <p>You can't see this content, because you are not Superadmin group</p>
                    @endrole


                </div>




            </div>
        </div>
    </div>
</x-app-layout>
