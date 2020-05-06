<?php 

namespace App\Services;

use App\Repositories\SectionRepository;
use App\Section;

class SectionService
{
    protected $sectionRepository;

    /**
     * Section Service construct 
     * @param SectionRepository $sectionRepository
     */
    public function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    /**
     * return void
     */
    public function index()
    {
        return $this->sectionRepository->all();
    }
}