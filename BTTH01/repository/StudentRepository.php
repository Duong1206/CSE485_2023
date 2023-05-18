<?php
interface StudentRepository {
    public function create(string $name, int $age) :bool;
    public function getAll() :array;
    public function getById(int $id) :?Student;
    public function update(int $id, string $name, int $age) :bool;
    public function delete(int $id) :bool;
}