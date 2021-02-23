<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;
    public $status;
    public $body;

    public function mount($hash)
    {
        $this->status = Status::where('hash', $hash)->firstOrFail();
        $this->body = $this->status->body;
    }

    public function update()
    {
        $this->status->update([
            'body' => $this->body,
        ]);

        return redirect()->route('status.show', $this->status->hash);
    }

    public function render()
    {
        $this->authorize('update', $this->status);
        return view('livewire.status.edit')->extends('layouts.app');
    }
}
