<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
  </head>

  <body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <livewire:task-list />
    
    @livewireScripts
  </body>

</html>
