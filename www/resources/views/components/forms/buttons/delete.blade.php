<form {{ $attributes }} class="ml-5" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn--red">Delete</button>
</form>
