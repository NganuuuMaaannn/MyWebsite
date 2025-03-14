<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Tasks</title>
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

    <section class="max-w-6xl mx-auto flex flex-col-reverse md:flex-row items-center px-8 py-16">
        <div class="container mx-auto mt-10 p-4">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-2xl font-semibold">Completed Tasks</h2>
                <a href="{{ route('todolist') }}" 
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Back
                </a>
            </div>    

            <table class="w-full border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="py-2 px-4 border">Task</th>
                        <th class="py-2 px-4 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($completedTasks as $task)
                    <tr>
                        <td class="py-2 px-4 border line-through text-gray-500">{{ $task->task }}</td>
                        <td class="py-2 px-4 border flex space-x-2">
                            <form action="{{ route('todolist.undo', $task->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Undo</button>
                            </form>

                            <button onclick="openDeleteModal({{ $task->id }})" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50">
                <div class="bg-white p-6 rounded shadow-lg w-96">
                    <h2 class="text-xl font-bold mb-4">Confirm Delete</h2>
                    <p>Are you sure you want to delete this task?</p>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="mt-4 flex justify-end space-x-2">
                            <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Cancel</button>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        function openDeleteModal(taskId) {
            let deleteForm = document.getElementById('deleteForm');
            let deleteModal = document.getElementById('deleteModal');

            if (!deleteForm || !deleteModal) {
                console.error("Delete modal elements not found!");
                return;
            }

            let deleteAction = "{{ route('todolist.destroy', '__id__') }}";
            deleteForm.action = deleteAction.replace('__id__', taskId);

            deleteModal.classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>

</body>
</html>
