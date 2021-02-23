<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Livewire\Component;

class Index extends Component
{

    public $statusId;
    public $perPage = 5;

    protected $listeners = [
        'updatedStatus',
    ];

    public function updatedStatus($statusId)
    {}

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function render()
    {
        // $statuses = auth()->user()->statuses()->paginate(10);
        $ids = auth()->user()->follows()->pluck('id');
        $ids->push(auth()->id());
        $statuses = Status::whereIn('user_id', $ids)->latest()->paginate($this->perPage);
        return view('livewire.status.index', compact('statuses'));
    }
}
