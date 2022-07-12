        <div class="sidewidt">
          <h2 class="heading2"><span>KATALOG</span></h2>
          <ul class="nav nav-list categories">
            <?php foreach ($this->katalog_model->all() as $katalog) { ?>
            <li>
              <a href="<?=base_url($katalog['slug'].".html")?>"><?=strtoupper(isset($katalog['nama_katalog']) ? $katalog['nama_katalog'] : '');?></a>
            </li>
            <?php } ?>
          </ul>
        </div>