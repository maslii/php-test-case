<div class="modal fade" id="modal-create" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/add" method="post" name="form-update" class="form">
                    <div class="form-row">
                        <div class="col">
                            <input class="form-control" type="text" name="name" value="" placeholder="Name">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="email" value="" placeholder="Email">
                        </div>
                        <div class="col">
                            <select class="form-control" name="country">
                                <?php foreach ($view_data['countries'] as $country) { ?>
                                    <option value="<?= $country['id'] ?>"><?= $country['country'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">OK</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>