<?php

namespace App\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventsIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    
    public function render()
    {
        /*
        $events = Event::with('sections')
    ->join('event_section', 'events.id', '=', 'event_section.event_id')
    ->orderBy('events.date', 'desc')
    ->orderBy('events.court_id', 'asc')
    ->select('events.id', 'events.type', 'events.state', 'events.price','events.date' ,'events.user_id', 'events.court_id')
    ->groupBy('events.id', 'events.type', 'events.state', 'events.price','events.date', 'events.user_id', 'events.court_id')
    ->distinct()
    ->paginate(100);
    */
        $events = Event::paginate(100);
        return view('livewire.admin.events-index', compact('events'));
    }
}
