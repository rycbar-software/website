<script src="{{ asset('/assets/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: 'textarea.tynimce-editor',
        plugins: 'code table lists codesample link',
        toolbar: 'undo redo | blocks | codesample | bold italic | bullist numlist | code',
        codesample_global_prismjs: true,
        codesample_languages: [
            { text: 'HTML/XML', value: 'markup' },
            { text: 'JavaScript', value: 'javascript' },
            { text: 'CSS', value: 'css' },
            { text: 'PHP', value: 'php' },
            { text: 'Python', value: 'python' },
            { text: 'C', value: 'c' },
            { text: 'Bash', value: 'bash' },
            { text: 'Go', value: 'go' },
        ]
    });
</script>
