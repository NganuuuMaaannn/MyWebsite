<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-white text-gray-900">

    <nav class="shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center px-8 py-4">
            <h1 class="text-2xl font-bold">SEAN</h1>
            <ul class="flex space-x-6 text-gray-700">
                <li><a href="/" class="hover:text-blue-600">Home</a></li>
                <li><a href="/about" class="hover:text-blue-600">About</a></li>
                <li class="ml-auto"><a href="#" class="hover:text-blue-600">Contact</a></li>
            </ul>
        </div>
    </nav>

    <section class="max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center px-8 py-16">
        <div class="md:w-1/2 text-center md:text-left">
            <h1 class="text-4xl font-bold text-gray-900 leading-snug">Hi, I'm <br> Sean Michael T. Doinog</h1>
            <p class="text-gray-600 mt-2">A 3rd year BSIT student in Holycross of Davao College.</p>
            <div class="mt-10 space-x-4">
                <a href="https://www.facebook.com/system.out.print.sean" target="_blank" rel="noopener noreferrer" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700"> Add me on Facebook </a>
                <a href="https://www.youtube.com/@seandoinog" target="_blank" rel="noopener noreferrer" class="px-6 py-3 border border-red-600 text-red-600 rounded-md hover:bg-red-600 hover:text-white"> Youtube Channel </a>
            </div>
        </div>

        <div class="md:w-1/2 flex justify-end">
            <div class="w-full max-w-md">
                <img src="{{ asset('images/sean.jpg') }}" alt="sean" class="rounded-lg shadow-lg w-full">
            </div>
        </div>
    </section>

</body>
</html>
