<?php 

namespace App;

use Exception;
use AltoRouter;
use App\Config;

class Router {

    private $altoRouter;
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
        $this->altoRouter = new AltoRouter();
    }
    
    /**
     * get
     *
     * @param  string $url ('/index' || '/blog/[slug]')
     * @param  string $view (folder path)
     * @param  string $name (name of the route, usefull to generate URL) OPTIONNAL
     * @return self
     */
    public function get (string $url, string $view, ?string $name = null): self 
    {
        $this->altoRouter->map('GET', $url, $view, $name);
        return $this;
    }

    public function match(string $url, string $view, ?string $name = null): self
    {
        $this->altoRouter->map('POST|GET', $url, $view, $name);
        return $this;
    }

    public function post(string $url, string $view, ?string $name = null): self
    {
        $this->altoRouter->map('POST', $url, $view, $name);
        return $this;
    }
    
    public function run (): void
    {
        $match = $this->altoRouter->match();
        $view = $match['target'] ?: "E404";
        $router = $this;
        $params = $match['params'];
        $pdo = Config::getPDO();
        try{
            ob_start();
            require $this->path . DIRECTORY_SEPARATOR . $view . '.php';
            $content = ob_get_clean();
            require $this->path . DIRECTORY_SEPARATOR . 'default.php';
        }catch(Exception $e){
             var_dump($e);
        }
    }

    public function url (string $name, array $params = [])
    {
        return $this->altoRouter->generate($name, $params);
    }


}



?>