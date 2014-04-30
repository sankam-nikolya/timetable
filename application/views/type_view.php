<div class="container" style="padding-bottom: 15px">
    <ul class="nav nav-pills">
        <li <?php if ($this->uri->rsegment(1) == 'shedule'): ?>class="active"<?php endif ?>><a
                href="<?= base_url() ?>fulltime">Очное</a></li>
        <li <?php if ($this->uri->rsegment(1) == 'shedulezao'): ?>class="active"<?php endif ?>><a
                href="<?= base_url() ?>parttime">Заочное</a></li>
    </ul>
</div>