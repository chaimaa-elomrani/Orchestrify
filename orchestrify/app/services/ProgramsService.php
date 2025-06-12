<?php
namespace App\Services;
use App\Models\ChefProfile;
use App\Models\MusicianProfile;
use App\Models\Program;
use App\Models\Programs;
use DB;
use Illuminate\Support\Facades\Validator;
use Request;

/**
 * Service class for handling Program-related operations
 */
class ProgramsService{

    /**
     * Store a new program with its associated musicians
     *
     * @param array $data Array containing program details and musicians data
     *                    Expected format:
     *                    [
     *                        'name' => string,
     *                        'style' => string,
     *                        'tempo' => string,
     *                        'duration' => integer,
     *                        'musicians' => [
     *                            [
     *                                'musician_id' => integer,
     *                                'ordre' => integer,
     *                                'duree' => integer
     *                            ]
     *                        ]
     *                    ]
     * @return Programs The created program instance
     * @throws \Exception When an error occurs during transaction
     */
    public function store(array $data)
    {
        DB::beginTransaction();
               
        try {
            // Create the program WITH chef_id included
            $program = Programs::create([
                'name' => $data['name'],
                'style' => $data['style'],
                'tempo' => $data['tempo'],
                'duration' => $data['duration'],
                'mode' => $data['mode'] ?? 'Concert',
                'chef_id' => auth()->id(), // Add chef_id here during creation
            ]);

            // If musicians data is provided, attach them to the program
            if (isset($data['musicians']) && is_array($data['musicians'])) {
                foreach ($data['musicians'] as $musician) {
                    $program->musicians()->attach($musician['musician_id'], [
                        'ordre' => $musician['ordre'],
                        'duree' => $musician['duree']
                    ]);
                }
            }

            DB::commit();
            return $program;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }


    
}