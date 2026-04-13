<form action="/update/{{ $user->id }}" method="POST">
    @csrf

    <input type="email" name="email" value="{{ $user->email }}">
    <input type="text" name="password">

    <button type="submit">Update</button>
</form>
