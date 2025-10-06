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
                    <div class="min-h-screen bg-gray-100 p-8">
                        <div class="max-w-7xl mx-auto">
                            <div class="bg-white shadow-md rounded my-6">
                                <table class="min-w-max w-full table-auto">
                                    <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="py-3 px-6 text-left w-1/12">ID</th>
                                        <th class="py-3 px-6 text-left w-2/12">Name</th>
                                        <th class="py-3 px-6 text-left w-2/12">Email</th>
                                        <th class="py-3 px-6 text-left w-5/12">Message</th>
                                        <th class="py-3 px-6 text-left w-2/12">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-gray-600 text-sm font-light">
                                    @foreach ($posts as $post)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left whitespace-nowrap">{{ $post->id }}</td>
                                            <td class="py-3 px-6 text-left">{{ $post->name }}</td>
                                            <td class="py-3 px-6 text-left">{{ $post->email }}</td>
                                            <td class="py-3 px-6 text-left">{{ $post->message }}</td>
                                            <td class="py-3 px-6 text-left">{{ $post->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endrole

                    @role('user')
                    <p>You can't see this content, because you are not Superadmin group</p>
                    @endrole


                </div>




            </div>
        </div>
    </div>
</x-app-layout>
