@extends('layouts.ownerLayout')
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
                <a href="{{ route('profile.index') }}" class=" text-blue-500 hover:underline">Profile</a> / 
                <a href="{{ route('subscriptions') }}" class="text-blue-500 font-semibold hover:underline">Subscriptions</a>
            </div>

            <div class="border border-gray-300 rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-xl font-semibold">Plan: GymMinder</h2>
                        <p class="text-gray-500">Take your Business to the next level with GymMinder.</p>
                    </div>
                    <div class="text-right">
                        <p class="text-2xl font-bold text-blue-500">$20 / month</p>
                        <p class="text-gray-500">Auto Payment: <span class="text-green-500 font-semibold">Active</span></p>
                    </div>
                </div>

            @if (Auth::user()->is_active)
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Invoice</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Billing Date</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Amount</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Plan</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($history as $pay)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">Invoice #{{ $pay->invoice_number }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $pay->billing_date->format('M d, Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <span class="{{ $pay->status == 'Pending' ? 'text-red-500' : 'text-green-500' }} font-semibold">● {{ $pay->status }}</span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2">${{ number_format($pay->amount, 2) }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $pay->plan_name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center">
                    <button 
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600" 
                        onclick="document.getElementById('paymentModal').classList.remove('hidden')">
                        Add Payment Info
                    </button>
                </div>

                <!-- Payment Modal -->
                <div id="paymentModal" class="hidden fixed inset-0 bg-gray-800/50 bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                        <h2 class="text-xl font-semibold mb-4">Add Payment Information</h2>
                        <form method="POST">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-700">Auto Payment</label>
                                <div class="flex items-center space-x-4">
                                    <label class="flex items-center">
                                        <input type="radio" name="auto_payment" value="1" class="mr-2">
                                        Yes
                                    </label>
                                    <label class="flex items-center">
                                        <input type="radio" name="auto_payment" value="0" class="mr-2">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="payment_method" class="block text-gray-700">Payment Method</label>
                                <select id="payment_method" name="payment_method" class="w-full border border-gray-300 rounded-lg px-4 py-2">
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                            </div>
                            <div class="flex justify-end">
                                <button type="button" 
                                    class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-600" 
                                    onclick="document.getElementById('paymentModal').classList.add('hidden')">
                                    Cancel
                                </button>
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

                <div class="flex justify-between items-center mt-6">
                    {{ $history->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
