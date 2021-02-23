<div>
    @if ($status->comments_count)
        <div class="mb-5 ml-5 mr-5 -mt-8 border border-gray-200 rounded-lg bg-gray-50">
            @foreach ($comments as $comment)
                <div class="flex px-5 py-4 last:border-b-0 ">
                    <div class="flex mr-3 shrink-0">
                        <img class="object-cover object-center w-10 h-10 rounded-full"
                            src="{{ $comment->user->gravatar() }}">
                    </div>
                    <div>
                        <div class="font-semibold">{{ $comment->user->name }}</div>
                        <div class="mb-2 text-sm text-gray-600">{{ $comment->created_at->diffForHumans() }}</div>
                        <div class="leading-relaxed text-gray-700">{!! nl2br($comment->body) !!}</div>
                        <div class="flex items-center mt-2 text-sm text-gray-600">
                            <div class="mr-3">
                                {{ $comment->children_count }} {{ Str::plural('Reply', $comment->children_count) }}
                            </div>

                            <button onClick="window.location.href='#showReplyForm'"
                                wire:click.prevent="showReplyForm({{ $comment->id }})" class="focus:outline-none">Add
                                reply</button>

                            <livewire:comment.like :comment="$comment" :key="$comment->id" />
                        </div>
                    </div>
                </div>

                @if ($comment->children_count)
                    <div class="mb-5 ml-5">
                        @foreach ($comment->children as $comment)
                            <div class="flex py-2 pl-10">
                                <div class="flex mr-3 shrink-0">
                                    <img class="object-cover object-center w-10 h-10 rounded-full"
                                        src="{{ $comment->user->gravatar() }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $comment->user->name }}</div>
                                    <div class="mb-2 text-sm text-gray-600">
                                        {{ $comment->created_at->diffForHumans() }}</div>
                                    <div class="leading-relaxed text-gray-700">{!! nl2br($comment->body) !!}</div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                @endif
            @endforeach

            <div id="showReplyForm">
                <form wire:submit.prevent="reply">
                    <textarea wire:model="body"
                        class="w-full border-0 border-t border-gray-200 rounded-lg rounded-t-none resize-none form-textarea focus:outline-none"
                        placeholder="Reply comment here..."></textarea>

                    <button class="w-full py-2 text-center text-white bg-blue-500 rounded-b-lg hover:bg-blue-600"
                        type="submit">Reply</button>
                </form>
            </div>
        </div>



    @endif
</div>
