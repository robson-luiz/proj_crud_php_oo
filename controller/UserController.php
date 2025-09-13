<?php
require_once __DIR__ . '/../model/User.php';
class UserController {
    public function index($limit = 6, $offset = 0) {
        return User::getPaginated($limit, $offset);
    }
    public function store($name, $email) {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        return $user->insert();
    }
    public function show($id) {
        return User::getById($id);
    }
    public function update($id, $name, $email) {
        $user = new User();
        $user->id = $id;
        $user->name = $name;
        $user->email = $email;
        return $user->update();
    }
    public function destroy($id) {
        return User::delete($id);
    }
}
