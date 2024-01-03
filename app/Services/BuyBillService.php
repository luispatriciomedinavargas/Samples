<?php



namespace App\Services;

use App\Models\Buy;
use App\Models\BuyBill;

use function PHPUnit\Framework\isFinite;

class BuyBillService
{
    protected $buy;
    protected $buyBill;


    public function  __construct(Buy $buy, BuyBill $buyBill)
    {
        $this->$buy = $buy;
        $this->$buyBill = $buyBill;
    }



    public function createBuy($data)
    {
        $buy = Buy::Create([
            'date_buy' => $data['date_buy'],
            'method_pay' => $data['method_pay'],
            'user_id' => $data['user_id']
        ]);
        $this->createBuyBill($buy->id, $data['idsample']);
        return $buy;
    }

    public function showAll()
    {
        return Buy::with('details')->get();
    }
    public function showById($id)
    {
        return Buy::with('details')->find($id);
    
    }
    
    public function createBuyBill($idBuy, $listIdSample)
    {
        $isFinishLoop = false;
        for ($i = 0; $i < count($listIdSample); $i++) {
            BuyBill::Create([
                'buy_id' => $idBuy,
                'sample_id' => $listIdSample[$i]
            ]);
            if ($i == count($listIdSample) - 1) {
                $isFinishLoop = true;
            }
        }
        return $isFinishLoop;
    }
}
