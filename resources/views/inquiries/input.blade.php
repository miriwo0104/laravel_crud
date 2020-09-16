<form action="{{ route('inquiry.send') }}" method="POST">
    @csrf
    <p>お問い合わせ内容</p>
    <textarea name="content" cols="30" rows="10"></textarea>
    {{-- 下記を追記する --}}
    @error('content')
    {{ $message }}
    @enderror
    {{-- 上記までを追記する --}}

    <p>お客様のお名前</p>
    <input type="text" name="name" value="{{ $user_infos['name'] }}">
    {{-- 下記を追記する --}}
        @error('name')
        {{ $message }}
    @enderror
    {{-- 上記までを追記する --}}

    <p>お客様のメールアドレス</p>
    <p>{{ $user_infos['email'] }}</p>
    <input type="hidden" name="email" value="{{ $user_infos['email'] }}">
    <br>
    <input type="submit" value="送信">
</form>