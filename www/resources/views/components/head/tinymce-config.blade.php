<script src="{{ asset('/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea.tynimce-editor',
        plugins: 'code table lists codesample',
        toolbar: 'undo redo | blocks | codesample | bold italic | bullist numlist | code'
    });
</script>
