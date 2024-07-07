<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $eventsQuery = Event::with('category');

        if ($request->has('category') && $request->category != '') {
            $eventsQuery->where('category_id', $request->category);
        }

        if ($request->has('search') && $request->search != '') {
            $eventsQuery->where('title', 'like', '%' . $request->search . '%')
                        ->orWhere('description', 'like', '%' . $request->search . '%');
        }

        $events = $eventsQuery->get();

        return view('events.index', compact('events', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'dateTime' => 'required|date',
            'duration' => 'required|integer',
            'location' => 'required|string|max:255',
            'maximum_tickets' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'dateTime' => 'required|date',
            'duration' => 'required|integer',
            'location' => 'required|string|max:255',
            'maximum_tickets' => 'required|integer',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }

    public function book($id)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be registered and logged in to book an event.');
        }
        
        $event = Event::findOrFail($id);
        return view('events.book', compact('event'));
    }
}
