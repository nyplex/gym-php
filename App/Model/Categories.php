<?php 

namespace App\Model;

class Categories {


    private $id;
    private $name;
    private $slug;
    private $training_id;
    private $training;
    private $articles_id;
    private $article;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    public function getTraining_id(): ?int
    {
        return $this->training_id;
    }

    public function setTraining_id($training_id)
    {
        $this->training_id = $training_id;

        return $this;
    }

    public function setTraining(Training $training)
    {
        $this->training = $training;
    }

    public function getArticle_id(): ?int
    {
        return $this->articles_id;
    }

    public function setArticle_id($article_id)
    {
        $this->articles_id = $article_id;

        return $this;
    }

    public function setArticle(Article $article)
    {
        $this->article = $article;
    }
}