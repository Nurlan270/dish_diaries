<div wire:ignore>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet"/>

    <div id="{{ $quillId }}"></div>

    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quill = new Quill('#{{ $quillId }}', {
                placeholder: '{{ __('recipe-modal.placeholder.description') }}',
                theme: 'snow'
            });

            quill.on('text-change', function () {
                @this.set('value', quill.getSemanticHTML());
            });
        });
    </script>
</div>
