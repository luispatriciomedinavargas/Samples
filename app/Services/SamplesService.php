<?php



namespace App\Services;

use App\Models\Sample;

class SamplesService
{


    protected $sampleModel;

    public function __construct(Sample $sampleModel)
    {
        $this->sampleModel = $sampleModel;
    }


    public function returnAllSamples()
    {
        return Sample::All();
    }

    public function createSample($request): Sample | bool
    {
        return Sample::create($request);
    }


    public function updateSample($data, Sample $SampleId)
    {
        $test= $SampleId->update($data);
    }

    public function findSamples($data)
    {
        $query = Sample::query();
        if (isset($data['group_id'])) {
            $query->where('group_id', $data['group_id']);
        }

        if (isset($data['type_id'])) {
            $query->where('type_id', $data['type_id']);
        }

        if (isset($data['gender_id'])) {
            $query->where('gender_id', $data['gender_id']);
        }

        if (isset($data['sound_id'])) {
            $query->where('sound_id', $data['sound_id']);
        }
        return $resultados = $query->get();
        return $resultados;

    }
}
