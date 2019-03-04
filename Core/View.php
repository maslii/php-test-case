<?php

namespace Core;

class View
{
    protected $view_path;

    public function __construct($path)
    {
        $this->view_path = rtrim($path, '/\\') . '/';
    }

    public function render($views, $title, $data = [])
    {
        foreach ($views as $view) {
            if (!is_file($this->view_path . $view . '.php')) {
                throw new \RuntimeException();
            }
        }

        try {
            foreach ($views as $view) {
                ob_start();
                $this->include($view . '.php', ['view_data' => $data]);
            }

            $output = ob_get_clean();

        } catch (\Exception $e) {
            ob_end_clean();
            throw $e;
        } catch (\Throwable $t) {
            ob_end_clean();
            throw $t;
        }

        ob_start();
        $this->include(\App\Config::PATH_VIEWS . 'layout.php', ['view_content' => $output, 'view_title' => $title]);
        echo ob_get_clean();
    }

    protected function include($view, $data)
    {
        extract($data, EXTR_OVERWRITE);
        include func_get_arg(0);
    }
}