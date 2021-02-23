<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $perPage = 5;
    public $bio;
    public $readMore = true;

    public function loadMore()
    {
        $this->perPage += 3;
    }

    public function readMore()
    {
        $this->bio = $this->user->description;
        $this->readMore = false;
    }

    public function less()
    {
        $this->bio = \Str::limit($this->user->description, 100);
        $this->readMore = true;
    }

    public function mount($identifier)
    {
        $this->user = User::where('username', $identifier)->orWhere('hash', $identifier)->first();
        $this->bio = \Str::limit($this->user->description, 100);
    }

    public function render()
    {
        $statuses = $this->user->statuses()->with('user')->latest()->paginate($this->perPage);
        return view('livewire.account.show', compact('statuses'))->extends('layouts.app');
    }
}
