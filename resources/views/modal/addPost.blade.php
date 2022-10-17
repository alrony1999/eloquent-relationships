<!-- Modal -->
<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="saveform-errlist">

                    </ul>
                    <input type="hidden" value="{{$author}}" id="author">
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" class="form-control title" name="title">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Slug</label>
                        <input type="email" class="form-control slug" name="slug">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Body</label>
                        <input type="text" class="form-control body" name="body">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-post-btn">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>