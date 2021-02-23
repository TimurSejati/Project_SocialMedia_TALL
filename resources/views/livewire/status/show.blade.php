<div class="p-4">
    <div class="p-5 mb-5 border border-gray-300 rounded-lg">
        <livewire:status.block :status="$status" :key="$status->id" />
    </div>

    <livewire:comment.index :status="$status" :key="$status->id" />
    @if (Auth::check() && !$status->comments_count)
        <livewire:comment.create :status="$status" :key="$status->id" />
    @endif
</div>
