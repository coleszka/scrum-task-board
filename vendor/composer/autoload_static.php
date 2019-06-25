<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita96c6dbc01e1938c115addac96809d55
{
    public static $files = array (
        '35cae0b9642cff34b77db51076299f76' => __DIR__ . '/../..' . '/php/statement/statement.php',
    );

    public static $classMap = array (
        'AddProject' => __DIR__ . '/../..' . '/php/projects/add_project/add_project.php',
        'AddStories' => __DIR__ . '/../..' . '/php/projects/add_stories/add_stories.php',
        'AddTask' => __DIR__ . '/../..' . '/php/projects/add_task/add_task.php',
        'AddUser' => __DIR__ . '/../..' . '/php/projects/add_user/add_user.php',
        'CheckByIdUser' => __DIR__ . '/../..' . '/php/check/check_by_id_user.php',
        'Db' => __DIR__ . '/../..' . '/php/db/db.php',
        'DeleteProject' => __DIR__ . '/../..' . '/php/projects/delete_project/delete.php',
        'DeleteUserFromProject' => __DIR__ . '/../..' . '/php/projects/delete_user_from_project/delete.php',
        'EditProject' => __DIR__ . '/../..' . '/php/projects/edit_project/edit_project.php',
        'Input' => __DIR__ . '/../..' . '/php/registration/input_values.php',
        'MyProjects' => __DIR__ . '/../..' . '/php/projects/my_projects.php',
        'ProjectDetails' => __DIR__ . '/../..' . '/php/projects/show_project.php',
        'Register' => __DIR__ . '/../..' . '/php/registration/check.php',
        'ShowStories' => __DIR__ . '/../..' . '/php/taskboard/show_stories.php',
        'ShowTasks' => __DIR__ . '/../..' . '/php/taskboard/show_tasks.php',
        'UpdateTimeline' => __DIR__ . '/../..' . '/php/taskboard/update_task_timeline/update_timeline.php',
        'UserInDb' => __DIR__ . '/../..' . '/php/log-in/check_user_in_db.php',
        'UserProjectDetails' => __DIR__ . '/../..' . '/php/projects/show_user_project.php',
        'UsersThisProject' => __DIR__ . '/../..' . '/php/projects/users_this_project.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInita96c6dbc01e1938c115addac96809d55::$classMap;

        }, null, ClassLoader::class);
    }
}
