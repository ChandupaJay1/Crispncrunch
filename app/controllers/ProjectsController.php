<?php

/**
 * Projects Controller
 */


class ProjectsController extends Controller
{
    protected static string $title = "Projects";
    protected static string $page = "projects";
    protected static string $view = 'projects';

    /**
     * @throws Exception
     */
    public function index(): View|string
    {
        $data = $this->loadData();
        return new View(static::$view, static::$page, static::$title, $data);
    }

    private function loadData(): array
    {
        $project_model = new ProjectModel();
        $projects = $project_model->selectAll();

        // $image_model = new ImageModel();
        // foreach($projects ?? [] as $project){
        //     $images = $image_model->select(["projects_id" => $project->id]);
        //     $project->images = $images;
        // }

        $data = ["projects" => $projects];
        return $data;
    }
}
