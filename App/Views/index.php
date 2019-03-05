<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Country</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($view_data['users'] as $user) { ?>
            <tr>
                <td><?= $user['name'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['country'] ?></td>
                <td>
                    <div class="float-right">
                        <button type="button" data-id="<?= $user['id'] ?>" class="btn btn-link text-dark btn-update">
                            <i class="fas fa-pen"></i>
                        </button>

                        <form style="display: none;" id="form-delete-<?= $user['id'] ?>" action="/user/delete" method="post">
                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        </form>
                        <button type="submit" form="form-delete-<?= $user['id'] ?>" class="btn btn-link text-danger">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <div class="float-right">
                    <button id="btn-add" type="button" class="btn btn-link text-success">
                        <i class="fas fa-plus-square"></i>
                    </button>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>