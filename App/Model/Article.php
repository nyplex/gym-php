<?php 

namespace App\Model;

use App\Helpers\Text;
use DateTime;

class Article {


    private $id;
    private $title;
    private $slug;
    private $content;
    private $views;
    private $posted_date;
    private $categories = [];


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($views)
    {
        $this->views = $views;

        return $this;
    }

    public function getPosted_date(): ?string
    {
            $date = new DateTime($this->posted_date);
            return $date->format('d M Y');
    }

    public function setPosted_date($posted_date)
    {
        $this->posted_date = $posted_date;

        return $this;
    }

    public function getShortTitle(): ?string 
    {
        if($this->title === null){
            return null;
        }else{
            return e(Text::excerpt($this->title, 13));
        }
    }

    public function getShortContent(int $limit = 140): ?string
    {
        if($this->content === null){
            return null;
        }else {
            return nl2br(e(Text::excerpt($this->content, $limit)));
        }
    }

    /**
    * @return Category[]
    */
    public function getCategories(): array 
    {
            return $this->categories;
    }

    public function addCategory(Categories $category): void 
    {
            $this->categories[] = $category;
            $category->setArticle($this);
    }
}