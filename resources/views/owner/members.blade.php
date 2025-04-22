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
            <button class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/filter.png") }}" alt="filter">
            </button>
            <button class="p-2 cursor-pointer  hover:bg-gray-100">
                <img src="{{ asset("assets/images/sidebar/order.png") }}" alt="order">
            </button>
        </div>
        <div>
            <div class="relative">
                <input type="text" placeholder="Search" class="border pl-7 border-gray-300 rounded-md px-3 py-1.5 pr-8 w-56 focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400" />
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
                    <th class="py-3 px-4 font-normal">Plan</th>
                    <th class="py-3 px-4 font-normal">Join</th>
                    <th class="py-3 px-4 font-normal">Next Payment</th>
                    <th class="py-3 px-4 font-normal">Status</th>
                    <th class="py-3 px-4 font-normal">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($members as  $member)
              @php
              $isPayed = false;
              $latestPayment = $member->payment()->latest()->first();
              if ($latestPayment && $latestPayment->created_at) {
                $isPayed = $latestPayment->created_at->diffInDays(now()) <= 30;
              }
            @endphp
              <tr class="border-b border-gray-300">
                <td class="py-3 px-4 text-sm">#{{ $member -> id }}</td>
                <td class="py-3 px-4 flex items-center">
                    <img src="{{ Storage::url($member -> profile_picture) }}" alt="Avatar" class="w-6 h-6 rounded-full mr-2">
                    <span class="text-sm">{{ $member -> name }}</span>
                </td>
                <td class="py-3 px-4 text-sm">{{ $member-> plan }}</td>
                <td class="py-3 px-4 text-sm">{{ $member-> created_at -> format('M j, Y') }}</td>
                <td class="py-3 px-4 text-sm">
                    <div class="flex items-center">
                        <svg class="h-4 w-4 mr-1 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                         {{ $latestPayment ? $latestPayment->created_at->addDays(30)->format('M j, Y') : 'Not Payed Yet' }}
                    </div>
                </td>
                <td class="py-3 px-4">
                    <form method="POST" action="{{ route('member.pay', $member->id) }}" id="paymentForm-{{ $member->id }}">
                    @csrf
                   
                    <select name="status" class="border  text-white font-medium border-gray-300 rounded-md px-2 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-gray-400 {{ $isPayed ? ' bg-[#3BA55C]' : 'bg-[#2D96FF]' }} focus:border-gray-400" onchange="handlePaymentStatusChange(this, {{ $member->id }})" {{ $isPayed ? 'disabled' : '' }}>
                      <option value="payed" {{ $isPayed ? 'selected' : '' }}>Payed</option>
                      @if (!$isPayed)
                      <option value="pending" {{ !$isPayed ? 'selected' : '' }}>Pending</option>
                      @endif
                    </select>
                    </form>
                </td>
                <td class="py-3 px-4">
                    <button
                      class="bg-[#6D6D6D] openModalBtnUpdate cursor-pointer text-white text-xs px-4 py-1.5 rounded-md mr-2"
                      data-name="{{ $member->name }}" 
                      data-email="{{ $member->email }}"  
                      data-plan="{{ $member->plan }}"
                      data-phone="{{ $member->mobile_number }}"
                      >Edit</button>
                    <form method="POST" action="{{ route('deleteMember', $member->id) }}" onsubmit="return confirm('Are you sure you want to delete this member?');" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-[#DA4343] cursor-pointer text-white text-xs px-4 py-1.5 rounded-md">Delete</button>
                    </form>
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
{{-- add member modal --}}
 <!-- Modal Overlay -->
 <div id="modalOverlayAdd" class="fixed inset-0 flex items-center justify-center z-50 hidden">


    <div class="absolute inset-0 bg-gray-500/50" id="modalBackdropAdd"></div>
    
    <!-- Modal Content -->
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 z-10">
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h3 class="font-semibold text-lg text-gray-800">Add New Member</h3>
        <button id="closeModalBtnAdd" class="text-gray-500 hover:text-gray-700">
          <i data-feather="x"></i>
        </button>
      </div>
      
      <form id="userForm" action="{{ route("addMember") }}" enctype="multipart/form-data" method="POST" class="p-6">
        @csrf
        <!-- Name Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="name">
            Name
          </label>
          <input
            type="text"
            id="name"
            name="name"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="Enter full name"
          />
        </div>
        
        <!-- Profile Picture Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="profile_picture">
            Profile Picture
          </label>
          <input
            type="file"
            id="profile_picture"
            name="profile_picture"
            accept="image/*"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
          />
        </div>
        
        <!-- Mobile Number Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="mobile_number">
            Mobile Number
          </label>
          <input
            type="tel"
            id="mobile_number"
            name="mobile_number"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="+1234567890"
          />
        </div>

        <!-- Email Field -->
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
            Email
          </label>
          <input
            type="email"
            id="email"
            name="email"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
            placeholder="user@example.com"
          />
        </div>

        <!-- Plan Field -->
        <div class="mb-6">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="plan">
            Plan
          </label>
          <select
            id="plan"
            name="plan"
            class="w-full py-2 px-3 border border-gray-300 rounded-md"
          >
            <option value="">Select a plan</option>
            <option value="Monthly">Monthly</option>
            <option value="Yearly">Yearly</option>
          </select>
        </div>

        <!-- Form Buttons -->
        <div class="flex space-x-2">
          <button
            type="button"
            id="cancelBtnAdd"
            class="w-1/2 cursor-pointer py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50"
          >
            Cancel
          </button>
          <button
            type="submit"
            class="w-1/2 cursor-pointer py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700"
          >
            Add Member
          </button>
        </div>
      </form>
    </div>
  </div>

  {{-- update member --}}
   <!-- Modal Overlay -->
 <div id="modalOverlayUpdate" class="fixed inset-0 flex items-center justify-center z-50 hidden">


  <div class="absolute inset-0 bg-gray-500/50" id="modalBackdropUpdate"></div>
  
  <!-- Modal Content -->
  <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 z-10">
    <div class="flex justify-between items-center px-6 py-4 border-b">
      <h3 class="font-semibold text-lg text-gray-800">Update Member</h3>
      <button id="closeModalBtnUpdate" class="text-gray-500 hover:text-gray-700">
        <i data-feather="x"></i>
      </button>
    </div>
    
    <form id="userForm" action="{{ route("updateMember",$member -> id) }}" enctype="multipart/form-data" method="POST" class="p-6">
      @method('PUT')
      @csrf
      <!-- Name Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2" for="name">
          Name
        </label>
        <input
          type="text"
          id="nameUpdate"
          name="name"
          class="w-full py-2 px-3 border border-gray-300 rounded-md"
          placeholder="Enter full name"
        />
      </div>
      
      <!-- Profile Picture Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2" for="profile_picture">
          Profile Picture
        </label>
        <input
          type="file"
          id="profile_picture"
          name="profile_picture"
          accept="image/*"
          class="w-full py-2 px-3 border border-gray-300 rounded-md"
        />
      </div>
      
      <!-- Mobile Number Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2" for="mobile_number">
          Mobile Number
        </label>
        <input
          type="tel"
          id="mobile_numberUpdate"
          name="mobile_number"
          class="w-full py-2 px-3 border border-gray-300 rounded-md"
          placeholder="+1234567890"
        />
      </div>

      <!-- Email Field -->
      <div class="mb-4">
        <label class="block text-gray-700 text-sm font-medium mb-2" for="email">
          Email
        </label>
        <input
          type="email"
          id="emailUpdate"
          name="email"
          class="w-full py-2 px-3 border border-gray-300 rounded-md"
          placeholder="user@example.com"
        />
      </div>

      <!-- Plan Field -->
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-medium mb-2" for="plan">
          Plan
        </label>
        <select
          id="planUpdate"
          name="plan"
          class="w-full py-2 px-3 border border-gray-300 rounded-md"
        >
          <option value="">Select a plan</option>
          <option value="Monthly">Monthly</option>
          <option value="Yearly">Yearly</option>
        </select>
      </div>

      <!-- Form Buttons -->
      <div class="flex space-x-2">
        <button
          type="button"
          id="cancelBtnUpdate"
          class="w-1/2 cursor-pointer py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50"
        >
          Cancel
        </button>
        <button
          type="submit"
          class="w-1/2 cursor-pointer py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700"
        >
          Update Member
        </button>
      </div>
    </form>
  </div>
</div>
{{-- make payment modal --}}
   <!-- Payment Info Modal -->
   <div id="paymentModal-{{ $member->id }}" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="absolute inset-0 bg-gray-500/50" onclick="closePaymentModal({{ $member->id }})"></div>
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md mx-4 z-10">
      <div class="flex justify-between items-center px-6 py-4 border-b">
        <h3 class="font-semibold text-lg text-gray-800">Payment Information</h3>
        <button class="text-gray-500 hover:text-gray-700" onclick="closePaymentModal({{ $member->id }})">
          <i data-feather="x"></i>
        </button>
      </div>
      <form method="POST" action="{{ route('member.pay', $member->id) }}" class="p-6">
        @csrf
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="amount">
            Amount
          </label>
          <input type="number" id="amount" name="amount" class="w-full py-2 px-3 border border-gray-300 rounded-md" placeholder="Enter amount" required>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 text-sm font-medium mb-2" for="payment_method">
            Payment Method
          </label>
          <select id="payment_method" name="payment_method" class="w-full py-2 px-3 border border-gray-300 rounded-md" required>
            <option value="">Select a method</option>
            <option value="credit_card">Credit Card</option>
            <option value="cash">Cash</option>
            <option value="bank_transfer">Bank Transfer</option>
          </select>
        </div>
        <div class="flex space-x-2">
          <button type="button" class="w-1/2 cursor-pointer py-2 px-4 border border-gray-300 rounded-md text-gray-700 bg-white hover:bg-gray-50" onclick="closePaymentModal({{ $member->id }})">
            Cancel
          </button>
          <button type="submit" class="w-1/2 cursor-pointer py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
            Submit
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('scripts')
<script>
  
// ************************Add member modal
    // Modal elements
    const openModalBtnAdd = document.getElementById('openModalBtnAdd');
    const closeModalBtnAdd = document.getElementById('closeModalBtnAdd');
    const modalOverlayAdd = document.getElementById('modalOverlayAdd');
    const modalBackdropAdd = document.getElementById('modalBackdropAdd');
    const cancelBtnAdd = document.getElementById('cancelBtnAdd');
    
    // Open modal
    openModalBtnAdd.addEventListener('click', () => {
      modalOverlayAdd.classList.remove('hidden');
    });

    // Close modal function
    function closeModal() {
      modalOverlayAdd.classList.add('hidden');
    }

    // Close modal event listeners
    closeModalBtnAdd.addEventListener('click', closeModal);
    modalBackdropAdd.addEventListener('click', closeModal);
    cancelBtnAdd.addEventListener('click', closeModal);

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeModal();
    });

