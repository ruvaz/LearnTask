<?php

namespace   App\Repositories;

/**
 * Repositorio de funciones especificas para trabajar con Task
 */


use App\Task;
use App\User;

class TaskRepository{


    /**
     * Equivale al index de Task
     *   $tasks = Task::where('user_id', $request->user()->id)->get();
     * @param User $user
     * @return mixed
     *
     */
    public function forUser(User $user)
    {
        return Task::where('user_id',$user->id)
            ->orderBy('created_at', 'des')
                ->get();
    }


}