<?php
/**
 * @var array $info
 */
?>
<div id="divShopPrincipal" class="container-fluid d-flex flex-row">
    <div id="divShopCategories" class="col-2 d-none d-lg-flex flex-column mt-4">
        <!-- ============== Price ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Prix</h4>
            <p class="ms-4 mb-1">De 0 à 200 euros</p>
            <p class="ms-4 mb-1">Plus de 200 euros</p>
            <p class="ms-4 mb-1">Plus de 400 euros</p>
        </div>
		<!-- ============== Type ============== -->
		<div class="mb-2">
			<h4 class="mb-2">Types</h4>
			<?php foreach ($info['type'] as $type):?>
				<a class="d-flex align-items-baseline" href="/shop<?= $info['prefix']['category']?>/type/<?= $type['id']?>/0">
					<input type="radio" class="form-check-input" <?= $info['active']['type'] === $type['id'] ?'checked': ''?>>
					<p class="ms-2 mb-1"><?= $type['type']?></p>
				</a>
			<?php endforeach; ?>
		</div>
        <!-- ============== Brand ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Marques</h4>
			<?php foreach ($info['brand'] as $brand):?>
			<a class="d-flex align-items-baseline" href="/shop<?= $info['prefix']['category'] . $info['prefix']['type']?>/brand/<?= $brand['value']?>/0">
				<input type="radio" class="form-check-input" <?= $info['active']['brand'] === $brand['value'] ?'checked': ''?>>
				<p class="ms-2 mb-1"><?= $brand['value']?></p>
			</a>
			<?php endforeach; ?>
        </div>
		<?php foreach($info['spec'] as $name => $spec_group): ?>
		<div class="mb-2">
			<h4 class="mb-2"><?= $name ?></h4>
			<?php foreach($spec_group as $spec):
				$active = false;
				if($info['active']['filter'] !== null && key_exists($name, $info['active']['filter']) && in_array($spec, $info['active']['filter'][$name])){
					$active = true;
					$new_filter = $info['active']['filter'];
					unset($new_filter[$name][array_search($spec, $new_filter[$name])]);
					$postfix = arrayToFilter($new_filter);
				}else{
					$postfix = (empty($info['prefix']['filter']) ? "/filter": $info['prefix']['filter']) . "/$name/$spec";
				}
			?>
			<a class="d-flex align-items-baseline" href="/shop<?= $info['prefix']['category'] . $info['prefix']['type'] . $info['prefix']['brand'] . "/0" . $postfix?>">
				<input type="checkbox" class="form-check-input" <?= $active ? 'checked': ''?>>
				<p class="ms-2 mb-1"><?= $spec?></p>
			</a>
			<?php endforeach;?>
		</div>
		<?php endforeach;?>
    </div>
    <div id="divShopLine" style="background-color: #D8D8D8" class="border border-2 d-none d-lg-flex mt-4 rounded"></div>
    <div id="divShopMain" class="d-flex flex-row flex-wrap">
        <?php
        for($i=0; $i<=12; $i++){?>
            <div class="card mx-4 my-5 col-10 col-lg-2" onClick="window.open('/shop/one/product');">
                <img src="/assets/images/cl4p-tp_center.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Samsung Galaxy A51 Smartphone 128GB 4GB Prism Crush Black</h6>
                    <p class="card-text" style="color: green">Trés bonne etat</p>
                    <p class="btn btn-primary" style="width: 100%; color: black">255,00 €</p>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
<nav aria-label="Page navigation example" class="d-flex justify-content-center mb-1">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Précedent</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
    </ul>
</nav>