<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title;?></h1>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <a href="" class="btn btn-primary">Add New Menu</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    <?php foreach ($menu as $m): ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><?= $m['menu']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success"><i
                                    class="fas fa-regular fa-edit"></i></button>
                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-solid fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>