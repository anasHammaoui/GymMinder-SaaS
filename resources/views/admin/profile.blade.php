@extends('layouts.adminLayout')
@section('content')

<!-- Main Content -->
<div id="main-content" class="md:ml-[245px] transition-all duration-300 ease-in-out">
    <!-- Header -->
    <nav class="flex px-4 md:px-12 items-center justify-between p-4 border-b border-gray-300 my-4 bg-white">
        <!-- Left side: Breadcrumb -->
        <div class="text-gray-500">
            <span class="font-semibold">{{ $page }}</span> / <span>default</span>
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
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="text-gray-500 pb-8">
                <a href="{{ route('profile.index') }}" class="font-semibold text-blue-500 hover:underline">Profile</a> 
            </div>
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
              <strong class="font-bold">Success!</strong>
              <span class="block sm:inline">{{ session('success') }}</span>
              <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.remove();">
                <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
                </svg>
              </button>
            </div>
          @endif
          {{-- error messagees --}}
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
                  <path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.414l-2.934 2.935a1 1 0 01-1.414-1.414l2.935-2.935-2.935-2.934a1 1 0 011.414-1.414L10 8.586l2.934-2.935a1 1 0 011.414 1.414L11.414 10l2.935 2.934a1 1 0 010 1.415z"/>
                </svg>
              </button>
            </div>
          @endif
            <form method="POST" action="{{ route('profile.update',Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="flex items-center space-x-6 mb-6">
                    <div class="relative">
                        <div class="flex items-center space-x-3">
                            @if(auth()->user()->profile_pic)
                                <img src="{{ Storage::url(auth()->user()->profile_pic) }}" alt="Profile Photo" class="w-16 h-16 rounded-full object-cover">
                            @else
                                <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 font-bold">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <input type="file" name="profile_pic" class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer">
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                        <p class="text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                        <input type="text" name="name" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ Auth::user()->name }}">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2" value="{{ Auth::user()->email }}">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Gender</label>
                        <select name="gender" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                            <option value="">Select Your Gender</option>
                            <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Country</label>
                        <select name="country" class="w-full border border-gray-300 rounded-lg px-4 py-2" id="country-select">
                            <option value="">Select your country</option>
                        </select>
                    </div>
                </div>

                <div class="mt-6 flex justify-end items-center">
                    <button type="submit" class="bg-blue-500 cursor-pointer text-white px-4 py-2 mr-4 rounded-lg">Save Changes</button>
                 
                </div>
            </form>
            <form method="POST" action="{{ route('profile.destroy', Auth::user()->id) }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 -auto cursor-pointer text-white px-4 py-2 rounded-lg">Delete Account</button>
            </form>
        </div>
    </div>
</div>

@endsection
@section("scripts")
<script>
    document.addEventListener('DOMContentLoaded', function () {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const select = document.getElementById('country-select');
                const userCountry = "{{ Auth::user()->country }}";
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    if (country.name.common === userCountry) {
                        option.selected = true;
                    }
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching countries:', error));
    });
</script>
@endsection