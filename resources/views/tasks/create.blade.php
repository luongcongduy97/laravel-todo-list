<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Task</title>
  <!-- Tailwind CSS -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
  <div class="container mx-auto mt-10 p-6 bg-white dark:bg-gray-800 rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6">Create a New Task</h1>

    @if (session('success'))
    <div class="mb-4 p-4 text-green-800 bg-green-100 rounded dark:bg-green-700 dark:text-green-200">
      {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf
      <div class="mb-4">
        <label for="name" class="block text-sm font-medium mb-2">Task Name:</label>
        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500" required>
      </div>

      <div class="mb-4">
        <label for="description" class="block text-sm font-medium mb-2">Task Description:</label>
        <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:border-blue-500"></textarea>
      </div>

      <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-500">
        Create Task
      </button>
    </form>
  </div>
</body>

</html>