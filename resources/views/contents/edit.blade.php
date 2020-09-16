<h1>edit</h1>
{{-- 下記を追記する --}}
@error('content')
    {{ $message }}
@enderror
{{-- 上記までを追記する --}}
<form action="{{route('update')}}" method="post">
    @csrf
    <textarea name="content" cols="30" rows="10">{{$edit_content['content']}}</textarea>
    <input type="hidden" name="content_id" value="{{$edit_content['id']}}">
    <input type="submit" value="送信">
</form>