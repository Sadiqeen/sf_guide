@inject('markdown', 'Parsedown')
@php($markdown->setSafeMode(true))

@if(isset($reply) && $reply === true)
<div id="comment-{{ $comment->getKey() }}" class="media">
    @else
    <li id="comment-{{ $comment->getKey() }}" class="media">
        @endif
        <img class="mr-3"
            src="{{ $comment->commenter->getFirstMediaUrl() ? $comment->commenter->getFirstMediaUrl() : 'http://placeskull.com/120/120' }}"
            width="64" alt="{{ $comment->commenter->name ?? $comment->guest_name }} Avatar">
        <div class="media-body">
            <h5 class="mt-0 mb-1"><a class="text-muted"
                    href="{{ route('profile.index',$comment->commenter) }}">{{ $comment->commenter->name ?? $comment->guest_name }}</a>
                <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small></h5>
            <div style="white-space: pre-wrap;">{!! $markdown->line($comment->comment) !!}</div>

            <div>
                @can('reply-to-comment', $comment)
                <button data-toggle="modal" data-target="#reply-modal-{{ $comment->getKey() }}"
                    class="btn btn-sm btn-link text-uppercase">ตอบกลับ</button>
                @endcan
                @can('edit-comment', $comment)
                <button data-toggle="modal" data-target="#comment-modal-{{ $comment->getKey() }}"
                    class="btn btn-sm btn-link text-uppercase">แก้ไข</button>
                @endcan
                @can('delete-comment', $comment)
                <a href="{{ route('comments.destroy', $comment->getKey()) }}"
                    onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->getKey() }}').submit();"
                    class="btn btn-sm btn-link text-danger text-uppercase">ลบ</a>
                <form id="comment-delete-form-{{ $comment->getKey() }}"
                    action="{{ route('comments.destroy', $comment->getKey()) }}" method="POST" style="display: none;">
                    @method('DELETE')
                    @csrf
                </form>
                @endcan
            </div>

            @can('edit-comment', $comment)
            <div class="modal fade" id="comment-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.update', $comment->getKey()) }}">
                            @method('PUT')
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">แก้ไขคอมเม้นต์</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">แก้ไขข้อความของคุณ</label>
                                    <textarea required class="form-control" name="message"
                                        rows="3">{{ $comment->comment }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                    data-dismiss="modal">ยกเลิก</button>
                                <button type="submit"
                                    class="btn btn-sm btn-outline-success text-uppercase">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

            @can('reply-to-comment', $comment)
            <div class="modal fade" id="reply-modal-{{ $comment->getKey() }}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('comments.reply', $comment->getKey()) }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">ตอบกลับ</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    <span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="message">พิมค์ความคิดเห็นของคุณ</label>
                                    <textarea required class="form-control" name="message" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                    data-dismiss="modal">ยกเลิก</button>
                                <button type="submit"
                                    class="btn btn-sm btn-outline-success text-uppercase">ตอบกลับ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endcan

            <br />{{-- Margin bottom --}}

            {{-- Recursion for children --}}
            @if($grouped_comments->has($comment->getKey()))
            @foreach($grouped_comments[$comment->getKey()] as $child)
            @include('comments::_comment', [
            'comment' => $child,
            'reply' => true,
            'grouped_comments' => $grouped_comments
            ])
            @endforeach
            @endif

        </div>
        @if(isset($reply) && $reply === true)
</div>
@else
</li>
@endif
