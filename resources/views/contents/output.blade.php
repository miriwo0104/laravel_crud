<h1>output</h1>

@foreach ($all_contents as $item)
    <hr>
    <p>{{$item['content']}}</p>
    <form action="{{route('delete')}}" method="post">
        @csrf
        <input type="hidden" name="content_id" value="{{$item['id']}}">
        <input type="submit" value="削除">
    </form>
    <a href="{{route('edit', ['content_id' => $item['id']])}}">
        <button>編集</button>
    </a>
@endforeach