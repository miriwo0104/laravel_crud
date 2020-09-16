<h1>input</h1>
{{-- 下記を追記する --}}
@error('content')
    {{ $message }}
@enderror
{{-- 上記までを追記する --}}
<form action="{{route('save')}}" method="post">
    @csrf
    {{-- 下記を修正する --}}
    <textarea name="content" cols="30" rows="10">{{ old('content') }}</textarea>
    <input type="submit" value="送信">
</form>