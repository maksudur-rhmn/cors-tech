<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div>
                <div class="text-gray-900 bg-gray-200">
                    <div class="p-4 flex">
                        <h1 class="text-3xl">
                            Users
                        </h1>
                    </div>
                    <div class="p-4 flex">
                        <a href="" class="btn btn-success">Add New</a>
                    </div>

                    @if(session('success'))
                    <div class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                        <p>{{ session('success') }}</p>
                      </div>
                    @endif
                    <div class="px-3 py-4 flex justify-center">
                        <table class="w-full text-md bg-white shadow-md rounded mb-4">
                            <tbody>
                                <tr class="border-b">
                                    <th class="text-left p-3 px-5">SL</th>
                                    <th class="text-left p-3 px-5">Name</th>
                                    <th class="text-left p-3 px-5">Email</th>
                                    <th class="text-left p-3 px-5">Status</th>
                                    <th class="text-right p-3 px-5">Action</th>
                                </tr>
                                {{-- @foreach ($users as $user)
                                <tr class="border-b hover:bg-orange-100 bg-gray-100">
            
                                    <td class="p-3 px-5">{{ $users->firstItem() }}</td>
                                    <td class="p-3 px-5">{{ $user->name }}</td>
                                    <td class="p-3 px-5">{{ $user->email }}</td>
                                    <td class="p-3 px-5">
                                        @if($user->email_verified_at)
                                            Verified 
                                        @else 
                                           Not verified
                                        @endif
                                    </td>
                                    <td class="p-3 px-5 flex justify-end">
                                       
                                        <a  href="{{ route('user.delete', $user->id) }}" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>
                                    </td>
                                    
                                </tr>
                                @endforeach --}}
                            </tbody>

                        </table>

                    </div>
                    {{-- {{ $users->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>