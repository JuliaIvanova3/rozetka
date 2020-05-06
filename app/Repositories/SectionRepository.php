<?php

namespace App\Repositories;

use App\Section;

class SectionRepository
{
    protected $section;

    /**
     *  Section Repository construct
     * @param Section $section
     */
    public function __construct(Section $section)
    {
        $this->section = $section;
    }

    /**
     * @return void
     */
    public function all()
    {
        return $this->section->all();
    }

    /**
     * Find section by id
     * @param $id
     */
    public function find($id)
    {
        return $this->section->find($id);
    }

}