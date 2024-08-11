<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Topics</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6 bg-gray-100">
    <header class="flex justify-between items-center mb-6">
        <div></div> <!-- Empty div to balance the layout -->
        <div class="flex space-x-4">
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('topics.create') }}" class="inline-block bg-[#1A4870] text-white px-4 py-2 rounded">Create a New Training Topic</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Log out</button>
            </form>
        </div>
    </header>

    <h1 class="max-w-7xl mx-auto text-2xl font-bold mb-6">List Topic Training</h1>

    @if (session('success'))
    <div class="max-w-7xl mx-auto mb-4 p-2 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
    @endif

    <div class="max-w-7xl mx-auto mb-4 p-4 bg-white rounded shadow-lg flex items-center justify-between space-x-4">
        <div class="flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 11-2 0V5H5v1a1 1 0 11-2 0V4zm0 7a1 1 0 011-1h8a1 1 0 110 2H4a1 1 0 01-1-1zm10 3a1 1 0 100 2h-2a1 1 0 100 2h2a1 1 0 100-2zm-4-3a1 1 0 011 1v5a1 1 0 01-1 1v-7zm7 5a1 1 0 00-1 1h-4a1 1 0 100 2h4a1 1 0 001-1v-5a1 1 0 10-2 0v4z"
                    clip-rule="evenodd" />
            </svg>
            <form action="{{ route('topics.index') }}" method="GET">
                <select name="division" id="division" class="mt-1 block p-2 border border-gray-300 rounded"
                    onchange="this.form.submit()">
                    <option value="">All Division</option>
                    <option value="Marketing" {{ request('division') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                    <option value="IT" {{ request('division') == 'IT' ? 'selected' : '' }}>IT</option>
                    <option value="Human Capital" {{ request('division') == 'Human Capital' ? 'selected' : '' }}>Human Capital</option>
                    <option value="Product" {{ request('division') == 'Product' ? 'selected' : '' }}>Product</option>
                    <option value="Redaksi" {{ request('division') == 'Redaksi' ? 'selected' : '' }}>Redaksi</option>
                </select>
            </form>
        </div>
        <div class="flex items-center space-x-2">
            <form action="{{ route('topics.index') }}" method="GET" class="relative flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                    class="p-2 pl-10 border border-gray-300 rounded w-full">
                <button type="submit" class="absolute left-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>

    @if ($topics->isEmpty())
    <div class="text-center text-gray-500">Data not found.</div>
    @else
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($topics as $topic)
        <div class="p-4 bg-white shadow-lg rounded-lg">
            <div class="mt-4">
                <h2 class="text-xl font-semibold text-gray-800">{{ $topic->title }}</h2>
                <p class="text-gray-600 mt-2">{{ $topic->description }}</p>
                <span class="text-sm text-gray-400 mt-4 block">{{ $topic->division }}</span>
            </div>
            @if(auth()->user()->role === 'admin')
            <div class="flex justify-between mt-4">
                <a href="{{ route('topics.edit', $topic) }}" class="text-white bg-[#5B99C2] px-4 py-2 rounded">Edit</a>
                <form action="{{ route('topics.destroy', $topic) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-[#1F316F] text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @endif

</body>

</html>