// *******************************Update member modal
    // Modal elements
    const openModalBtnUpdate = document.querySelectorAll('.openModalBtnUpdate');
    const closeModalBtnUpdate = document.getElementById('closeModalBtnUpdate');
    const modalOverlayUpdate = document.getElementById('modalOverlayUpdate');
    const modalBackdropUpdate = document.getElementById('modalBackdropUpdate');
    const cancelBtnUpdate = document.getElementById('cancelBtnUpdate');
    

    // Open modal
    openModalBtnUpdate.forEach(btn => {
      // dataset

      btn.addEventListener('click', () => {
      const { name, email, plan, phone } = btn.dataset;

                  // modal values
    document.getElementById('nameUpdate').value = name;
    document.getElementById('emailUpdate').value = email;
    document.getElementById('planUpdate').value = plan;
    document.getElementById('mobile_numberUpdate').value = phone;
      console.log(name, email)
      modalOverlayUpdate.classList.remove('hidden');
    });
    });

    // Close modal function
    function closeModalUpdate() {
      modalOverlayUpdate.classList.add('hidden');
    }

    // Close modal event listeners
    closeModalBtnUpdate.addEventListener('click', closeModalUpdate);
    modalBackdropUpdate.addEventListener('click', closeModalUpdate);
    cancelBtnUpdate.addEventListener('click', closeModalUpdate);

    // Close modal on Escape key
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeModal();
    });
</script>
{{-- handle member payment --}}
<script>
  function handlePaymentStatusChange(selectElement, memberId) {
    if (selectElement.value === 'payed') {
      document.getElementById(`paymentModal-${memberId}`).classList.remove('hidden');
    } else {
      document.getElementById(`paymentForm-${memberId}`).submit();
    }
  }

  function closePaymentModal(memberId) {
    document.getElementById(`paymentModal-${memberId}`).classList.add('hidden');
  }
</script>
@endsection