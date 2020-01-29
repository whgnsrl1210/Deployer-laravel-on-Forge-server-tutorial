<div class="media media__create__comment {{ isset($parentId) ? 'sub' : 'top' }}">

  <div class="media-body">
  <form action="{{ route('articles.comments.store', $article->id)}}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}

    @if (isset($parentId))
     <input type="hidden" name="parent_id" value="{{$parentId}}">
    @endif

    <div class="form-group" {{ $errors->has('content') ? 'has-error' : ''}}>
    <textarea name="content" class="form-control">{{old('content')}}</textarea>
    {!! $errors->first('content', '<span class="form-error">:message</span>') !!}
    </div>
    <div class="text-right action__articles">
    <button type="submit" class="btn btn-primary btn-sm">
      댓글 쓰기
    </button>
    </div>
 </form>
  </div>
</div>