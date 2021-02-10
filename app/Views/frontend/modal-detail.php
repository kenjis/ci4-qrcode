<!-- Modal Show -->
<?php foreach($qr_list as $key => $qr) { ?>
<div id="modalShow<?= $qr['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="<?= site_url('home/add_data') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">QR Show</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-3">

                    <!-- QR Image -->
                    <img src="<?= base_url($qr['file']) ?>" class="content-img" alt="<?= $qr['content'] ?>">

                    <!-- Content -->
                    <span class="form-control text-center"><?= $qr['content'] ?></span>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>