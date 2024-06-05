<?php

namespace Hthiet\Xuongoop\Models;

use Hthiet\Xuongoop\Commons\Model;

class Product extends Model
{
    protected string $tableName = 'products';

    public function all(){
        return $this->queryBuilder
            ->select('p.id', 'p.name', 'p.price', 'p.quantity', 'p.img_thumbnail', 'p.id_category', 'p.description' , 'p.created_at', 'p.updated_at',
                    'c.name as category_name')
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'p.id_category = c.id')
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
    }

    public function paginate($page = 1, $perPage = 10)
    {
        $queryBuilder = clone($this->queryBuilder);

        $offset = $perPage * ($page - 1);

        $data = $queryBuilder
            ->select('p.id', 'p.name', 'p.price', 'p.quantity', 'p.img_thumbnail', 'p.id_category', 'p.description' , 'p.created_at', 'p.updated_at',
                    'c.name as category_name')
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'p.id_category = c.id')
            ->setFirstResult($offset)
            ->setMaxResults($perPage)
            ->orderBy('p.id', 'DESC')
            ->fetchAllAssociative();
        
        $totalPage = ceil($this->count() / $perPage);

        return [$data, $totalPage];
    }

    public function findByID($id)
    {
        return $this->queryBuilder
            ->select('p.id', 'p.name', 'p.price', 'p.quantity', 'p.img_thumbnail', 'p.id_category', 'p.description' , 'p.created_at', 'p.updated_at',
                    'c.name as category_name')
            ->from($this->tableName, 'p')
            ->innerJoin('p', 'categories', 'c', 'p.id_category = c.id')
            ->where('p.id = ?')
            ->setParameter(0, $id)
            ->fetchAssociative();
    }
    
}