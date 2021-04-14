<?php

use yii\helpers\ArrayHelper;

/* @var $this \yii\web\View */
/* @var $dropdown \thtmorais\dropdown\Dropdown */

$dropdown = $this->context;

$dropdownMainId = ArrayHelper::getValue($dropdown->main,"id","main");
$dropdownMainHref = ArrayHelper::getValue($dropdown->main,"href","#");
$dropdownMainClass = ArrayHelper::getValue($dropdown->main,"class","btn btn-success");
$dropdownMainText = ArrayHelper::getValue($dropdown->main,"text","main");
?>

    <div class="btn-group">
        <a id="<?= $dropdownMainId ?>" href="<?= $dropdownMainHref ?>" class="<?= $dropdownMainClass ?>"><?= $dropdownMainText ?></a>
        <button class="<?= $dropdown->dropdownToggleClass ?> dropdown-toggle" data-toggle="dropdown">
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu">
            <?php foreach ($dropdown->subordinate as $subordinateId => $subordinate) : ?>
                <li>
                    <a id="<?= ArrayHelper::getValue($subordinate,"id", $subordinateId) ?>" href="<?= ArrayHelper::getValue($subordinate,"href","#$subordinateId") ?>" class="<?= ArrayHelper::getValue($subordinate,"href","$subordinateId") ?>"><?= ArrayHelper::getValue($subordinate,"text", $subordinateId) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?php foreach ($dropdown->subordinate as $subordinateId => $subordinate) {

$dropdownSubordinateId = ArrayHelper::getValue($subordinate,"id",$subordinateId);

$this->registerJs(
<<<JS

    $('#$dropdownSubordinateId').click(function (){
        let primary = $('#$dropdownMainId');
        let secondary = $('#$dropdownSubordinateId');
        
        let primaryText = primary.text();
        let primaryHref = primary.attr('href');
        
        primary.text(secondary.text());
        primary.attr('href',secondary.attr('href'));
        
        secondary.text(primaryText)
        secondary.attr('href',primaryHref);
        
        return false;
    });

JS
,$this::POS_END);

}?>