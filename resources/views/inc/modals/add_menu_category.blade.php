<!-- Add menu category modal-->
<div class="modal fade" id="addMenuCategoryModal" tabindex="-1" aria-labelledby="addMenuCategoryModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuCategoryModalTitle"> Add Menu Category </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('menu_cats.store') }}"  class="restaurant-info-form">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $res->id }}" name="restaurant_id">
                <div class="mb-1">
                    <label class="form-label" for="name">Menu Category</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Category" required>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="mb-1">
                    <label class="form-label" for="desc">Category Description (Optional)</label>
                    <textarea name="description" class="form-control" id="desc" rows="3" placeholder="Description"></textarea>
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="d-grid mb-1">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal ends here-->
