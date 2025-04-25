@extends('layouts.adminLayout')
@section('content')

<!-- Main Content -->
<div id="main-content" class="md:ml-[245px] transition-all duration-300 ease-in-out">
    <!-- Header -->
    <nav class="flex px-4 md:px-12 items-center justify-between p-4 border-b border-gray-300 my-4 bg-white">
        <!-- Left side: Breadcrumb -->
        <div class="text-gray-500">
            <span class="font-semibold">{{ $page }}</span> / <span>Default</span>
        </div>

        <!-- Right side: Icons -->
        <div class="flex items-center space-x-4">
            <!-- Logout Button -->
            <form method="POST" action="{{ route('auth.logout') }}" class="hidden md:block">
                @csrf
                <button type="submit" class="flex cursor-pointer items-center">
                    <img src="{{ asset('assets/images/sidebar/logout.png') }}" alt="logout">
                </button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto px-4 md:px-12 py-4">
        <h1 class="text-lg font-medium mb-6">Owners List</h1>
        {{-- Success Messages --}}
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z" />
                </svg>
            </button>
        </div>
        @endif

        <div class="flex rounded-md px-2 justify-end items-center mb-4 bg-[#F7F9FB] py-2">
            <div>
                <div class="relative">
                    <form class="relative">
                        <input type="text" id="searchbox" name="query" placeholder="Search" class="border pl-7 border-gray-300 rounded-md px-3 py-1.5 pr-8 w-56 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400" />
                        <button type="submit" class="absolute inset-y-0 left-2 flex items-center pr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full border-b border-gray-300">
                <thead>
                    <tr class="text-left text-sm text-gray-500 border-b border-gray-300">
                        <th class="py-3 px-4 font-normal">Owner Id</th>
                        <th class="py-3 px-4 font-normal">Gym Owner</th>
                        <th class="py-3 px-4 font-normal">Business Name</th>
                        <th class="py-3 px-4 font-normal">Registration Date</th>
                        <th class="py-3 px-4 font-normal">Payment Date</th>
                        <th class="py-3 px-4 font-normal">Account Status</th>
                        <th class="py-3 px-4 font-normal">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($owners as $owner)
                    <tr class="border-b border-gray-300">
                        <td class="py-3 px-4 text-sm">#{{ $owner->id }}</td>
                        <td class="py-3 px-4 flex items-center">
                            @if ($owner->profile_pic)
                                <img src="{{ Storage::url($owner->profile_pic) }}" alt="Profile" class="w-6 h-6 rounded-full mr-2">
                            @else
                                <div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white mr-2">
                                    {{ strtoupper(substr($owner->name, 0, 1)) }}
                                </div>
                            @endif
                            <span class="text-sm">{{ $owner->name }}</span>
                        </td>
                        <td class="py-3 px-4 text-sm">{{ $owner->business_name ?'$owner->business_name': 'Not Yet'  }}</td>
                        <td class="py-3 px-4 text-sm">{{ $owner->created_at->format('M j, Y') }}</td>
                        <td class="py-3 px-4 text-sm">{{ $owner->payment ? $owner->payment->paymentDate : 'not yet' }}</td>
                        <td class="py-3 px-4">
                            <div class="flex items-center space-x-2">
                                <span class="w-2 h-2 rounded-full {{ $owner->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                <span class="{{  $owner->is_active ? 'text-green-500' : 'text-red-500 ' }}text-sm text-gray-700">{{ $owner->is_active ? 'Active' : 'Inactive' }}</span>
                            </div>
                        </td>
                        <td class="py-3 px-4">
                            <form method="POST" action="{{ route('admin.status',$owner->id) }}" onsubmit="return confirm('Are you sure you want to {{ $owner->is_active ? 'Desactivate' : 'Activate' }} this owner?');" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="{{ $owner->is_active ? 'bg-[#DA4343]' : 'bg-[#4CAF50]' }} cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">
                                    {{ $owner->is_active ? 'Desactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@section("scripts")
<script>
    document.getElementById("searchbox").addEventListener('input', function () {
        const query = this.value;
        const tbody = document.querySelector('tbody');
        const statusRoute = "{{ route('admin.status', '') }}";

        if (query.length > 2) {
            fetch(`{{ route('searchOwners') }}?query=${query}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                if (data.success) {
                    tbody.innerHTML = '';
                    data.owners.forEach(owner => {
                        // Profile picture logic
                        let profileHtml;
                        if (owner.profile_pic) {
                            profileHtml = `<img src="{{ Storage::url('') }}${owner.profile_pic}" alt="Profile" class="w-6 h-6 rounded-full mr-2">`;
                        } else {
                            const firstLetter = owner.name.charAt(0).toUpperCase();
                            profileHtml = `<div class="w-6 h-6 rounded-full bg-gray-300 flex items-center justify-center text-white mr-2">${firstLetter}</div>`;
                        }

                        const businessName = owner.business_name ? owner.business_name : 'Not Yet';
                        const createdDate = new Date(owner.created_at).toLocaleDateString('en-GB', { day: 'numeric', month: 'short', year: 'numeric' });
                        const statusClass = owner.is_active ? 'bg-green-500' : 'bg-red-500';
                        const statusText = owner.is_active ? 'Active' : 'Inactive';
                        const statusColorClass = owner.is_active ? 'text-green-500' : 'text-red-500';
                        const btnClass = owner.is_active ? 'bg-[#DA4343]' : 'bg-[#4CAF50]';
                        const btnText = owner.is_active ? 'Desactivate' : 'Activate';
                        
                        tbody.innerHTML += `
                        <tr class="border-b border-gray-300">
                            <td class="py-3 px-4 text-sm">#${owner.id}</td>
                            <td class="py-3 px-4 flex items-center">
                                ${profileHtml}
                                <span class="text-sm">${owner.name}</span>
                            </td>
                            <td class="py-3 px-4 text-sm">${businessName}</td>
                            <td class="py-3 px-4 text-sm">${createdDate}</td>
                            <td class="py-3 px-4 text-sm">Not Yet</td>
                            <td class="py-3 px-4">
                                <div class="flex items-center space-x-2">
                                    <span class="w-2 h-2 rounded-full ${statusClass}"></span>
                                    <span class="${statusColorClass} text-sm text-gray-700">${statusText}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">
                                <button class="bg-[#6D6D6D] openModalBtnUpdate cursor-pointer text-white text-xs px-4 py-1.5 rounded-md mr-2">Edit</button>
                                <form method="POST" action="${statusRoute}/${owner.id}" onsubmit="return confirm('Are you sure you want to ${owner.is_active ? 'Desactivate' : 'Activate'} this owner?');" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="${btnClass} cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">
                                        ${btnText}
                                    </button>
                                </form>
                            </td>
                        </tr>`;
                    });
                }
            })
            .catch(error => console.error('Error:', error));
        } else if (query.length === 0) {
            location.reload();
        }
    });
</script>
@endsection