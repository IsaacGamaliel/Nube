<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var modal = $(this)
        var btn = $(event.relatedTarget) 
        var file_id = btn.attr('data-file-id') 
        modal.find('.modal-body #file_id').val(file_id);
});
</script>