<?php

class Story extends DbModel
{
    const TABLE = 'story';
    const INDEX = 'id';

    protected $data = array(
        'id' => null,
        'id_project' => null,
        'active' => false,
        'name' => 'As an user I... (Double click to edit)',
    );

    public function getTasks() {
        if($this->id) {
            return Task::getBy('id_story', $this->id);
        } else {
            return new TaskCollection;
        }
    }

    public function save() {
        if(!$this->active) {
            foreach($this->getTasks() as $task) {
                $task->state = 'todo';
                $task->save();
            }
        }
        parent::save();
    }
}
