<?php
/**
 * @var array $traderPendingText
 */
?>
<div id="traderpendingproductgeneral" class="container-fluid d-flex flex-column">
    <h3 class="align-self-center mb-4 mt-3"><?= $traderPendingText['offer']['title']?></h3>
    <div class="container-fluid d-flex flex-column flex-lg-row">
        <div id="divtraderpendingtable" class="container-fluid col-lg-7">
            <table class="table"
                   id="table_spec"
                   data-toggle="table"
                   data-pagination="true"
                   data-height="600"
                   data-ajax="retrieve_pending"
                   data-side-pagination="server"
                   data-locale="<?= $_SESSION['lang']?>">
                <thead>
                <tr>
                    <th data-field="id"><?= $traderPendingText['offer']['table']['header']['id']?></th>
                    <th data-field="date"><?= $traderPendingText['offer']['table']['header']['date']?></th>
                    <th data-field="type"><?= $traderPendingText['offer']['table']['header']['type']?></th>
                    <th data-field="status"><?= $traderPendingText['offer']['table']['header']['status']?></th>
                    <th data-field="detail"></th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="divtraderpendinginfo" class="container-fluid col-lg-3 d-flex flex-column justify-content-center my-auto p-4 border border-2 border-primary rounded-3">
            <h4 class="align-self-center mb-3"><?= $traderPendingText['offer']['detail']['title']?></h4>
            <input type="text" name="type" class="form-control mb-1" style="text-align: center" readonly>
            <input type="text" name="brand" class="form-control mb-1" style="text-align: center" readonly>
            <input type="text" name="model" class="form-control mb-1" style="text-align: center" readonly>
            <input type="text" name="state" class="form-control mb-1" style="text-align: center" readonly>
            <div class="input-group mb-1">
                <span class="input-group-text">Offre</span>
                <input type="text" name="offer" class="form-control" style="text-align: center" readonly>
            </div>
            <div class="input-group mb-1">
                <span class="input-group-text">Contre Offre</span>
                <input name="counter" type="text" class="form-control" style="text-align: center" readonly>
            </div>
        </div>
    </div>
</div>
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1500">
    <div id="ToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
        <div class="toast-body bg-danger">
            Hello, world! This is a toast message.
        </div>
    </div>
    <div id="ToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
        <div class="toast-body bg-success">
            Hello, world! This is a toast message.
        </div>
    </div>
    <div id="ToastWarning" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
        <div class="toast-body bg-warning">
            Hello, world! This is a toast message.
        </div>
    </div>
</div>
<script>
    let text = {
        "state":{
            1:"<?= $traderPendingText['offer']['detail']['state']['state_jabba']?>",
            2:"<?= $traderPendingText['offer']['detail']['state']['state_passable']?>",
            3:"<?= $traderPendingText['offer']['detail']['state']['state_ok']?>",
            4:"<?= $traderPendingText['offer']['detail']['state']['state_good']?>",
            5:"<?= $traderPendingText['offer']['detail']['state']['state_new']?>"
        },
        "status":{
            1: "<?= $traderPendingText['offer']['table']['status']['not_send']?>",
            2: "<?= $traderPendingText['offer']['table']['status']['send']?>",
            3: "<?= $traderPendingText['offer']['table']['status']['analysing']?>",
            4: "<?= $traderPendingText['offer']['table']['status']['counter']?>",
        },
        "detail": "<?= $traderPendingText['offer']['detail']['detail']?>",
        "counter": "<?= $traderPendingText['offer']['detail']['counter']?>"
    }
</script>
<script src="/assets/js/pendingOffer.js"></script>