<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css'])
</head>
<body class="font-sans bg-gray-100 text-gray-900">
    
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
    
    <section class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-semibold">To-Do List</h2>
            <a href="{{ route('todolist.completed') }}" 
            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Completed Tasks
            </a>
        </div>

        <!-- Add To-Do -->
        <form action="{{ route('todolist.store') }}" method="POST" class="mb-4 flex space-x-2">
            @csrf
            <input type="text" name="task" class="flex-1 p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter a new task" required>
            <button type="submit" class="px-4 py-2 bg-green-700 text-white rounded hover:bg-green-800">Add</button>
        </form>


        <!-- Pending Tasks Section -->
        <table class="w-full border border-gray-300 mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="py-2 px-4 border">Task</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos->where('status', 'pending') as $todo)
                <tr>
                    <td class="py-2 px-4 border">{{ $todo->task }}</td>
                    <td class="py-2 px-4 border flex space-x-2">
                        <button onclick="openUpdateModal({{ $todo->id }}, '{{ $todo->task }}')" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</button>
                        <form action="{{ route('todolist.complete', $todo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Complete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div id="updateModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
            <div class="bg-white p-6 rounded shadow-lg w-96">
                <h2 class="text-xl font-bold mb-4">Update Task</h2>
                <form id="updateForm" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" id="updateTask" name="task" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <div class="mt-4 flex justify-end space-x-2">
                        <button type="button" onclick="closeUpdateModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    

        <script>
            function openUpdateModal(id, task) {
                let formAction = "{{ route('todolist.update', ':id') }}"; 
                formAction = formAction.replace(':id', id); // Replace placeholder with actual ID
                document.getElementById('updateForm').action = formAction;

                document.getElementById('updateTask').value = task;
                document.getElementById('updateModal').classList.remove('hidden');
            }

            function closeUpdateModal() {
                document.getElementById('updateModal').classList.add('hidden');
            }
        </script>
</body>
</html>
