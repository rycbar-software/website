<x-app-layout>
    @foreach($requests as $request)
        <section>
            <p>{{ $request->name }}</p>
            <p>{{ $request->created_at }}</p>
            <p>{{ $request->email }}</p>
            <p>{{ $request->message }}</p>
        </section>
    @endforeach
</x-app-layout>
