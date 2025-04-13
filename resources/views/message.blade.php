<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Message Form</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 py-10">
    <div class="max-w-lg mx-auto bg-white p-8 shadow-md rounded">
        <h1 class="text-2xl font-bold mb-6">Message</h1>

        <form method="POST" action="{{ route('message.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full p-2 border border-gray-300 rounded">
                @error('name')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                       class="w-full p-2 border border-gray-300 rounded">
                @error('email')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Comment</label>
                <textarea name="message" rows="4"
                          class="w-full p-2 border border-gray-300 rounded">{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 mr-2 rounded hover:bg-blue-700">
                    Submit
                </button>
                <a href="/" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 inline-block">
                    Back
                </a>
            </div>
        </form>
    </div>

    @if(session('success'))
    <div id="successModal" class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm w-full relative">
            <h2 class="text-xl font-bold mb-5 text-green-600">Success!</h2>
            <p class="mb-6">{{ session('success') }}</p>
            <div class="flex justify-end">
                <button onclick="document.getElementById('successModal').style.display='none'"
                        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Close
                </button>
            </div>
        </div>
    </div>
    @endif


</body>
</html>
