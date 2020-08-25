<form action="/mail/send" method="POST">
    @csrf
    <p>メールドレス</p>
    <input type="text" name="email">
    <p>内容</p>
    <input type="text" name="content">
    <br>
    <input type="submit">
</form>