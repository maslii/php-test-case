<?php

namespace App\Controllers;

use App\Models, Core\Controller, Core\Exceptions;

class UserController extends Controller
{
    public function get()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exceptions\MethodNotAllowedException();
        }

        if (!isset($_POST['id'])) {
            throw new Exceptions\BadRequestException();
        }

        $id = trim($_POST['id']);
        $id = filter_var((int) $id, FILTER_VALIDATE_INT);

        if ($id === false) {
            throw new Exceptions\BadRequestException();
        }

        $model = new Models\UserModel($this->database_connection);
        $user = $model->getUser($id)[0];

        $model = new Models\CountryModel($this->database_connection);
        $countries = $model->getCountries();

        $this->view->renderPart(['modals/update'], ['user' => $user, 'countries' => $countries]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exceptions\MethodNotAllowedException();
        }

        $model = new Models\CountryModel($this->database_connection);
        $countries = $model->getCountries();

        $this->view->renderPart(['modals/create'], ['countries' => $countries]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exceptions\MethodNotAllowedException();
        }

        if (!isset($_POST['id'])) {
            throw new Exceptions\BadRequestException();
        }

        $id = trim($_POST['id']);
        $id = filter_var((int) $id, FILTER_VALIDATE_INT);

        if ($id === false) {
            throw new Exceptions\BadRequestException();
        }

        $model = new Models\UserModel($this->database_connection);
        $model->deleteUser($id);

        header('Location: /');
        exit();
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exceptions\MethodNotAllowedException();
        }

        if (!isset($_POST['name'], $_POST['email'], $_POST['country'])) {
            throw new Exceptions\BadRequestException();
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $country = trim($_POST['country']);

        $name = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $country = filter_var((int) $country, FILTER_VALIDATE_INT);

        if ($name === false || $email === false || $country === false) {
            throw new Exceptions\BadRequestException();
        }

        $model = new Models\UserModel($this->database_connection);
        $model->addUser($name, $email, $country);

        header('Location: /');
        exit();
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            throw new Exceptions\MethodNotAllowedException();
        }

        if (!isset($_POST['name'], $_POST['email'], $_POST['country'], $_POST['country'])) {
            throw new Exceptions\BadRequestException();
        }

        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $country = trim($_POST['country']);
        $id = trim($_POST['id']);

        $name = filter_var($name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $email = filter_var($email, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $country = filter_var((int) $country, FILTER_VALIDATE_INT);
        $id = filter_var((int) $id, FILTER_VALIDATE_INT);

        if ($name === false || $email === false || $country === false || $id === false) {
            throw new Exceptions\BadRequestException();
        }

        $model = new Models\UserModel($this->database_connection);
        $model->updateUser($id, $name, $email, $country);

        header('Location: /');
        exit();
    }
}