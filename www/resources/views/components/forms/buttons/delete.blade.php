<form {{ $attributes }} class="ml-5" method="POST">
    @csrf
    @method('DELETE')
    <button
        type="submit"
        class="text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5"
    >Delete</button>
</form>
