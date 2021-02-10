<!-- Content Page -->
<div class="container">
    
    <!-- Header -->
    <div class="content-header">

        <!-- Title -->
        <span class="content-title">QR List</span>

        <!-- Add Button -->
        <a data-toggle="modal" data-target="#modalAdd" class="btn btn-sm btn-primary float-right">
            <i class="fas fa-plus"></i> Add
        </a>

    </div>

    <!-- Table Transaction -->
    <div class="table-responsive">
        <table class="table table-striped border">
            <thead class="text-center">
                <th class="table-order border">#</th>
                <th class="table-content border">Content</th>
                <th class="table-action border">Action</th>
            </thead>

            <tbody>
                <?php foreach($qr_list as $key => $qr) { ?>
                <tr class="text-center">
                    
                    <!-- Number -->
                    <td class="border"><?= $key+1 ?></td>

                    <!-- Content -->
                    <td class="border"><?= $qr['content'] ?></td>

                    <!-- Action -->
                    <td class="border">

                        <!-- Show -->
                        <button data-toggle="modal" data-target="#modalShow<?= $qr['id'] ?>" class="btn btn-sm btn-success mr-2">
                            <span class="fas fa-eye"></span> Show
                        </button>

                        <!-- Edit -->
                        <button data-toggle="modal" data-target="#modalEdit<?= $qr['id'] ?>" class="btn btn-sm btn-primary mr-2 px-2">
                        <span class="fas fa-edit"></span> Edit
                        </button>

                        <!-- Delete -->
                        <button data-toggle="modal" data-target="#modalDelete<?= $qr['id'] ?>" class="btn btn-sm btn-danger">
                        <span class="fas fa-trash"></span> Delete
                        </button>
                    </td>

                </tr>
                <?php } ?>

                <!-- Empty State -->
                <?php if(empty($qr_list)) { ?>
                    <tr class="text-center"><td colspan="3">Data not found</td></tr>
                <?php } ?>

            </tbody>

        </table>
    </div>

</div>

<!-- Load Modal Views -->
<?php 
    $this->load->view('frontend/modal-add');
    $this->load->view('frontend/modal-detail');
    $this->load->view('frontend/modal-edit');
    $this->load->view('frontend/modal-delete');
?>
