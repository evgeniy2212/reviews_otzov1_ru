<div class="profile-single-comment">
    <div class="single-comment-info">
        <div>
            <span>{{ $comment->created_at }}</span>
        </div>
        <div class="w-100 w-75-md">
            <a href="{{ route('show-review', ['review' => $comment->review->id]) }}"
               type="button"
               class="otherButton">
                {{ __('service/index.show_review') }}
            </a>
        </div>
    </div>
    <div class="profile-single-comment-item">
        <div class="w-100 d-flex flex-wrap">
            <div class="profile-single-review-content">
                <div class="profile-single-comment-body">
                    <form class="form-horizontal w-100 h-100" method="POST" id="commentForm-{{ $comment->id }}" novalidate="" action="{{ route('profile-comments.update', $comment->id) }}">
                        @method('PATCH')
                        @csrf
                        <textarea name="body"
                                  class="form-control comment-textarea"
                                  type="text"
                                  disabled
                                  required>{!! $comment->body !!}</textarea>
                    </form>
                </div>
            </div>
            <div class="profile-single-comment-button">
                <a type="button"
                   id="enableEditCommentButton-{{ $comment->id }}"
                   data-form="commentForm-{{ $comment->id }}">
                    @lang('service/index.edit')
                </a>
                <a data-toggle="modal"
                   type="button"
                   class="deleteComment"
                   data-review-id="{{ $comment->id }}"
                   data-target="#deleteCommentModal">
                    @lang('service/index.delete')
                </a>
                <a type="button"
                   id="saveCommentButton-{{ $comment->id }}"
                   style="display: none"
                   data-form="commentForm-{{ $comment->id }}">
                    @lang('service/index.save')
                </a>
                <a type="button"
                   id="cancelSaveCommentButton-{{ $comment->id }}"
                   style="display: none"
                   data-form="commentForm-{{ $comment->id }}">
                    @lang('service/index.cancel')
                </a>
            </div>
        </div>
    </div>
</div>
