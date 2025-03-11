<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans bg-white text-gray-900">

    <nav class="shadow-md bg-white">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-8 py-4">
            <h1 class="text-2xl font-bold">SEAN</h1>
            <ul class="flex items-center space-x-4 text-gray-700">
                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><a href="/about" class="hover:text-blue-600">About</a></li>
                <li><a href="/contact" class="hover:text-blue-600">Contact</a></li>

                <li class="relative group">
                    <button class="px-1 py-2 rounded-md hover:text-blue-600 focus:outline-none">Activities</button>
                    <ul class="absolute left-0 mt-2 min-w-[160px] bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <li><a href="/items" class="block px-4 py-2 hover:bg-gray-100">MySQL + Laravel</a></li>
                        <li><a href="/todolist" class="block px-4 py-2 hover:bg-gray-100">To-Do List</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
 

    <section class="max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center px-8 py-16">
    <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl font-bold text-gray-900 leading-snug">About Me</h1>
            <p class="text-gray-600 mt-2">Secret.</p>
        </div>

        <div class="md:w-1/2 flex justify-end">
            <div class="w-full max-w-md">
                <img src="{{ asset('images/sean2.jpg') }}" alt="sean" class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </section>

</body>
</html>
