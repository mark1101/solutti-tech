<?php

namespace App\Repositories;

use App\Models\Loja;
use Illuminate\Support\Facades\DB;

class LojaRepository
{

    /**
     * @return Collection
     */
    public function show()
    {
        return Loja::all();
    }

    /**
     * @param array $data
     * @return Loja
     */
    public function store(array $data)
    {
        try {
            DB::beginTransaction();
            $loja = Loja::create($data);
            DB::commit();
            return $loja;
        } catch (\Exception $error) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @param int $id
     * @param array $data
     * @return Loja
     */
    public function updade(array $data, int $loja_id)
    {
        try {

            DB::beginTransaction();
            $loja = Loja::find($loja_id);
            $loja->update($data);
            DB::commit();
            return $loja;
        } catch (\Exception $error) {
            DB::rollBack();
            return false;
        }
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $loja_id)
    {
        try {
            DB::beginTransaction();
            $loja = Loja::find($loja_id);
            $loja->delete();
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            return false;
        }
    }
}
