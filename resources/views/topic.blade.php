@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Topik</h1>

    <form action="{{ route('topics.index') }}" method="GET">
        <div class="form-group">
            <label for="division">Filter by Division:</label>
            <select name="division" id="division" class="form-control">
                <option value="">All Divisions</option>
                <option value="Marketing">Marketing</option>
                <option value="IT">IT</option>
                <option value="Human Capital">Human Capital</option>
                <option value="Product">Product</option>
                <option value="Redaksi">Redaksi</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Division</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topics as $topic)
                <tr>
                    <td>{{ $topic->title }}</td>
                    <td>{{ $topic->description }}</td>
                    <td>{{ $topic->division }}</td>
                    <td>
                        <a href="{{ route('topics.edit', $topic) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('topics.destroy', $topic) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
