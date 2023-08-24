@php
    use App\Enum\StatusEnum;
    use App\Models\DataModel;
    /**
    * @var DataModel $entity
    */
@endphp
<form {{ $attributes }} method="POST">
    @csrf
    @if($entity?->id)
        <input type="hidden" name="id" value="{{ $entity->id }}">
    @endif
    <x-forms.input-group>
        <x-forms.select name="status" title="Select article status">
            @foreach(StatusEnum::cases() as $status)
                <option
                    value="{{ $status->value }}"
                    @if($entity?->status == $status)
                        selected
                    @endif
                >{{ $status->name }}</option>
            @endforeach
        </x-forms.select>
    </x-forms.input-group>
    <x-forms.input-group>
        <x-forms.input-text name="name" title="Name:" :value="$entity?->name ?: ''" placeholder="Name"></x-forms.input-text>
    </x-forms.input-group>
    <x-forms.input-group>
        <x-forms.input-text name="slug" title="Slug:" :value="$entity?->slug ?: ''" placeholder="slug"></x-forms.input-text>
    </x-forms.input-group>
    <x-forms.input-group>
        <x-forms.input-text name="sort" title="Sort:" :value="$entity?->sort ?: ''" placeholder="500"></x-forms.input-text>
    </x-forms.input-group>

    {{ $slot }}

    <x-forms.input-group>
        <x-forms.tinymce-editor name="preview_text" :value="$entity?->preview_text ?: ''" title="Preview text"></x-forms.tinymce-editor>
    </x-forms.input-group>
    <x-forms.input-group>
        <x-forms.tinymce-editor name="detail_text" :value="$entity?->detail_text ?: ''" title="Detail text"></x-forms.tinymce-editor>
    </x-forms.input-group>
    <x-forms.input-group>
        <x-forms.buttons.submit value="Save"></x-forms.buttons.submit>
    </x-forms.input-group>
</form>
