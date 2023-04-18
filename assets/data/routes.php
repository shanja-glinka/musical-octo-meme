<?

return [
    '/todo/tasks' => [
        'GET' => 'Controllers\Todo@TaskList'
    ],
    '/todo/tasks/:any' => [
        'GET' => 'Controllers\Todo@TaskList'
    ],
    '/todo/task' => [
        'POST' => 'Controllers\Todo@NewTask',
    ],
    '/todo/task/:num' => [
        'GET' => 'Controllers\Todo@Task',
        'PUT' => 'Controllers\Todo@UpdateTask',
        'DELETE' => 'Controllers\Todo@RemoveTask',
    ]

];
