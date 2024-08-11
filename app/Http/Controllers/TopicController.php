<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index(Request $request)
    {
        $division = $request->query('division');
        $topics = Topic::when($division, function ($query, $division) {
            return $query->where('division', $division);
        })->get();

        if($request->has('search') && $request->search != '') {
            $topics = Topic::where('title', 'like', '%' . $request->search . '%')
            ->orWhere('description', 'like', '%' . $request->search . '%')->get();
            
        }
        

        return view('topics.index', compact('topics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'division' => 'required',
        ]);

        Topic::create($request->only('title', 'description', 'division'));

        return redirect()->route('topics.index')->with('success', 'Topic created successfully.');
    }

    public function create()
    {
        return view('topics.create', ['isEditing' => false]);
    }
    
    public function edit(Topic $topic)
    {
        return view('topics.edit', [
            'isEditing' => true,
            'topic' => $topic,
        ]);
    }
    
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'division' => 'required',
        ]);

        $topic->update($request->all());

        return redirect()->route('topics.index')->with('success', 'Topic updated successfully.');
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('topics.index')->with('success', 'Topic deleted successfully.');
    }
}
