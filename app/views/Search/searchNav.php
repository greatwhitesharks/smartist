
<div class="row m-5" style="">
    <div class="col-12"> 
<nav class="navbar" id="srchNav">
        <div>
            <ul class="nav nav-pills">
                <li class="nav-item <?= ($filter!='artists' && $filter !='lyrics') ? active : '' ?>"><a class="nav-link" href="<?= PUBLIC_URL ."/search/$key"?>">ALL</a></li>
                <li class="nav-item <?= ($filter=='artists') ? active : '' ?>"><a class="nav-link" href="<?= PUBLIC_URL . "/search/artists/$key"?>">People</a></li>
                <li class="nav-item <?= ($filter=='lyrics') ? active : '' ?>"><a class="nav-link" href="<?= PUBLIC_URL . "/search/lyrics/$key"?>">Articles</a></li>
            </ul>
        </div>
    </nav>
    </div>    </div>