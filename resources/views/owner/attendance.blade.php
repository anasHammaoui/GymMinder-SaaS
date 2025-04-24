@extends('layouts.ownerLayout')
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
    <h1 class="text-lg font-medium mb-6">Attendance List</h1>
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
    <div class="flex rounded-md px-2 justify-end items-center mb-4 bg-[#F7F9FB] py-2">
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
    
    <div class="overflow-x-auto">
        <table class="min-w-full border-b border-gray-300">
            <thead>
                <tr class="text-left text-sm text-gray-500 border-b border-gray-300">
                    <th class="py-3 px-4 font-normal">Member Id</th>
                    <th class="py-3 px-4 font-normal">Member</th>
                    <th class="py-3 px-4 font-normal">Email</th>
                    <th class="py-3 px-4 font-normal">Start Date</th>
                    <th class="py-3 px-4 font-normal">Attendace</th>
                    <th class="py-3 px-4 font-normal">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($members as  $member)
            @php
            $isMarked = $member->attendances()->whereDate('attendance_date', now()->toDateString())->exists();
            @endphp
              <tr class="border-b border-gray-300">
                <td class="py-3 px-4 text-sm">#{{ $member -> id }}</td>
                <td class="py-3 px-4 flex items-center">
                    <img src="{{ Storage::url($member -> profile_picture) }}" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                    <span class="text-sm">{{ $member -> name }}</span>
                </td>
                <td class="py-3 px-4 text-sm">{{ $member-> email }}</td>
                <td class="py-3 px-4 text-sm">{{ $member-> created_at -> format('M j, Y') }}</td>
                <td class="py-3 px-4 text-sm">
                    <form method="POST" action="{{ route('markAttendance', $member->id) }}">
                      @csrf
                      
                        @if ($isMarked)
                        <select  class="border selectPayed text-white font-medium border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 bg-gray-700 focus:border-gray-400" disabled>
                          <option value="present" {{ $member->attendances()->latest()->first()->is_present ? 'selected' : '' }}>Present</option>
                          <option value="absent" {{ $member->attendances()->latest()->first()->is_present ? '' : 'selected' }}>Absent</option>
                        </select>
                        @else
                        <select name="ispresent" class="border selectPayed text-white font-medium border-gray-300 rounded-md px-3 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 bg-black focus:border-gray-400" onchange="this.form.submit()">
                          <option value="">isPresent</option>
                          <option value="present">Present</option>
                          <option value="absent">Absent</option>
                        </select>
                        @endif
                    </form>
                </td>
                <td class="py-3 px-4">
                  {{-- show calender --}}
                      <button data-id="{{ $member->id }}" class="bg-[#1F66AC] showCalender cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">Details</button>
                  
                   
                </td>
            </tr>
              @endforeach
        
            </tbody>
        </table>
    </div>
    
    @if ($members->hasPages())
        <div class="flex justify-end mt-6 space-x-1">
            {{-- Previous Page Link --}}
            @if ($members->onFirstPage())
                <button class="p-1.5  rounded text-gray-300 cursor-not-allowed" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            @else
                <a href="{{ $members->previousPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($members->getUrlRange(1, $members->lastPage()) as $page => $url)
                @if ($page == $members->currentPage())
                    <span class="px-3 py-1.5  rounded bg-gray-700 text-white">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1.5  rounded hover:bg-gray-100">{{ $page }}</a>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($members->hasMorePages())
                <a href="{{ $members->nextPageUrl() }}" class="p-1.5  rounded hover:bg-gray-100 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            @else
                <button class="p-1.5  rounded text-gray-300 cursor-not-allowed" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            @endif
        </div>
    @endif
</div>
<!-- Calendar Modal -->
<div id="calendarModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
  <div class="absolute inset-0 bg-gray-500/50" onclick="closeCalendarModal()"></div>
  <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl mx-4 z-10">
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h3 class="font-semibold text-lg text-gray-800">Attendance Calendar</h3>
      <button class="text-gray-500 hover:text-gray-700" onclick="closeCalendarModal()">
        <i data-feather="x"></i>
      </button>
    </div>
    <div class="p-6">
      <div id="calendar" class="px-6"></div>
    </div>
    <div class="flex justify-end px-6 py-4 border-t">
      <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50" onclick="closeCalendarModal()">
        Close
      </button>
    </div>
  </div>
</div>
<style>
  #calendar {
    max-width: 800px;
    height: 500px;
    margin: 0 auto;
  }
</style>

<script>
  function closeCalendarModal() {
    document.getElementById('calendarModal').classList.add('hidden');
  }
</script>

@endsection
@section('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>

<script>
    // search members
    document.querySelector('input[name="query"]').addEventListener('input', function () {
      const query = this.value;
      const tbody = document.querySelector('tbody');

      if (query.length > 2) {
        fetch(`{{ route('searchMembers') }}?query=${query}`, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            tbody.innerHTML = '';
            data.members.forEach(member => {
                const profilePicture = member.profile_picture ? `{{ Storage::url('${member.profile_picture}') }}` : '{{ asset("assets/images/default-avatar.png") }}'; 
              tbody.innerHTML += `
              <tr class="border-b border-gray-300">
                <td class="py-3 px-4 text-sm">#${member.id}</td>
                <td class="py-3 px-4 flex items-center">
                  <img src="${profilePicture}" alt="Avatar" class="w-6 h-6 rounded-full mr-2" onerror="this.src='{{ asset("assets/images/default-avatar.png") }}';">
                  <span class="text-sm">${member.name}</span>
                </td>
                <td class="py-3 px-4 text-sm">${member.email}</td>
                <td class="py-3 px-4 text-sm">${new Date(member.created_at).toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' })}</td>
                <td class="py-3 px-4 text-sm">insearch to check</td>
            
                <td class="py-3 px-4">
                  <button class="bg-[#6D6D6D] openModalBtnUpdate cursor-pointer text-white text-xs px-4 py-1.5 rounded-md mr-2"
                    data-name="${member.name}" 
                    data-email="${member.email}"  
                    data-plan="${member.plan}"
                    data-phone="${member.mobile_number}">
                    Edit
                  </button>
                  <form method="POST" action="/deleteMember/${member.id}" onsubmit="return confirm('Are you sure you want to delete this member?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#DA4343] cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">Delete</button>
                  </form>
                </td>
              </tr>
              `;
            });
          }
        })
        .catch(error => console.error('Error:', error));
      } else if (query.length === 0) {
        location.reload();
      }
    });
    // mark attendance
    function markAttendance(e){
      console.log(target);
    }
</script>
<script>
  // show calnder modal
  document.querySelectorAll(".showCalender").forEach(btn=>{
    btn.addEventListener("click",()=>{
      document.getElementById("calendarModal").classList.remove("hidden");
    })
  })
  // 
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: []
    });
    calendar.render();

    document.querySelectorAll('.showCalender').forEach(button => {
      button.addEventListener('click', function() {
        const memberId = this.getAttribute('data-id');
        console.log(memberId)
        fetch(`/owner/attendance/${memberId}`, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            alert(data.error);
          } else if (Array.isArray(data)) {
            const events = data.map(record => ({
              title: record.is_present ? 'Present' : 'Absent',
              start: record.date,
              color: record.is_present ? 'green' : 'red'
            }));
            calendar.removeAllEvents();
            calendar.addEventSource(events);
          } else {
            console.error('Unexpected response format:', data);
            alert('Failed to load attendance data.');
          }
        })
        .catch(error => console.error('Error:', error));
      });
    });
  });
  </script>
@endsection