<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Topic</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">Edit Topic</h1>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                <ul class="list-disc ml-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('topics.update', $topic) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $topic->title) }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea id="description" name="description" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">{{ old('description', $topic->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label for="division" class="block text-sm font-medium text-gray-700">Division:</label>
                <select id="division" name="division" required class="mt-1 block w-full p-2 border border-gray-300 rounded-lg">
                    <option value="Marketing" {{ $topic->division == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="IT" {{ $topic->division == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Human Capital" {{ $topic->division == 'Human Capital' ? 'selected' : '' }}>Human Capital</option>
                    <option value="Product" {{ $topic->division == 'Product' ? 'selected' : '' }}>Product</option>
                    <option value="Redaksi" {{ $topic->division == 'Redaksi' ? 'selected' : '' }}>Redaksi</option>
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">Update Topic</button>
        </form>
    </div>
</body>
</html>
