<div class="modal fade" id="modal-update" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/user/update" method="post" name="form-update" class="form">
                    <div class="form-row">
                        <input type="hidden" name="id" value="<?= $view_data['user']['id'] ?>">
                        <div class="col">
                            <input class="form-control" type="text" name="name" value="<?= $view_data['user']['name'] ?>">
                        </div>
                        <div class="col">
                            <input class="form-control" type="text" name="email" value="<?= $view_data['user']['email'] ?>">
                        </div>
                        <div class="col">
                            <select class="form-control" name="country">
                                <?php foreach ($view_data['countries'] as $country) { ?>
                                    <?php if ($country['id'] === $view_data['user']['c_id']) { ?>
                                        <option selected value="<?= $country['id'] ?>"><?= $country['country'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $country['id'] ?>"><?= $country['country'] ?></option>
                                    <?php } ?>
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