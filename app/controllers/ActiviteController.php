<?php
require_once __DIR__ . '/../models/Activite.php';

class ActiviteController {

    public function activiteList() {

        $model = new Activite();
        $activites = $model->getAllActivite();

        $sections = $model->getUsedSections();

        require_once __DIR__.'/../views/activite/activiteList.php';
    }
}