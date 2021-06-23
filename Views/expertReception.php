<div id="expertoffergeneral" class="container-fluid d-flex flex-column">
    <h3 class="align-self-center mb-4 mt-3">Reception offre</h3>
    <div class="container-fluid d-flex flex-column flex-lg-row">
        <div id="divexpertoffertable" class="container-fluid col-lg-7">
            <table
                class="table"
                id="table_offer"
                data-toggle="table"
                data-pagination="true"
                data-height="600"
                data-ajax="retrieve_offer"
                data-side-pagination="server"
                data-row-attributes="rowAttributes"
                data-locale="<?= $_SESSION['lang']?>">
                <thead>
                <tr>
                    <th data-sortable data-field="id">ID</th>
                    <th data-field="type">Type</th>
                    <th data-sortable data-field="date">Date</th>
                    <th data-field="brand">Brand</th>
                    <th data-field="model">Model</th>
                    <th data-field="select">Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
</div>
<!-- TOAST -->
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
<script src="/assets/js/expertOffer.js"></script>