<?php

namespace App\Policies;


use Illuminate\Auth\Access\HandlesAuthorization;


use App\Task;
use App\User;


class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    //funcion para validar que el usuario solo vea lo que le pertenece
    public function owner(User $user, Task $task){
        return $user->id === $task->user_id;   //validar que sea el mismo dueño de esa informacion.
    }
}
