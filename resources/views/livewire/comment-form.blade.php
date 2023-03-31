<div>
    @forelse($commentList as $comment)
        <div class="columns mb-5">
            <div class="column is-two-fifths notification is-primary">
                {{ $comment->content }}
            </div>
        </div>
    @empty
        <p>No comments for the moment</p>
    @endforelse

    <form wire:submit.prevent="save">
        <textarea class="textarea" id="comment" name="comment" wire:model="comment"></textarea>
        <button class="button is-primary is-small" type="submit">Send comment</button>
    </form>
</div>
