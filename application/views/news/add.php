<div class="modal fade" id="add-news" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-muted mb-0">Add News</p>
                <div class="cursor-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="icofont-close text-danger"></i>
                </div>
            </div>
            <form method="post" action="javascript:;" class="add-news-form" data-action="<?= base_url(); ?>news/add" autocomplete="off">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control form-control-lg title" placeholder="e.g., Messi is king of football">
                            <small class="invalid-feedback title-error"></small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" class="form-control form-control-lg author" placeholder="e.g., medri alves">
                            <small class="invalid-feedback author-error"></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control description" name="description" placeholder="Enter news description here." rows="6"></textarea>
                        <small class="invalid-feedback description-error"></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-right">
                        <button type="submit" class="btn rounded-pill btn-primary text-white add-news-button px-4">
                            <img src="<?= base_url(); ?>assets/images/svgs/spinner.svg" class="mr-2 d-none add-news-spinner mb-1">
                            Submit
                        </button>
                        <button type="button" class="btn rounded-pill px-4 bg-danger ml-3 text-white" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
                <div class="px-3">
                    <div class="alert mb-3 add-news-message d-none"></div>
                </div>
            </form>
        </div>
    </div>
</div>