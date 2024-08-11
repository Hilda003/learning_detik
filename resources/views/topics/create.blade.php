<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $isEditing ? 'Edit Topic' : 'Create Topic' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">{{ $isEditing ? 'Edit Topic' : 'Create Topic' }}</h1>

        @if ($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-800 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ $isEditing ? route('topics.update', $topic) : route('topics.store') }}" method="POST">
            @csrf
            @if($isEditing)
            @method('PUT')
            @endif

            <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
            <input type="text" id="title" name="title" value="{{ old('title', $topic->title ?? '') }}" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded"><br>

            <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
            <textarea id="description" name="description" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded">{{ old('description', $topic->description ?? '') }}</textarea><br>

            <label for="division" class="block text-sm font-medium text-gray-700">Division:</label>
            <select id="division" name="division" required
                class="mt-1 block w-full p-2 border border-gray-300 rounded">
                <option value="Marketing" {{ (old('division') == 'Marketing' || ($topic->division ?? '') == 'Marketing') ? 'selected' : '' }}>Marketing</option>
                <option value="IT" {{ (old('division') == 'IT' || ($topic->division ?? '') == 'IT') ? 'selected' : '' }}>IT</option>
                <option value="Human Capital" {{ (old('division') == 'Human Capital' || ($topic->division ?? '') == 'Human Capital') ? 'selected' : '' }}>Human Capital</option>
                <option value="Product" {{ (old('division') == 'Product' || ($topic->division ?? '') == 'Product') ? 'selected' : '' }}>Product</option>
                <option value="Redaksi" {{ (old('division') == 'Redaksi' || ($topic->division ?? '') == 'Redaksi') ? 'selected' : '' }}>Redaksi</option>
            </select><br>

            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded">{{ $isEditing ? 'Update' : 'Create' }}</button>
        </form>

        <a href="{{ route('topics.index') }}" class="block text-center mt-4 bg-gray-300 text-gray-700 px-4 py-2 rounded">
            Cancel
        </a>
    </div>
</body>

</html>
