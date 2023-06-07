<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $allowedFields    = ['name', 'image', 'price', 'ammount', 'valid_until'];

    public function transaction()
    {
        return $this->hasMany(TransactionModel::class);
    }

    public function getAllProduct()
    {
        return $this->findAll();
    }

    public function handleInsert($name, $image, $price, $ammount, $valid_until)
    {
        $data = [
            'name'         => $name,
            'image'        => $image,
            'price'        => $price,
            'ammount'      => $ammount,
            'valid_until'  => $valid_until
        ];

        $this->insert($data);
        return true;
    }

//     public function find($id)
// {
//     $result = $this->db->where('product_id', $id)
//                        ->limit(1)
//                        ->get('products');
//     if ($result->num_rows() > 0) {
//         return $result->row();
//     } else {
//         return array();
//     }
// }

}
