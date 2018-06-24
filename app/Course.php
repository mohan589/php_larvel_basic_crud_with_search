<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['user_id', 'title', 'description'];

    public function saveCourse($data)
	{
        $this-> user_id = auth()->user()->id;
        $this-> title = $data['title'];
        $this-> description = $data['description'];
        $this-> save();
        return 1;
	}

    public function updateCourse($data)
	{
        $course = $this->find($data['id']);
        $course ->user_id = auth()->user()->id;
        $course ->title = $data['title'];
        $course ->description = $data['description'];
        $course ->save();
        return 1;
	}

}
