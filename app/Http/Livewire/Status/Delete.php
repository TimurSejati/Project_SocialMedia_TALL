<?php

namespace App\Http\Livewire\Status;

use App\Models\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Delete extends Component
{
    use AuthorizesRequests;
    public $status;

    public function mount($hash)
    {
        $this->status = Status::where('hash', $hash)->firstOrFail();
    }

    public function destroy()
    {
        $this->authorize('update', $this->status);
        $this->status->delete();

        return redirect()->route('account.show', $this->status->user->usernameOrHash);
    }

    public function render()
    {
        return view('livewire.status.delete')->extends('layouts.app');
    }
}
