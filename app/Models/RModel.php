<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RModel extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    public $timestamps = true; // true = created_at e updated_at
    public $incrementing = true; // true = autoincremento
    protected $fillable = [];

    public function beforeSave() // método que será chamado antes de salvar
    {
        return true;
    }

    public function save(array $options = []) // sobrescrevendo o método save
    {
        try {
            if (!$this->beforeSave()) { // chamando o método beforeSave
                return false;
            }

            return parent::save($options); // chamando o método save da classe pai


        } catch (\Exception $e) {
            throw new \Exception($e->getMessage()); // lançando a exceção
        }
    }
}
