<?php

namespace App\Repositories;

interface UserRepository extends RepositoryInterface
{
    public function all();
    public function paginate($items = null);
    public function find($id);
}

