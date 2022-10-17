<!-- Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="updateform-errlist">

                    </ul>
                    <input type="hidden" id="edit_post_id">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" id="edit_title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Slug</label>
                        <input type="email" class="form-control " name="slug" id="edit_slug">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Body</label>
                        <input type="text" class="form-control " name="body" id="edit_body">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="updateform-post-btn">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>