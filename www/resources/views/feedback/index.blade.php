<x-app-layout>
    @foreach($requests as $request)
        <section class="mb-10">
            <div class="flex">
                <div>
                    <p class="text-2xl">{{ $request->name }}</p>
                    <p class="text-gray-500 mb-2">{{ $request->created_at }}</p>
                    <p class="mb-2"><a href="mailto:{{ $request->email }}">{{ $request->email }}</a></p>
                </div>
                <x-forms.buttons.delete action="{{ route('feedbacks.destroy', [$request]) }}"></x-forms.buttons.delete>
            </div>
            <p>{{ $request->message }}</p>
        </section>
    @endforeach
</x-app-layout>
