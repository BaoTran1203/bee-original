<script>
    var loadFile = function (event) {
        var output = document.getElementById('uploadPreview');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>