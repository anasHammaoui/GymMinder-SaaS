@extends("layouts.ownerLayout")
@section("content")

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
    <h1 class="text-lg font-medium mb-6">Members List</h1>
    {{-- success messages --}}
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
    <div class="flex rounded-md px-2 justify-between items-center mb-4 bg-[#F7F9FB] py-2">
        <div class="flex space-x-2">
            <button id="openModalBtnAdd" class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/plus.png") }}" alt="plus">
            </button>
            <button class="p-2 cursor-pointer hover:bg-gray-100" id="togglePayedBtn">
              <img src="{{ asset("assets/images/sidebar/filter.png") }}" alt="filter">
            </button>
       
        </div>
        <div>
            <div class="relative">
                <form  class="relative">
                  <input type="text" name="query" placeholder="Search" class="border pl-7 border-gray-300 rounded-md px-3 py-1.5 pr-8 w-56 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400" />
                  <button type="submit" class="absolute inset-y-0 left-2 flex items-center pr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                  </button>
                </form>
                <div class="absolute inset-y-0 left-2 flex items-center pr-3 pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

{{-- end content --}}
</div>
{{-- end main content --}}
</div>
@endsection