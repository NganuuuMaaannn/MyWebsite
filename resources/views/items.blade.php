<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL + Laravel</title>
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
        <div class="container mx-auto mt-10 p-4">
            <h2 class="text-2xl font-semibold mb-4">Simple CRUD</h2>

            <!-- Add Item -->
            <form action="/store" method="POST" class="mb-4">
                @csrf
                <input type="text" name="name" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter item name" required>
                <button type="submit" class="mt-2 px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800">Add Item</button>
            </form>

            <!-- Display Items -->
            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border">Name</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                    <tr>
                        <td class="py-2 px-4 border">{{ $item->name }}</td>
                        <td class="py-2 px-4 border flex space-x-2">
                            <!-- Update Form -->
                            <form action="/update/{{ $item->id }}" method="POST" class="flex">
                                @csrf
                                <input type="text" name="name" value="{{ $item->name }}" class="p-1 border rounded w-30" required>
                                <button type="submit" class="ml-2 px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Update</button>
                            </form>
                            
                            <!-- Delete Form -->
                            <form action="/delete/{{ $item->id }}" method="POST">
                                @csrf
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>
