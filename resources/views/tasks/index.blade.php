<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Task List</title>
  <!-- Tailwind CSS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
  <div class="container mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6">Task List</h1>

    @if ($tasks->isEmpty())
    <p class="text-gray-700 dark:text-gray-300">No tasks available.</p>
    @else
    <ul class="space-y-4">
      @foreach ($tasks as $task)
      <li class="p-4 bg-gray-100 dark:bg-gray-700 rounded shadow flex justify-between items-center">
        <div>
          <h3 class="text-lg font-semibold">{{ $task->name }}</h3>
          <p class="text-gray-800 dark:text-gray-300">{{ $task->description }}</p>
        </div>
        <div class="flex space-x-2">
          <a href="{{ route('tasks.edit', $task) }}" class="px-4 py-2 bg-yellow-500 text-white font-semibold rounded hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-500">
            Edit
          </a>
          <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')" class="px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-500">
              Delete
            </button>
          </form>
        </div>
      </li>
      @endforeach
    </ul>
    @endif
  </div>

  <div class="flex justify-center mt-8 space-x-4">
    <a href="{{ route('tasks.create') }}" class="inline-flex items-center px-6 py-3 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-50 transition ease-in-out duration-150">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
      </svg>
      Create New Task
    </a>
  </div>
</body>

</html>