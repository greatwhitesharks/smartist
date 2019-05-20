<nav class="navbar navbar-inverse">
        <div>
            <ul class="nav navbar-nav">
                <li class="<?= ($filter!='artists' && $filter !='lyrics') ? active : '' ?>"><a href="<?= PUBLIC_URL ."/search/$key"?>">ALL</a></li>
                <li class="<?= ($filter=='artists') ? active : '' ?>"><a href="<?= PUBLIC_URL . "/search/artists/$key"?>">People</a></li>
                <li class="<?= ($filter=='lyrics') ? active : '' ?>"><a href="<?= PUBLIC_URL . "/search/lyrics/$key"?>">Articles</a></li>
            </ul>
        </div>
    </nav>