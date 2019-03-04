<?php

namespace Core;

use App\Config;

class View
{
    public function render($views, $title, $data = [])
    {
        foreach ($views as $view) {
            if (!is_file(Config::PATH_VIEWS . $view . '.php')) {
                throw new \RuntimeException();
            }
        }

        try {
            ob_start();

            foreach ($views as $view) {
                $this->protectedInclude(Config::PATH_VIEWS . $view . '.php', ['view_data' => $data]);
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
        $this->protectedInclude(Config::PATH_VIEWS . 'layout.php', ['view_content' => $output, 'view_title' => $title]);
        echo ob_get_clean();
    }

    protected function protectedInclude()
    {
        extract(func_get_arg(1), EXTR_OVERWRITE);
        include func_get_arg(0);
    }
}