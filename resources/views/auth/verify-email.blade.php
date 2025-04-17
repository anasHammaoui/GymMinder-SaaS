@extends("layouts.authLayout")
@section("authpage")
<div class="flex flex-col items-center justify-center min-h-screen bg-gray-50 px-4">
    <div class="max-w-md w-full bg-white rounded-lg shadow-md p-8">
        <div class="flex flex-col items-center">
            <svg class="w-16 h-16 text-blue-500 mb-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16 12H8m8 0a8 8 0 11-16 0 8 8 0 0116 0zm-8 4v4m0 0h4m-4 0H4"></path>
            </svg>
            <h2 class="text-2xl font-bold mb-2 text-gray-800">Verification Email Sent</h2>
            <p class="text-gray-600 text-center mb-6">
                We've sent a verification link to your email address.<br>
                Please check your inbox and follow the instructions to verify your account.
            </p>
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded transition">
                    Resend Verification Email
                </button>
            </form>
        </div>
    </div>
</div>
@endsection