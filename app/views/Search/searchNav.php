<nav class="navbar navbar-inverse">
        <div>
            <ul class="nav navbar-nav">
                <li class="<?= ($filter!='people' && $filter !='article') ? active : '' ?>"><a href="<?= PUBLIC_URL ."/$key"?>">ALL</a></li>
                <li class="<?= ($filter=='people') ? active : '' ?>"><a href="<?= PUBLIC_URL . "/artists/$key"?>">People</a></li>
                <li class="<?= ($filter=='article') ? active : '' ?>"><a href="<?= PUBLIC_URL . "/lyrics/$key"?>">Articles</a></li>
            </ul>
        </div>
    </nav>